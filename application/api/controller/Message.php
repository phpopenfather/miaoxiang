<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\User;
use think\Db;
use think\exception\ValidateException;

/**
 * 站内消息接口
 */
class Message extends Api
{

    //如果$noNeedLogin为空表示所有接口都需要登录才能请求
    //如果$noNeedRight为空表示所有接口都需要验证权限才能请求
    //如果接口已经设置无需登录,那也就无需鉴权了
    //
    // 无需登录的接口,*表示全部
    protected $noNeedLogin = ['*'];
    // 无需鉴权的接口,*表示全部
    protected $noNeedRight = '*';
    // Child模型对象
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\common\model\MessageUser;
    }

    /**
     * 站内消息列表
     *
     * @param string $token   Token
     * @param integer $is_see   是否已读，1已读2未读留空或为0查看全部
     * @param integer $page 页码
     * @ApiReturn   ({
    'rec_id': 7, // 消息id
    'user_id': 2, // 接收人id
    'message_id': 8,  //内容id
    'is_see': 0, //是否已读  2未查看, 1已查看
    'deleted': 0, //是否被删除 1:删除,0未删除
    'createtime': 1597989975, // 创建时间
    'messagenotice': { // 消息内容
        'message_type': 'user', // 消息类型 user个人消息 system系统消息
        'message_title': '收到回复', //标题
        'message_content': '啊，这', // 内容
        'message_annex': '11111', // 附件二进制数据
        'lable': 1, // 标签-待设计1已设计2待确认3已确认4待审核5已审核6完工7作废8
        'type': 1, // 消息文件类型-0其他1二进制数据类型2oss提取码类型
        'extraction_code': 1, // oss提取码
        'message_type_text': 'User'
    },
    'senduser': { // 发送人信息
        'id': 3,
        'username': 'test', //用户名-
        'mobile': '15666666666', // 手机号
    }
    })
     * @ApiReturnParams (name="code", type="integer", required=true, sample="0")
     */
    public function getlist()
    {
        $user = $this->auth->getUser();
        $is_see = $this->request->request('is_see');
        $this->success('返回成功', $this->model->getList($user->id, '', $is_see));
    }

    /**
     * 未读消息数
     *
     * @param string $token   Token
     */
    public function getUnreadCount()
    {
        $user = $this->auth->getUser();
        $this->success('返回成功', $this->model->getUnreadCount($user->id));
    }

    /**
     * 站内消息详情
     *
     * @param string $token   Token
     * @param integer $rec_id 消息ID
     */
    public function getMessageDetails()
    {
        $user = $this->auth->getUser();
        $rec_id = $this->request->request('rec_id');
        $this->success('返回成功', $this->model->getMessageDetails($rec_id));
    }

    /**
     * 设置消息已读
     *
     * @param string $token   Token
     * @param integer $rec_id 消息ID
     */
    public function setMessageForRead()
    {
        $user = $this->auth->getUser();
        $rec_id = $this->request->request('rec_id');
        if ($this->model->getUnreadCount($rec_id, $user->id)) {
            $this->success('操作成功');
        } else {
            $this->error('操作失败');
        }
    }

    /**
     * 删除消息
     *
     * @param string $token   Token
     * @param integer $rec_id 消息ID
     */
    public function deletedMessage()
    {
        $user = $this->auth->getUser();
        $rec_id = $this->request->request('rec_id');
        if ($this->model->deletedMessage($rec_id, $user->id)) {
            $this->success('操作成功');
        } else {
            $this->error('操作失败');
        }
    }

    /**
     * 发送消息(json格式)
     *
     * @ApiMethod   (POST)
     * @ApiSummary 11
     * @ApiHeaders  (name=token, type=string, required=true, description="请求的Token")
     * @ApiParams   (name="receive_num", type="string", required=true, description="接收人ID（手机号）")
     * @ApiParams   (name="title", type="string", required=true, description="消息标题")
     * @ApiParams   (name="content", type="string", required=true, description="消息内容")
     * @ApiParams   (name="lable", type="integer", required=false, description="标签-待设计1已设计2待确认3已确认4待审核5已审核6完工7作废8")
     * @ApiParams   (name="type", type="integer", required=true, description="消息文件类型-0其他1二进制数据类型2oss提取码类型")
     * @ApiParams   (name="annex", type="string", required=false, description="附件二进制数据-type字段为1则必填")
     * @ApiParams   (name="extraction_code", type="string", required=false, description="oss提取码-type字段为2则必填")
     */
    public function sendMessage(){
        $send_id = $this->auth->id;
        if (!$send_id){
            $this->error("用户未登录");
        }
        $receive_num = $this->request->post('receive_num');
        $title = $this->request->post('title');
        $content = $this->request->post('content');
        $message_annex = $this->request->post('annex');
        $lable = $this->request->post('lable');
        $type = $this->request->post('type');
        $extraction_code = $this->request->post('extraction_code');
        if(!$message_annex) { $message_annex = null; }

        // 验证接收用户
        $receive_id = User::where('mobile',$receive_num)->value('id');
        if(!$receive_id){
            $this->error("接收人不存在！");
        }
        if (!$title || !$content){
            $this->error("内容或标题为空！");
        }

        $params = [$receive_id, $send_id, 'user', $title, $content, $message_annex, $lable, $type, $extraction_code];
        $this->send($params);
        $this->success('发送成功');
    }

    protected function send($params)
    {
        if ($params) {
            list($params['user_id'], $params['send_id'], $params['message_type'], $params['message_title'], $params['message_content'], $params['message_annex'], $params['lable'], $params['type'], $params['extraction_code']) = $params;
            $user_id = isset($params['user_id']) ? $params['user_id'] : 0;
            $send_id = isset($params['send_id']) ? $params['send_id'] : 0;
            if ($params['message_type'] == 'user' && !$user_id) {
                return false;
            }

            Db::startTrans();
            try {
                $model = new \app\common\model\MessageNotice;
                $result = $model->allowField(true)->save($params);
                if ($params['message_type'] == 'user') {
                    $messageUser = new \app\common\model\MessageUser;
                    $messageUser->save(['user_id' => $user_id, 'send_id' => $send_id, 'message_id' => $model->message_id]);
                }
                Db::commit();
            } catch (ValidateException $e) {
                Db::rollback();
                return false;
            } catch (PDOException $e) {
                Db::rollback();
                return false;
            } catch (Exception $e) {
                Db::rollback();
                return false;
            }
            if ($result !== false) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    /**根据企业申请id，消息发送接口
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * ['company_id' => '1',
    'data' => [
    [
    'component_name' => 'dfasdf',
    'component_size' => 'dsfads',
    'component_sum' => 'dfsadf',
    'component_price' => 'sadfasdf'
    ],
    [
    'component_name' => 'dfasdf',
    'component_size' => 'dsfads',
    'component_sum' => 'dfsadf',
    'component_price' => 'sadfasdf'
    ]
    ]];
     */
    public function apply_company_msg(){

        $send_id = $this->auth->id;
        if (!$send_id){
            $this->error("用户未登录");
        }

        $company_id = $this->request->request('company_id');
        $nickname = Db::query('select * from fa_apply_company where id=?',[$company_id]);
        if (empty($nickname[0]['co_name'])){
            $this->error("该项目接收人不存在,请输入正确企业id！");
        }else{
            $result = DB::name('user')->where('nickname','like',"%".$nickname[0]['co_name']."%")->select();
        }

        $title = $this->request->post('title');

        $data = $this->request->post('data');

        $con = null;
        foreach ($data as $d){
            $con .= $d['component_name'].'&nbsp&nbsp&nbsp&nbsp'.$d['component_size'].'&nbsp&nbsp&nbsp&nbsp'.$d['component_sum'].'&nbsp&nbsp&nbsp&nbsp'.$d['component_price'].'&nbsp<br />';
        }

//        $component_name = $this->request->post('component_name');
//        $component_size = $this->request->post('component_size');
//        $component_sum = $this->request->post('component_sum');
//        $component_price = $this->request->post('component_price');

        $content = '结构件名称 &nbsp; 结构件规格 &nbsp;结构件数量&nbsp;结构件价格&nbsp;<br />'.$con;
        $message_annex = null;
        $lable = 1;
        $type = 0;
        $extraction_code = null;

        if (!$title || !$content){
            $this->error("内容或标题为空！");
        }
        // 验证接收用户
        if(empty($result)){
            $this->error("接收人不存在,请修改接收人昵称！");
        }else{
            foreach ($result as $arr){
                $receive_num = $arr['mobile'];
                $receive_id = User::where('mobile',$receive_num)->value('id');
                if(!$receive_id){
                    $this->error("接收人不存在！");
                }
                $params = [$receive_id, $send_id, 'user', $title, $content, $message_annex, $lable, $type, $extraction_code];
                $this->send($params);
            }
        }

        $this->success('发送成功');
    }
}