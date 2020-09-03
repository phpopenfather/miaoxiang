<?php


namespace app\api\controller;


use app\common\controller\Api;
use app\common\library\Token;
use app\common\model\Component;
use think\Db;
use think\Exception;

class Favorite extends Api
{
    protected $model = null;
    protected $noNeedLogin = [];
    protected $noNeedRight = ['add','cancel'];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('UserFavoriteComponent');
    }



    /**
     * 收藏
     *
     */
    public function add()
    {
        $token = $this->request->post('__token__');

        // 用户toke获取用户ID
        $user_token = $this->auth->getToken();
        if(!$user_token || !Token::get($user_token)){
            $this->error("用户未登录");
        }
        $component_id = $this->request->request('component_id');
//        $this->auth->id;

        $user_id = Token::get($user_token)['user_id'];
        $where['user_id'] = $user_id;
        $where['component_id'] = $component_id;
        $is_favorite = $this->model->where($where)->find();
        $msg = '';

        // 开启事务
        Db::startTrans();
        try {
            if (is_null($is_favorite)) {
                $this->model->create($where);
                Component::where('id',$component_id)->setInc('favorities');
                $msg = '收藏成功！';
            }else{
                $this->model->where($where)->delete();
                $favoritie = Component::where('id',$component_id)->value('favorities');
                if ($favoritie >0){
                    Component::where('id',$component_id)->setDec('favorities');
                }
                $msg = '已取消收藏！';
            }
            Db::commit();
        } catch (Exception $e) {
            $this->error($e->getMessage());
            Db::rollback();
        }
        $this->success($msg);
    }

}