<?php


namespace app\index\controller;


use app\common\controller\Frontend;
use app\common\library\Token;
use app\common\model\UserFavoriteComponent;
use think\controller;
use think\Db;
use think\Reques;
use think\Validate;//引用验证器
use think\facade\Request;

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
        // var_dump('Upload component');
        return $this->view->fetch();
    }

    /**
     * 上传你的构件add
     */

    public function uploads(){  
        // 查询构件分类
        $this->getProvince();
        $this->getCity();
        // 查询构件应用
        $app=Db::table('fa_app')
                        ->select();         
        
        // 添加构件

        if(request()->isPost()){
            // 判断应用
            if(!isset($_POST['like'])){
                $str='';
            }else{
                $array=$_POST['like'];
                $str=implode(',',$array);//implode()函数将数组组合成字符串
            }

            $data=[

                'category_id'=>input('category_id'),
                'category_child_id'=>input('category_child_id'),
                'name'=>input('name'),
                'number'=>input('number'),
                'size'=>input('size'),
                'rules'=>input('rules'),
                'price'=>input('price'),
                'uploadto'=>input('uploadto'),
                'app'=>$str,
                'apps'=>input('apps'),
                'user_id'=>input('user_id'),

            ];


            // 上传文件
            $file = request()->file('attachfile');
               if($file){                                       // 3dmax,fbx
                $info = $file->validate(['size'=>209715200,'ext'=>'3dmax,fbx,png'])->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // echo $info->getExtension();
                $data ['attachfile']='/uploads'.date('Ymd').'/'.$info->getFilename();
                 }else{
                    // 上传失败获取错误信息
                   return $this->error($file->getError());
                }
            }
             // 上传图片
            $img = request()->file('image');
               if($img){
                $info_img = $img->validate(['size'=>5242880,'ext'=>'jpeg,png'])->move(ROOT_PATH . 'public' . DS . 'uploads');
                // var_dump($info);die;
                if($info_img){
                $data ['image']='/uploads/'.date('Ymd').'/'.$info_img->getFilename(); //$data向数据传递数据 ['img']img数据库字段名 在数据库重的名字 
                   
                }else{
                    // 上传失败获取错误信息
                   return $this->error($img->getError());
                }
            }
                $db=Db::name('component')->insert($data);
                // if($db){

                //     return $this->success('成功','uploadss');
                // }else{
                //     return $this->error('失败','uploads');
                //   } 
                    return $this->view->fetch('uploadss');

}
            // $this->assign('category',$category);
            $this->assign('app',$app);
            $this->view->assign('title', __('Uploads component'));
            return $this->view->fetch();
    
 }


    // 构件父级分类条件
    public function getProvince(){
        // 查询父级条件
        $category = Db::query("select * from fa_category where type = 'component' and id = 14 or id = 16 or id = 17");
                            $this->assign('category',$category);
             }
    // 构件子级分类条件
    public function getCity(){
        $city =Db::query("select * from fa_category where type = 'component'");
        // 交互状态 要用json格式
        // return json([
        //     'status' => 200,
        //     'msg'    => '获取成功',
        //     'data'   => $city
        // ]);
        $this->assign('city',$city);
     }


    // public function uploadss(){
    //         $this->view->assign('title', __('Uploadss component'));
    //         return $this->view->fetch();
    // }
     

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
                // var_dump($sort);die;     
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

    public function upMlist(){

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