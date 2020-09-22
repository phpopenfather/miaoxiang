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
 * 企业信息
 */
class Enterinformation extends Frontend
{


    // 企业信息add
    public function informationadd(){
    	// var_dump($_POST);DIE;
    $upload='企业信息add';
    if (request()->isPost()) {
		$data=[
          
           'address'=>input('address'),
           'gc_address'=>input('gc_address'),
           'upload'=>$upload,
           'add_time'=>date('Y-m-d h:m:i',time())

		];
		 // 图片上传
        $file = request()->file('file');
        // var_dump( $file);die;
       if(!isset($file)){
               return $this->error('请上传图片');
            }else{

            	// 移动到框架应用根目录/public/uploads/ 目录下
               if($file){
                $info_img = $file->validate(['size'=>5242880,'ext'=>'jpeg,png'])->move(ROOT_PATH . 'public' . DS . 'uploads/img');
                // var_dump($info);die;
                if($info_img){
                $data ['logo_img']='/uploads/'.date('Ymd').'/'.$info_img->getFilename(); //$data向数据传递数据 ['img']img数据库字段名 在数据库重的名字 
                   
	                }else{
	                    // 上传失败获取错误信息
	                   return $this->error($file->getError());
	                }
                }
               
            }
            

		 $db=Db::name('enterinformation')->insert($data);
        // 可以防止刷新提交if
        if ($db){
             return $this->success('成功','informationadd');
        }else{
            return $this->error('no');
        }

        return $this->view->fetch();
          }
        
      return $this->view->fetch();
    }



	// 基本资料add
	public function dataadd(){

		$province = $this->getProvince();
 
	 	$this->assign('province', $province);
		// var_dump($_POST);die;
    $upload='基本资料add';
    if (request()->isPost()) {
		$data=[
           'name'=>input('name'),
           'province'=>input('province'),
           'city'=>input('city'),
           'district'=>input('district'),
           'address'=>input('address'),
           'introduce'=>input('introduce'),
           'fz_admin'=>input('fz_admin'),
           'phone'=>input('phone'),
           'upload'=>$upload,
           'add_time'=>date('Y-m-d h:m:i',time())

		];

        // 图片上传
        $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
               if($file){
                $info_img = $file->validate(['size'=>5242880,'ext'=>'jpeg,png'])->move(ROOT_PATH . 'public' . DS . 'uploads/img');
                // var_dump($info);die;
                if($info_img){
                $data ['logo_img']='/uploads/'.date('Ymd').'/'.$info_img->getFilename(); //$data向数据传递数据 ['img']img数据库字段名 在数据库重的名字 
                   
                }else{
                    // 上传失败获取错误信息
                   return $this->error($file->getError());
                }
            }

		 $db=Db::name('enterinformation')->insert($data);
        // 可以防止刷新提交if
        if ($db){
             return $this->success('成功','dataadd');
        }else{
            return $this->error('no');
        }

        return $this->view->fetch();
          }
      return $this->view->fetch();
    }

	// 企业认证add
	public function authenticationadd(){
  	// var_dump($_POST);DIE;
    $upload='企业信息add';
    if (request()->isPost()) {
		$data=[
           'upload'=>$upload,
           'add_time'=>date('Y-m-d h:m:i',time())

		];
		 // 图片上传
        $file = request()->file('file');
       //  var_dump( $file);die;
            if(!isset($file)){
               return $this->error('请上传企业执照');
            }else{
            	// 移动到框架应用根目录/public/uploads/ 目录下
               if($file){
                $info_img = $file->validate(['size'=>5242880,'ext'=>'jpeg,png'])->move(ROOT_PATH . 'public' . DS . 'uploads/img');
                // var_dump($info);die;
                if($info_img){
                $data ['qy_img']='/uploads/'.date('Ymd').'/'.$info_img->getFilename(); //$data向数据传递数据 ['img']img数据库字段名 在数据库重的名字 
                   
	                }else{
	                    // 上传失败获取错误信息
	                   return $this->error($file->getError());
	                }
                }
            }

        
		         // 公司图片上传
		        $img = request()->file('img');
		       //  var_dump( $file);die;
                    if(!isset($img)){
		               return $this->error('请上传公司图片');
		            }else{
		            	// 移动到框架应用根目录/public/uploads/ 目录下
		               if($img){
		                $info_imgs = $img->validate(['size'=>5242880,'ext'=>'jpeg,png'])->move(ROOT_PATH . 'public' . DS . 'uploads/img');
		                // var_dump($info);die;
		                if($info_imgs){
		                $data ['gs_img']='/uploads/'.date('Ymd').'/'.$info_imgs->getFilename(); //$data向数据传递数据 ['img']img数据库字段名 在数据库重的名字 
		                   
			                }else{
			                    // 上传失败获取错误信息
			                   return $this->error($img->getError());
			                }
		                }        
                    }

		 $db=Db::name('enterinformation')->insert($data);
        // 可以防止刷新提交if
        if ($db){
             return $this->success('成功','authenticationadd');
        }else{
            return $this->error('no');
        }

        return $this->view->fetch();
          }
        
      return $this->view->fetch();
    }


 /*
   省份
 */
	 public function getProvince(){
	 	return Db::name('city')
	 	->where([
	 		'type' => 1
	 	])->select();
	 }

 /*
   城市
 */
	 public function getCity($id){
	 	$city = Db::name('city')
	 	->where([
	 		'type' => 2,
	 		'parent_id' => $id
	 	])->select();
        // 交互状态 要用json格式
	 	return json([
	 		'status' => 200,
	 		'msg'    => '获取成功',
	 		'data'   => $city
	 	]);
	 }

 /*
   区域
 */
	 public function getDistrict($id){
	 	$district = Db::name('city')
	 	->where([
	 		'type' => 3,
	 		'parent_id' => $id
	 	])->select();

	 	return json([
	 		'status' => 200,
	 		'msg'    => '获取成功',
	 		'data'   => $district
	 	]);
	 }

 /*
   收货地址提交
 */
	 // public function getAddr(){
	 // 	$data = Request::post();
	 // 	// dump($data);die;
	 // 	$res=Db::name('address')->insert($data);
	 // 	// dump($res);die;
	 // 	if($res){
	 // 	return json([
	 // 		'status' => 200,
	 // 		'msg'    => '获取成功',
	 // 		'url'   => url("cart/shopping/")
	 // 	]);

	 // 	}else{
	 // 		return false;
	 // 	}
	 // }
   
}