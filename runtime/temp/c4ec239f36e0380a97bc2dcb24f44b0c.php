<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:105:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\component\index.html";i:1599032081;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?> – <?php echo $site['name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<?php if(isset($keywords)): ?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<?php endif; if(isset($description)): ?>
<meta name="description" content="<?php echo $description; ?>">
<?php endif; ?>

<link rel="shortcut icon" href="/assets/img/favicon.ico" />

<link href="/assets/css/frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config: <?php echo json_encode($config); ?>
    };
</script>
        <link href="/assets/css/user.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
        <link href="/assets/css/xm_common.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top navbar-mx" role="navigation">
            <div class="container-mx">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<!--                    <a class="navbar-brand" href="<?php echo url('/'); ?>"><img class="img-responsive" width="120" src="/assets/img/logo@1x.png"></a>-->
                    <a class="navbar-brand" href="<?php echo url('/'); ?>"><img class="img-responsive" width="120" src="<?php if(isset($logo)){ echo $logo;}else{ echo '/assets/img/logo@1x.png';}?>"></a>
                </div>
                <div class="collapse navbar-collapse" id="header-navbar">

                    <a href="" class="btn navbar-right download-client" >客户端下载</a>
                    <ul class="nav navbar-nav navbar-avatar navbar-right">
                        <?php if($user): ?>
                        <li class="dropdown img-li">
                            <a href="<?php echo url('user/index'); ?>" id="toggle-href" class="dropdown-toggle avatar-a" data-toggle="dropdown">
                                <span class="avatar-img"><img src="<?php echo cdnurl($user['avatar']); ?>" alt=""></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i><?php echo __('User center'); ?></a></li>
                                <li><a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i><?php echo __('Profile'); ?></a></li>
                                <li><a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i><?php echo __('Change password'); ?></a></li>
                                <li><a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i><?php echo __('Sign out'); ?></a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li class="dropdown login-text">
                            <a class="login" href="<?php echo url('user/login'); ?>"></i> <?php echo __('Sign in'); ?></a><span class="split_line">/</span><a class="register" href="<?php echo url('user/registermode'); ?>"><?php echo __('Sign up'); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>

                    <ul class="nav navbar-nav navbar-nav-mx">
                        <li class=""><a href="<?php echo url('/'); ?>">主页</a></li>
                        <li class="dropdown">
                            <a href="<?php echo url('component/index'); ?>"><?php echo __('Component'); ?> <b class="caret"></b></a>
<!--                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo url('component/index'); ?>"><?php echo __('Component'); ?> <b class="caret"></b></a>-->
                            <ul class="dropdown-menu">
                                <li class=""><a href="<?php echo url('component/index'); ?>">构件</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="<?php echo url('index/component/mylist'); ?>">企业中心</a></li>
                    </ul>
<!--                    <div class="search-div navbar-left">-->
<!--                        <span class="search-select">-->
<!--                            <button type="button" class="btn dropdown-btn dropdown-toggle" data-toggle="dropdown">-->
<!--                                <span class="search-text">方案</span>-->
<!--                                <span class="caret"></span>-->
<!--                            </button>-->
<!--                            <ul class="dropdown-menu search-menu">-->
<!--                                <li><a href="javascript:;">方案</a></li>-->
<!--                                <li><a href="javascript:;">构件</a></li>-->
<!--                            </ul>-->
<!--                        </span>-->
<!--                        <span class="search-span">-->
<!--                            <input type="text" class="search-input form-control" value="" placeholder="新中式">-->
<!--                            <img src="/assets/img/search.png">-->
<!--                        </span>-->

<!--                    </div>-->
                </div>
            </div>
        </nav>

        <main class="content">
            <style>
    .basicinfo {
        margin: 15px 0;
    }

    .basicinfo .row > .col-xs-4 {
        padding-right: 0;
    }

    .basicinfo .row > div {
        margin: 5px 0;
    }
    .list-group-horizontal .list-group-item {
        display: inline-block;
    }
    .list-group-horizontal .list-group-item {
        margin-bottom: 0;
        margin-left:-4px;
        margin-right: 0;
    }
    .list-group-horizontal .list-group-item:first-child {
        border-top-right-radius:0;
        border-bottom-left-radius:4px;
    }
    .list-group-horizontal .list-group-item:last-child {
        border-top-right-radius:4px;
        border-bottom-left-radius:0;
    }

    .upload-area{
        text-align: center;
        background: #fff;
        padding: 20px 0;
        border: 1px solid #979797;
        margin-bottom: 30px;
        border-radius: 5px;
    }
    .span-circle{
        display: inline-block;
        font-size: 23px;
        color: #5044FF;
        vertical-align: middle;
    }
    .btn-p .btn-t:hover{
        color: #5044FF;
        border-color: #5044FF;
        background: transparent;
    }
    .btn-p{
        font-size: 13px;
        margin-bottom: 13px;
        line-height: 31px;
    }
    .btn-t{
        border: 1px solid #DCDCDC;
        background: none;
        border-radius: 15px;
        margin-left: 10px;
        vertical-align: middle;
    }
    btn-t:hover{
        background: none !important;
        border-color: #5044FF !important;
    }
    .select-text{
        font-size: 13px;
        margin-right: 5px;
    }
    .select-all-span{
        background-image: url("/assets/img/check-c23.png");
        background-position: center;
        background-size: 100%;
        transition: .2s;
    }

    .checkout-span{
        background-image: url("/assets/img/check-c23.png");
        background-position: center;
        background-size: 100%;
        display: none;
        transition: .2s;
    }
    .item-list{
        padding: 0 10px;
        margin-bottom: 20px;
    }
    .item-list>div{
        background: #fff;
        width: 100%;
        height: 100%;
        border-radius: 35px;
        overflow: hidden;
        box-shadow:rgba(0,0,0,.2) 0px 0px 1px;
        position: relative;
    }
    .item-select{
        position: absolute;
        left: 7%;
        top: 5%;
        color: #5044FF;
        font-size: 18px;
        cursor: pointer;
        transition: opacity 0.3s;
    }
    .item-select-opacity{
        opacity: 0 !important;
        filter:Alpha(opacity=0) !important;
    }

    .img-div{
        width: 240px;
        height: 205px;
        max-height: 205px;
        position: relative;
        display:table-cell;
        vertical-align:bottom;
        margin: 0 auto;
        z-index: 1;
    }

    .item-list>div .item-img{
        background: #ccc;
        display:block;
        margin: 0 auto;
        max-height: 205px;
    }
    .item-list>div:hover .item-select-opacity{
        opacity: 1 !important;
        filter:Alpha(opacity=100) !important;
    }
    .ul-list{
        margin: 7px 0 5px;
    }
    .ul-list>li{
        border: none;
        padding: 2px 20px 0;
        color: #8F8E96;
        font-size: 12px;
        margin-bottom: 4px
    }
    .ul-list:last-child{
        margin-bottom: 10px !important;
    }
    .item-title{

    }
    .item-title>a{
        font-size: 16px;
        /*font-weight: bold;*/
    }
    .item-title a{
        color: #000;
    }
    .item-title a:hover{
        color: #5044FF;
    }

    .modal-dialog-xm .modal-content{
        border-radius: 25px;
    }
    .modal-dialog-xm .modal-header{
        border-bottom: none !important;
    }
    .modal-dialog-xm .modal-title{
        text-align: center;
        font-size: 17px;
    }
    .modal-dialog-xm .modal-footer{
        text-align: center;
        border-top: none;
        padding-top: 5px;
    }
    .btn-edit{
        color: #fff;
        padding: 7px 25px;
        font-size: 12px;
        line-height: 1.42857143;
        border-radius: 15px;
        border: none;
    }
    .is_private{
        margin-top: 8px !important;
        vertical-align:text-bottom;
        margin-bottom:1px;
        margin-bottom:-1px\9;
    }
    .btn-edit:hover{
        color: #fff;
    }
    .modal-mx .control-label{
        padding-right: 5px !important;
    }
    .form-control-div{
        padding-left: 7px;
    }
    .modal-mx .form-control{
        border-color: #E3E3E3;
        border-radius: 3px;
    }
    .category-input{
        width: 46%;
        display: inline-block;
    }
    .modal-body .form-group{
        margin-bottom: 10px;
    }

    .edit-div{
        position: absolute;
        right: 7%;
        top: 5%;
        height: 24px;
        width: 24px;
        display: none;
        cursor: pointer;
        z-index: 2;
        background-image: url("/assets/img/more.png");
        background-position: center;
        background-size: 100%;
    }
    .edit-text{
        width: 60px;
        height: 80px;
        position: absolute;
        display: none;
        z-index: 2;
        top: 43px;
        right: 0px;
        background: #fff;
        padding-top: 9px;
        box-shadow:rgba(0,0,0,.3) 0px 0px 1px;
    }
    .edit-text p{
        font-size: 13px;
        text-align: center;
        cursor: pointer;
        margin-top: 8px;
    }
    .edit-text p:hover{
        color: #5044FF;
    }

    .checkbox-div{
        position: absolute;
        left: 7%;
        top: 5%;
        height: 24px;
        width: 24px;
        cursor: pointer;
    }
    .checkbox-div span{
        z-index: 5;
        position: absolute;
        left: 7%;
        top: 5%;
        color: #5044FF;
        font-size: 18px;
        width: 24px;
        height: 24px;
        cursor: pointer;
        /*transition: opacity 0.3s;*/
    }
    .checkbox-div input{
        z-index: 8;
        left: 1px;
        width: 24px;
        height: 24px;
        cursor: pointer;
        opacity: 0;
        top: -2px;
        position: absolute;
    }
    /*全选样式*/
    .select-all-a{
        display: inline-block;
        position: relative;
        height: 24px;
        width: 24px;
        margin-right: 4px;
        top: 6px;
    }
    .select-all-a input{
        position: absolute;
        z-index: 8;
        margin: 0;
        width: 24px;
        height: 24px;
        opacity: 0;
        cursor: pointer;
    }

    .select-all-a span{
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 5;
    }
    .filter-div{
        margin-bottom: 15px;
    }
    .filter-div a{
        float: left;
        display: inline-block;
        padding: 0 4px;
        font-size: 14px;
        margin: 0 12px;
        color: #202020;
        text-align: center;
    }

    .filter-div a:first-child{
        margin-left: 0;
    }
    .border_bottom{
        border-bottom: 3px solid #5044FF;
    }
    @media (min-width: 1300px) {

    }
    @media (min-width: 1300px) {
        .img-div{
            width: 240px;
            height: 239px;
            max-height: 239px;
        }
        .item-list>div .item-img{
            max-height: 239px;
        }
    }


</style>
<div id="content-container" class="container">
    <div class="row">
        <div class="col-md-12 breadcrumb-div">
            <ul class="breadcrumb">
                <li><a class="breadcrumb-a-xm" href="<?php echo url('component/index'); ?>">我的构件</a></li>
                <li class="active">构件列表</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 filter-div">
            <a href="<?php echo url('component/index'); ?>" class="<?php if(!isset($_GET['category'])) echo 'border_bottom'; ?>">全部</a>
            <a href="<?php echo url('component/index'); ?>?category=15" class="<?php if(isset($_GET['category']) && $_GET['category'] == 15) echo 'border_bottom'; ?>">部品</a>
            <a href="<?php echo url('component/index'); ?>?category=16" class="<?php if(isset($_GET['category']) && $_GET['category'] == 16) echo 'border_bottom'; ?>">构件</a>
            <a href="<?php echo url('component/index'); ?>?category=17" class="<?php if(isset($_GET['category']) && $_GET['category'] == 17) echo 'border_bottom'; ?>">家居组合</a>
        </div>
        <div class="col-md-12 btn-p">
                <a href="javascript:;" class="select-all-a">
                    <input type="checkbox" value="" class="select-all" name="selectall">
<!--                    <span class="select-all-span span-circle fa fa-circle-thin"></span>-->
                    <span class="select-all-span"></span>
                </a> <span class="select-text">全选</span>  共<?php echo $result['total']; ?>个文件
                <button type="button" class="btn btn-t btn-default float-right" id="del">删除</button>
<!--                <button type="button" class="btn btn-t btn-default float-right">批量操作</button>-->
                <a type="button" href="<?php echo url('component/upload'); ?>" class="btn btn-t btn-default float-right">上传</a>
        </div>
        <div class="clear"></div>
        <?php foreach($result['rows'] as $vo): ?>
        <div class="col-lg-1-5 col-xs-1-5 item-list">
            <div class="item-list-div">
                <div class="checkbox-div">
                    <input type="checkbox" class="checkbox-input" name="checkbox-input" value="<?php echo $vo['id']; ?>">
                    <span class="checkout-span" id="<?php echo $vo['id']; ?>" select="false"></span>
                </div>
                <div class="edit-div"></div>
                <div class="edit-text">
                    <input type="hidden" value="<?php echo $vo['id']; ?>" class="h-id">
                    <input type="hidden" value="<?php echo $vo['name']; ?>" class="h-name">
                    <input type="hidden" value="<?php echo $vo['category_id']; ?>" class="h-category_id">
                    <input type="hidden" value="<?php echo $vo['category_child_id']; ?>" class="h-category_child_id">
                    <input type="hidden" value="<?php echo $vo['description']; ?>" class="h-description">
                    <input type="hidden" value="<?php echo $vo['size']; ?>" class="h-size">
                    <input type="hidden" value="<?php echo $vo['rules']; ?>" class="h-rules">
                    <input type="hidden" value="<?php echo $vo['price']; ?>" class="h-price">
                    <input type="hidden" value="<?php echo $vo['is_private']; ?>" class="h-is_private">
                    <p data-toggle="modal" class="edit-btn" data-target="#myModal">编辑</p>
                    <p class="edit_del" add="<?php echo $vo['id']; ?>">删除</p>
                </div>
                <div class="img-div">
                    <a href="<?php echo url('component/detail'); ?>?id=<?php echo $vo['id']; ?>">
                        <img class="item-img img-responsive" src="<?php echo $vo['image']; ?>">
                    </a>
                </div>
                <ul class="list-group ul-list">
                    <li class="list-group-item item-title"><a href="<?php echo url('component/detail'); ?>?id=<?php echo $vo['id']; ?>"> <?php echo $vo['name']; ?> </a></li>
                    <li class="list-group-item">分类：<?php echo $vo['categories']['name']; ?></li>
                    <li class="list-group-item">详细名称：<?php echo $vo['description']; ?></li>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
        <?php echo $result['rows']->render(); ?>
    </div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade modal-mx" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-xm">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="<?php echo url('api/component/edit'); ?>">
                <?php echo token(); ?>
                <input id="c-id" name="id" type="hidden" value="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">设置信息</h4>
            </div>
            <div class="modal-body">
                <!--表单开始-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">构件名称</label>
                        <div class="col-xs-12 col-sm-7 form-control-div">
                            <input id="c-name" data-rule="required" class="form-control" name="name" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">构件分类</label>
                        <div class="col-xs-12 col-sm-7 form-control-div">
                            <div data-toggle="cxselect" data-selects="category_id,category_child_id" >
                                <select id="c-category_id" data-rule="required" data-url="ajax/category?type=component&pid=14" class="form-control category_id category-input" name="category_id">
<!--                                    <option selected value=""></option>-->
                                </select>
    <!--                            <input id="c-category_id" data-rule="required" data-source="category/selectpage" data-params='{"custom[type]":"component"}' class="form-control selectpage" name="row[category_id]" type="text" value="">-->
                                <select id="c-category_child_id" class="consumable form-control category_child_id category-input" data-value="顶面结构件" style="margin-left: 4%" data-rule="required" name="category_child_id" data-url="ajax/category" data-query-name="pid">

                                </select>
                            </div>
                        </div>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-12 col-sm-3"><?php echo __('Category_child_id'); ?>:</label>-->
<!--                        <div class="col-xs-12 col-sm-7">-->
<!--                            <input id="c-category_child_id" data-rule="required" data-source="category/child/index" class="form-control selectpage" name="row[category_child_id]" type="text" value="">-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">详细名称</label>
                        <div class="col-xs-12 col-sm-7 form-control-div">
                            <input id="c-description" class="form-control" name="description" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">构件尺寸</label>
                        <div class="col-xs-12 col-sm-7 form-control-div">
                            <input id="c-size" class="form-control" name="size" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">构建规则</label>
                        <div class="col-xs-12 col-sm-7 form-control-div">
                            <textarea id="c-rules" class="form-control" data-rule="required" name="rules" rows="4" cols="20"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">构件价格</label>
                        <div class="col-xs-12 col-sm-4 form-control-div">
                            <input id="c-price" placeholder="￥" class="form-control" step="0.01" name="price" type="number" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3">上传到</label>
                        <div class="col-xs-12 col-sm-7 form-control-div">
<!--                            <input id="c-is_private" data-rule="required" class="form-control" name="row[is_private]" type="number" value="">-->
<!--                            <?php echo build_radios('row[is_private]', ['0'=>'私有库', '1'=>'公有库'], 1); ?>-->


                                    <input id="is_private-1" name="is_private" class="is_private" type="radio" value="1"> 私有库
                                    <input id="is_private-2" checked="checked" class="is_private" name="is_private" type="radio" value="2"> 公有库
                        </div>
                    </div>


                <!--表单结束-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-edit" style="background: #E3E3E3;margin-right: 10px;" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-edit" style="background: #5044FF">保存</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
        </main>

        <footer class="footer" style="clear:both">
            <p class="copyright">Copyright&nbsp;©&nbsp;2017-2020 <?php echo $site['name']; ?> All Rights Reserved <a href="http://www.beian.miit.gov.cn" target="_blank"><?php echo htmlentities($site['beian']); ?></a></p>
        </footer>

        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>

    </body>

</html>