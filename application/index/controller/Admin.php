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
 * 管理账号
 */
class Admin extends Frontend
{

	/**
	*管理账号
	*/
	// 列表
	public function index(){
// $this->view->assign('title', __('index component'));
    return $this->view->fetch();
	}


    // 添加
	public function add(){
        // var_dump($_POST);die;
            // user_id
            $token = $this->request->post('__token__');
            //验证Token
            if (!$token || !\think\Validate::is($token, "token", ['__token__' => $token])) {
                // $this->error("请勿非法请求");
            }
            // 用户toke获取用户ID
            $user_token = $this->auth->getToken();
            if(!$user_token || !Token::get($user_token)){
                $this->error("用户未登录");
            }
            $user_id = Token::get($user_token)['user_id'];    

          if (request()->isPost()) {
        $data=[
            'name'=>input('name'),
            'activation'=>input('activation'),
            'cellphone'=>input('cellphone'),
            'mode'=>input('mode'),
            'account_number'=>input('account_number'),
            'sex'=>input('sex'),
            'address'=>input('address'),
            'identity'=>input('identity'),
            'create_time'=>date('Y-m-d',time()),
            'user_id'=>$user_id


        ];
        
            // 图片上传
            //获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
               if($file){
                $info_img = $file->validate(['size'=>5242880,'ext'=>'jpeg,png'])->move(ROOT_PATH . 'public' . DS . 'uploads/img');
                // var_dump($info);die;
                if($info_img){
                $data ['img']='/uploads/'.date('Ymd').'/'.$info_img->getFilename(); //$data向数据传递数据 ['img']img数据库字段名 在数据库重的名字 
                   
                }else{
                    // 上传失败获取错误信息
                   return $this->error($file->getError());
                }
            }

        $db=Db::name('admin_account')->insert($data);
        // 可以防止刷新提交if
        if ($db){
             return $this->success('成功','add');
        }else{
            return $this->error('no');
        }

        return $this->view->fetch();
          }
       
        return $this->view->fetch();
    }
}




 
