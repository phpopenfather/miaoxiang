<?php


namespace app\api\controller;


use app\common\controller\Api;
use app\common\library\Token;

class Component extends Api
{
    protected $model = null;
    protected $noNeedLogin = [];
//    protected $noNeedRight = ['index','upload'];
    protected $noNeedRight = ['delete'];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Component');
    }


    /**
     * 上传构件
     *
     * @param string $name 用户名
     */
    public function upload(){
        $token = $this->request->post('__token__');

        //验证Token
        if (!$token || !\think\Validate::is($token, "token", ['__token__' => $token])) {
            $this->error("请勿非法请求");
        }
        // 用户toke获取用户ID
        $user_token = $this->auth->getToken();
        if(!$user_token || !Token::get($user_token)){
            $this->error("用户未登录");
        }
        $user_id = Token::get($user_token)['user_id'];

        // 整合数据
        $params['name'] = $this->request->request('name');
        $params['category_id'] = $this->request->request('category_id');
        $params['category_child_id'] = $this->request->request('category_child_id');
        $params['description'] = $this->request->request('description');
        $params['price'] = $this->request->request('price');
        $params['size'] = $this->request->request('size');
        $params['rules'] = $this->request->request('rules');
        $params['is_private'] = $this->request->request('is_private');
        $params['user_id'] = $user_id??0;
        $params['image'] = $this->request->request('image', '', 'trim,strip_tags,htmlspecialchars');
        $params['attachfile'] = $this->request->request('attachfile', '', 'trim,strip_tags,htmlspecialchars');

        if ($params) {
            $this->model->create($params);
            $this->success();
        }
        $this->error();
    }

    /**
     * 修改构件信息
     *
     */
    public function edit()
    {
        $token = $this->request->post('__token__');

        //验证Token
        if (!$token || !\think\Validate::is($token, "token", ['__token__' => $token])) {
            $this->error("请勿非法请求");
        }
        // 用户toke获取用户ID
        $user_token = $this->auth->getToken();
        if(!$user_token || !Token::get($user_token)){
            $this->error("用户未登录");
        }
        $id = $this->request->post('id');

        $user_id = Token::get($user_token)['user_id'];

        $component = $this->model->get($id);
        if($user_id != $component->user_id){
            $this->error("用户权限错误");
        }

        $component->category_id = $this->request->post('category_id');
        $component->category_child_id = $this->request->post('category_child_id');
        $component->description = $this->request->post('description');
        $component->is_private = $this->request->post('is_private');
        $component->name = $this->request->post('name');
        $component->price = $this->request->post('price');
        $component->rules = $this->request->post('rules');
        $component->size = $this->request->post('size');

        $component->save();
        $this->success();

    }

    /**
     * 删除构件
     *
     */
    public function delete()
    {
        $token = $this->request->post('__token__');

        // 用户toke获取用户ID
        $user_token = $this->auth->getToken();
        if(!$user_token || !Token::get($user_token)){
            $this->error("用户未登录");
        }

        $user_id = Token::get($user_token)['user_id'];

        $component_id_list = $this->request->post('idList/a');

        if ( empty($component_id_list) ){
            $this->error('请选择要删除的订单');
        }

        //
        $whereArr['id'] =  array('in',$component_id_list);
        $whereArr['user_id'] = array('neq',$user_id);
        $count = $this->model->where($whereArr)->count();
        if ( $count>0 ){
            $this->error('存在非自己权限内的构件');
        }

        \app\common\model\Component::destroy($component_id_list);

//        $this->model->whereIn('id', $component_id_list)->update(['status' => 'deleted']);
        $this->success();

    }
}