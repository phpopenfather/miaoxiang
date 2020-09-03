<?php


namespace app\api\controller;


use addons\epay\library\Service;
use app\common\controller\Api;
use Endroid\QrCode\QrCode;
use think\Response;

class Pay extends Api
{
    protected $model = null;
    protected $noNeedLogin = [];
    protected $noNeedRight = ['pay','codePay'];

    public function _initialize()
    {
        parent::_initialize();

    }

    public function pay(){
        $params = [
            'amount'=>"99.9",
            'orderid'=>"111111",
            'type'=>"alipay",
            'title'=>"测试标题",
            'notifyurl'=>"/addons/epay/api/notifyx/type/alipay",
            'returnurl'=>"/addons/epay/api/returnx/type/alipay",
            'method'=>"wap",
            'openid'=>"1111",
//                'auth_code'=>"验证码"
        ];
        return $data = Service::submitOrder($params);
        $arr = json_decode($data,true);
        $qr_code = $arr['qr_code'];
        return "<img src='http://qr.liantu.com/api.php?text='".$qr_code.">";
    }

    public function codePay(){
        $pay = Service::createPay('alipay', Service::getConfig('alipay'));

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