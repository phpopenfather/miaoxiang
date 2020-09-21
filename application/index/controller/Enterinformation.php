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
class Enterprise extends Frontend
{

	/**
	
	*/
	// 列表
	public function index(){
      return $this->view->fetch();
    }
}