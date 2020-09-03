<?php


namespace app\index\controller;


use app\common\controller\Frontend;
use app\common\library\Token;
use app\common\model\UserFavoriteComponent;

/**
 * 部品构件
 */
class Component extends Frontend
{
    protected $layout = 'default';
    protected $noNeedLogin = ['detail'];
//    protected $noNeedRight = ['index','upload'];
    protected $noNeedRight = ['detail','mylist'];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Component');
    }


    /**
     * 我的构件 首页
     */
    public function index()
    {
        // 用户toke获取用户ID
        $this->request->filter(['strip_tags']);

        $user_token = $this->auth->getToken();
        if(!$user_token || !Token::get($user_token)){
            $this->error("用户未登录");
        }
        $user_id = Token::get($user_token)['user_id'];

        // 构件列表
        $sort = $this->request->get("sort", "createtime");
        $order = $this->request->get("order", "DESC");
        $offset = $this->request->get("offset", 0);
        $category = $this->request->get("category");
        $limit = $this->request->get("limit", 0);

        $where['user_id'] = $user_id;
        if($category){
            $where['category_id'] = $category;
        }

        $total = $this->model->where($where)->where('status','normal')->count();
        $list = $this->model->where($where)
            ->where('status','normal')
            ->order($sort, $order)
            ->limit($offset, $limit)
            ->paginate(2, true, [
                'query'=>['category_id'=>$category],
            ]);
        $result = array("total" => $total, "rows" => $list);
        $this->assign('result',$result);

        $this->view->assign('title', __('My component'));
        return $this->view->fetch();
    }

    /**
     * 上传构件
     */
    public function upload()
    {
        $this->view->assign('title', __('Upload component'));
        return $this->view->fetch();
    }

    /**
     * 我的构件列表
     */
    public function mylist(){
        $this->request->filter(['strip_tags']);

        $user_token = $this->auth->getToken();
        if(!$user_token || !Token::get($user_token)){
            $this->error("用户未登录");
        }
        $user_id = Token::get($user_token)['user_id'];

        // 构件列表
        $sort = $this->request->get("sort", "createtime");
        $order = $this->request->get("order", "DESC");
        $offset = $this->request->get("offset", 0);
        $category = $this->request->get("category_id");
        $limit = $this->request->get("limit", 0);

        $where['user_id'] = $user_id;
        if($category){
            $where['category_id'] = $category;
        }

        $total = $this->model->where($where)->where('status','normal')->count();
        $list = $this->model->where($where)
            ->where('status','normal')
            ->order($sort, $order)
            ->limit($offset, $limit)
            ->paginate(4,false, [
                'query'=>['category_id'=>$category],
            ]);
        $result = array("total" => $total, "rows" => $list);
        $this->assign('result',$result);

        $this->view->assign('title', __('My component'));
        return $this->view->fetch();
    }

    /**
     * 构件详情
     */
    public function detail()
    {

        $user_id = $this->auth->id;
        if(!$user_id){
            $this->error("用户未登录");
        }

        $id = $this->request->get("id");
        $detail = $this->model->get($id);
        $detail->categories;

//        $total = $this->model->where($where)->where('status','normal')->count();
        // 相似构件
        $list = $this->model->where('status','normal')
            ->order('createtime', 'desc')
            ->limit(0, 5)
            ->select();
        $result = array("total" => 5, "rows" => $list);
        $favorite = UserFavoriteComponent::where(['user_id'=>$user_id,'component_id'=>$id])->count();
        
        $detail->favorite = $favorite;

        $this->assign('result',$result);
        $this->assign('detail',$detail);
        $this->view->assign('title', __('Upload component'));
        return $this->view->fetch();
    }
}