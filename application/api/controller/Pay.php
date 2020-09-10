<?php


namespace app\api\controller;


use addons\epay\library\Service;
use app\common\controller\Api;
use Endroid\QrCode\QrCode;
use think\Response;

class Pay extends Api
{
    protected $model = null;
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    public function _initialize()
    {
        parent::_initialize();

    }
    //微信支付接口
    public function wechat_pay(){
//        $amount = $this->request->request('amount');
//        $type = $this->request->request('type');
//        $method = $this->request->request('method');

        $amount = '0.01';
        $type = 'wechat';
        $method = 'web';

        if (!$amount || $amount < 0) {
            $this->error("支付金额必须大于0");
        }

        if (!$type || !in_array($type, ['alipay', 'wechat'])) {
            $this->error("支付类型不能为空");
        }

        //订单号
        $out_trade_no = date("YmdHis") . mt_rand(100000, 999999);

        //订单标题
        $title = '秒象测试订单';

        //回调链接
        $notifyurl = $this->request->root(true) . '/addons/epay/index/notifyx/paytype/' . $type;
//        $notifyurl = 'http://121.196.179.114/addons/epay/index/notifyx/paytype/' . $type;
        $returnurl = $this->request->root(true) . '/addons/epay/index/returnx/paytype/' . $type . '/out_trade_no/' . $out_trade_no;

        $params = [
            'amount'=>$amount,
            'orderid'=>$out_trade_no,
            'type'=>$type,
            'title'=>$title,
            'notifyurl'=>$notifyurl,
            'returnurl'=>$returnurl,
            'method'=>"web",
            'openid'=>"1112",
//                'auth_code'=>"验证码"
        ];

//        return Service::submitOrder($amount, $out_trade_no, $type, $title, $notifyurl, $returnurl, $method);
        return Service::submitOrder($params);
    }

    public function pay(){
        $params = [
            'amount'=>"0.99",
            'orderid'=>"898",
            'type'=>"alipay",
            'title'=>"秒象科技",
            'notifyurl'=>"/addons/epay/api/notifyx/type/alipay",
            'returnurl'=>"/addons/epay/api/returnx/type/alipay",
            'method'=>"web",
            'openid'=>"",
//                'auth_code'=>"验证码"
        ];
        return $data = Service::submitOrder($params);
        die;
        $arr = json_decode($data,true);
        $qr_code = $arr['qr_code'];
        return "<img src='http://qr.liantu.com/api.php?text='".$qr_code.">";
    }

    public function codePay(){
        $pay = Service::createPay('alipay', Service::getConfig('alipay'));
//        echo 12;die;
//        echo '<pre>';
        $order = [
            'out_trade_no' => date('Ymdhis'),
            'body' => '测试收款码',
            'total_fee' => 1
        ];

        return $re = $pay->driver();
    }

    /**
     * 生成二维码
     * @return Response
     */
    protected function qrcode()
    {
        $text = $this->request->get('text', 'hello world');
        $size = $this->request->get('size', 250);
        $padding = $this->request->get('padding', 15);
        $errorcorrection = $this->request->get('errorcorrection', 'medium');
        $foreground = $this->request->get('foreground', "#ffffff");
        $background = $this->request->get('background', "#000000");
        $logo = $this->request->get('logo');
        $logosize = $this->request->get('logosize');
        $label = $this->request->get('label');
        $labelfontsize = $this->request->get('labelfontsize');
        $labelhalign = $this->request->get('labelhalign');
        $labelvalign = $this->request->get('labelvalign');

        // 前景色
        list($r, $g, $b) = sscanf($foreground, "#%02x%02x%02x");
        $foregroundcolor = ['r' => $r, 'g' => $g, 'b' => $b];

        // 背景色
        list($r, $g, $b) = sscanf($background, "#%02x%02x%02x");
        $backgroundcolor = ['r' => $r, 'g' => $g, 'b' => $b];

        $qrCode = new QrCode();
        $qrCode
            ->setText($text)
            ->setSize($size)
            ->setPadding($padding)
            ->setErrorCorrection($errorcorrection)
            ->setForegroundColor($foregroundcolor)
            ->setBackgroundColor($backgroundcolor)
            ->setLogoSize($logosize)
            ->setLabelFontPath(ROOT_PATH . 'public/assets/fonts/Times New Roman.ttf')
            ->setLabel($label)
            ->setLabelFontSize($labelfontsize)
            ->setLabelHalign($labelhalign)
            ->setLabelValign($labelvalign)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        //也可以直接使用render方法输出结果
        //$qrCode->render();
        //保存图片
        //$qrCode->save('qrcode.png');
        return new Response($qrCode->get(), 200, ['Content-Type' => $qrCode->getContentType()]);
    }
}