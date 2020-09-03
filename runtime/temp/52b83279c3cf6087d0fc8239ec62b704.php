<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:106:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\component\upload.html";i:1597808098;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:97:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\comsidenav.html";i:1599032234;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
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
    /*.btn-add{*/
    /*    border-radius: 20px;*/
    /*    border: 1px solid #46c37b;*/
    /*    padding: 10px 40px;*/
    /*    color: #46c37b;*/
    /*}*/
    /*.component-jumbotron{*/
    /*    background: none;*/
    /*    text-align: center;*/
    /*}*/

    /*.component-image-container {*/
    /*    position:relative;*/
    /*    width:100%;*/
    /*    height: 100%;*/
    /*}*/
    /*.component-image-container .component-img{*/
    /*    width:280px;*/
    /*    height:150px;*/
    /*    margin: 0 auto;*/
    /*    padding: 3px;*/

    /*}*/
    /*#plupload-attachfile{*/
    /*    width: 280px;*/
    /*    height: 150px;*/
    /*}*/
    /*.component-image-container .component-image-text {*/
    /*    background: #F7F7F5;*/
    /*    display:block;*/
    /*    position:absolute;*/
    /*    height:150px;*/
    /*    width:280px;*/
    /*    background:#F7F7F5;*/
    /*    border-radius: 10px;*/
    /*    !*opacity: .3;*!*/
    /*    color: #46c37b;*/
    /*    top:0;*/
    /*    left:0;*/
    /*    line-height: 100px;*/
    /*    text-align: center;*/
    /*}*/
    /*.component-image-container:hover .component-image-text {*/

    /*}*/
    /*.component-image-container button{*/
    /*    position:absolute;*/
    /*    top:0;*/
    /*    left:0;*/
    /*    width:100%;*/
    /*    height:100%;*/
    /*    opacity: 0;*/
    /*}*/

    /*.inline-form{*/
    /*    width: 50%;*/
    /*    float: left;*/
    /*    display: inline;*/
    /*}*/

    .upload-div{
        background: #fff;
        width: 100%;
        border-radius: 35px;
        padding: 50px 0;
    }
    #upload-form{
        text-align: center;
    }
    .upload-form-div{
        margin: 0 auto;
        float: none;
        font-size: 14px;
    }
    .form-group >.col-sm-2{

    }
    .form-group .control-label{
        padding-top: 9px;
    }
    .form-group .form-control-input{
        border-radius: 4px;
        height: 38px;
        padding: 7px 17px;
        border-color: #E3E3E3;
    }
    .form-control-div >textarea{
        border-radius: 4px;
        padding: 7px 17px;
        border-color: #E3E3E3;
    }
    .form-control-div >.radio{
        text-align: left;
    }
    .form-control-div >.radio label{
        margin-right: 13px;
    }
    .form-control-div{
        padding-left: 0px;
    }


    .upload-img-container {
        position:relative;
        width:120px;
        float: left;
        overflow: hidden;
        border-radius: 15px;
        /*background: #F7F7F5;*/
    }
    .upload-bg{
        background-image: url("/assets/img/upload-img.png");
        background-repeat: no-repeat;
        background-size: 100%;
    }
    .upload-file-bg{
        background-image: url("/assets/img/upload-file.png");
        background-repeat: no-repeat;
        background-size: 100%;
    }
    .upload-img-container .upload-img{
        width:120px;
        height:120px;
    }
    .upload-img-container .upload-img-text {
        display:none;
        opacity: 0;
    }
    .upload-img-container:hover .upload-img-text {
        display:block;
        position:absolute;
        height:120px;
        width:120px;
        background:#444;
        color: #fff;
        top:0;
        left:0;
        line-height: 120px;
        text-align: center;
    }
    .upload-img-container button{
        position:absolute;
        top:0;left:0;width:120px;height:120px;opacity: 0;
    }
    .upload-p{
        color: #8F8E96;
        font-size: 12px;
        float: left;
        line-height: 22px;
        margin: 39px 0 0 20px;
        text-align: left;
    }
    .file-text{
        position: absolute;
        top: 0;
        left: 0;
        width: 120px;
        height: 120px;
        opacity: 0;
        background: #F7F7F5;
        font-size: 12px;
        color: #8F8E96;
        padding: 18px 5px;
        text-align: justify;
        word-wrap:break-word;
    }
    .upload-btn-div{
        padding-left: 50px;
        text-align: left
    }
    .upload-btn-div button{
        padding: 9px 39px;
        font-size: 13px;
        border: none;
        border-radius: 16px;
    }
    .upload-btn-div .reset{
        background: #E3E3E3;
        color: #fff;
    }
    .upload-btn-div .sub{
        background: #5044FF;
        margin-left: 13px;
        color: #fff;
    }
    .category-div .msg-box{
        position: absolute;
        right: -93%;
        /*left: 108%;*/
    }
    .form-group-div >.form-group{
        margin: 0;
    }
    .msg-div .msg-box{
        right: 54%;
    }
    .layer-footer{
        margin-top: 50px;
    }

</style>
<div id="content-container" class="container">

    <div class="row">
        <div class="col-md-12 breadcrumb-div">
            <ul class="breadcrumb">
                <li><a class="breadcrumb-a-xm" href="<?php echo url('component/index'); ?>">我的构件</a></li>
                <li class="active">上传构件</li>
            </ul>
        </div>
    </div>

    <div class="row upload-div">
        <div class="col-md-8 upload-form-div" style="">
            <form id="upload-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="<?php echo url('api/component/upload'); ?>">

                    <?php echo token(); ?>

                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Component name'); ?></label>
                        <div class="col-xs-12 col-sm-6 form-control-div">
                            <input id="c-name" data-rule="required" placeholder="请输入<?php echo __('Component name'); ?>（必填）" class="form-control form-control-input" name="name" type="text" value="">
                        </div>
                    </div>

                    <div data-toggle="cxselect" class="category-div" data-selects="category_id,category_child_id" >
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-2"><?php echo __('Component category'); ?></label>
                            <div class="col-xs-12 col-sm-3 form-control-div">
                                <select id="c-category_id" data-rule="required" data-url="ajax/category?type=component&pid=14" class="form-control form-control-input category_id" name="category_id"></select>
                            </div>
                            <div class="col-xs-12 col-sm-3 form-control-div">
                                <select id="c-category_child_id" class="consumable form-control form-control-input category_child_id" data-rule="required" name="category_child_id" data-url="ajax/category" data-query-name="pid"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Description'); ?></label>
                        <div class="col-xs-12 col-sm-9 form-control-div">
                            <input id="c-description" data-rule="required" class="form-control form-control-input" placeholder="请输入<?php echo __('Description'); ?>（必填）" name="description" type="text" value="">
                        </div>
                    </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Component size'); ?></label>
                    <div class="col-xs-12 col-sm-9 form-control-div">
                        <input id="c-size" class="form-control  form-control-input" placeholder="请输入<?php echo __('Component size'); ?>" name="size" type="text" value="">
                    </div>
                </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Component rules'); ?></label>
                        <div class="col-xs-12 col-sm-9 form-control-div" style="height: 152px;">
                            <textarea id="c-rules" placeholder="请输入<?php echo __('Component rules'); ?>（必填）"  class="form-control"  data-rule="required" name="rules" rows="8" cols="20"></textarea>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Component price'); ?></label>
                    <div class="col-xs-12 col-sm-4 form-control-div">
                        <input id="c-price" placeholder="￥人民币（必填）" data-rule="required" class="form-control form-control-input" step="0.01" name="price" type="number" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-2">上传到</label>
                    <div class="col-xs-12 col-sm-4 form-control-div">
                        <?php echo build_radios('is_private', ['1'=>'私有库', '2'=>'公有库']); ?>
                    </div>
                </div>
                    <div class="form-group form-group-div" style="padding-top: 15px;">
                        <p class="control-label" style="text-align: left;padding-left: 56px;margin-bottom: 18px;">构件文件</p>
                        <div class="col-xs-12 col-sm-6 form-control-div form-group msg-div" style="padding-left: 50px;">
                            <input id="c-image" data-rule="required" name="image" type="hidden" value="">
                            <div class="upload-img-container upload-bg">
                                <img class="upload-img img-responsive plupload upload-img-url" src="" alt="">
                                <div id="upload-img-text" class="upload-img-text"><?php echo __('Click to edit'); ?></div>
                                <button id="plupload-img" class="plupload" data-input-id="c-image" data-mimetype="image/jpeg,image/png,image/jpg" data-multiple="false"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button>
                            </div>
                            <p class="upload-p">单个文件大小不超过5M；<br>支持JPEG、PNG文件格式；</p>
<!--                            <div class="input-group">-->
<!--                                <input id="c-image" data-rule="required" class="form-control form-control-input" size="50" name="image" type="text" value="">-->
<!--                                <div class="input-group-addon no-border no-padding">-->
<!--                                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>-->
<!--                                </div>-->
<!--                                <span class="msg-box n-right" for="c-image"></span>-->
<!--                            </div>-->
<!--                            <ul class="row list-inline plupload-preview" id="p-image"></ul>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 form-control-div msg-div form-group">
                            <input id="c-attachfile" data-rule="required" name="attachfile" type="hidden" value="">
                            <div class="upload-img-container upload-file-bg">
                                <img class="upload-img img-responsive plupload" src="" alt="">
                                <div class="file-text"></div>
                                <div id="upload-file-text" class="upload-img-text"><?php echo __('Click to edit'); ?></div>
                                <button id="plupload-attachfile" class="plupload" data-mimetype="FBX" data-input-id="c-attachfile" data-multiple="false"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button>
                            </div>
                            <p class="upload-p">单个文件大小不超过200M；<br>支持fbx文件格式；</p>
                        </div>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Attachfile'); ?></label>-->
<!--                        <div class="col-xs-12 col-sm-9 form-control-div">-->
<!--                            <div class="input-group">-->
<!--                                <input id="c-attachfile" data-rule="required" class="form-control form-control-input" size="50" name="attachfile" type="text" value="">-->
<!--                                <div class="input-group-addon no-border no-padding">-->
<!--                                    <span><button type="button" id="plupload-attachfile" class="btn btn-danger plupload" data-input-id="c-attachfile" data-multiple="false" data-preview-id="p-attachfile"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>-->
<!--                                </div>-->
<!--                                <span class="msg-box n-right" for="c-attachfile"></span>-->
<!--                            </div>-->
<!--                            <ul class="row list-inline plupload-preview" id="p-attachfile"></ul>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="form-group layer-footer">
                        <label class="control-label col-xs-12 col-sm-2"></label>
                        <div class="col-xs-12 col-sm-12 form-control-div upload-btn-div">
                            <button type="reset" class="reset btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
                            <button type="submit" class="sub btn btn-success btn-embossed disabled"><?php echo __('Save'); ?></button>
                        </div>
                    </div>

                </form>
        </div>
    </div>

    <div style="display: none" class="row">
        <div class="col-md-3">
            <style>
    .comsidenav .list-group-heading{
        width: 100%;
        text-align: center;
        margin-left: 0 !important;
        color: #3A3C3C !important;
        font-size: 17px !important;
        padding-bottom: 28px;
        border-bottom: 2px solid #F5F5F5;
        margin-bottom: 0 !important;
    }
    .list-group-heading img{
        margin-right: 8px;
    }
    .list-group-heading span{
        margin-left: 8px;
    }
    .comsidenav{
        padding-top: 28px;
        background: #F9FAFC;
    }
    .sidenav .list-group .list-group-item > a{
        padding: 0;
    }
    .sidenav .list-group .list-group-item{
        border-left: none;
    }

    li{list-style:none}
    a{text-decoration:none}
    /*.nav-c{width:220px;height:100%;background:#263238;transition:all .3s}*/
    .nav-c a{display:block;overflow:hidden;padding-left:30px;line-height:50px;max-height:50px;color:#3A3C3C;font-size:16px;transition:all .3s}
    /*.nav-c a span{margin-left:30px}*/
    .nav-item{position:relative}
    .nav-item.nav-show{border-bottom:0}
    .nav-item ul{display:none;}
    .nav-item.nav-show ul{display:block}
    /*.nav-item>a:before{content:"";position:absolute;left:0;width:2px;height:50px;background:#34a0ce;opacity:0;transition:all .3s}*/
    .nav-c .nav-icon{font-size:20px;position:absolute;margin-left:-1px}
    .icon_1::after{content:"\e62b"}
    .icon_2::after{content:"\e669"}
    .icon_3::after{content:"\e61d"}
    .nav-more{
        float:right;
        margin-right:20px;
        font-size:22px;
        transition:transform .3s;
        height: 50px;
        line-height: 50px;
    }
    .icon{
        display: inline-block;
        transition:all .3s;
        width: 15px;
        height: 15px;
        background-repeat: no-repeat;
        background-size: 100%;
        vertical-align: middle;
        margin-bottom: 2px;
    }
    .nav-item1 .icon{background-image: url("/assets/img/shouye.png");}
    .nav-item2 .icon{background-image: url("/assets/img/guanli.png");}
    .nav-item3 .icon{width:16px;background-image: url("/assets/img/qiye.png");}
    .nav-item4 .icon{width:16px;background-image: url("/assets/img/goujian.png");}
    .nav-item1>a:hover .icon{background-image: url("/assets/img/shouye-w.png") !important;}
    .nav-item2>a:hover .icon{background-image: url("/assets/img/guanli-w.png") !important;}
    .nav-item3>a:hover .icon{background-image: url("/assets/img/qiye-w.png") !important;}
    .nav-item4>a:hover .icon{background-image: url("/assets/img/goujian-w.png") !important;}
    .nav-show .nav-more{transform:rotate(180deg);color: #fff}
    .nav-show,.nav-item>a:hover{color:#fff;background:#72D6E5}
    .nav-show>a:before,.nav-item>a:hover:before{opacity:1}
    .item-icon{
        display: inline-block;
        transition:all .3s;
        width: 15px;
        height: 15px;
        background-repeat: no-repeat;
        background-size: 100%;
        vertical-align: middle;
        margin-bottom: 2px;
    }
    .nav-item2 .item-icon1{background-image: url("/assets/img/fenfa.png");}
    .nav-item4 .item-icon1{background-image: url("/assets/img/upload.png");}
    .nav-item4 .item-icon2{background-image: url("/assets/img/qi.png");}
    .nav-item2 li:hover .item-icon1{background-image: url("/assets/img/fenfa-l.png");}
    .nav-item4 li:hover .item-icon1{background-image: url("/assets/img/upload-l.png");}
    .nav-item4 li:hover .item-icon2{background-image: url("/assets/img/qi-l.png");}
    .nav-show>a span{
        color: #fff;
    }
    .nav-show>ul{
        background: #fff !important;
    }
    .nav-item li:hover a{color: #72D6E5}

    .color-72D6E5{
        color: #72D6E5
    }
</style>
<div class="sidenav comsidenav nav-c">
    <?php echo hook('component_sidenav_before'); ?>
    <ul class="list-group">
        <li class="list-group-heading"><img src="/assets/img/logo_sm.png">&bull;<span>企业中心</span></li>
        <li class="nav-item nav-item1"> <a href="<?php echo url('component/mylist'); ?>"><i class="icon"></i> <span>首页</span></a> </li>
<!--        <li class="list-group-item <?php echo $config['actionname']=='upload'?'active':''; ?>"> <a href="<?php echo url('component/upload'); ?>"><i class="fa fa-user-circle fa-fw"></i> <?php echo __('Upload component'); ?></a> </li>-->
        <li class="nav-item nav-item2">
            <a href="javascript:;"><i class="icon"></i> <span>管理账号</span><i class="fa fa-angle-up nav-more"></i></a>
            <ul class="item-ul">
                <li><a href="javascript:;"><i class="item-icon item-icon1"></i> <span>分发账号</span></a></li>
            </ul>
        </li>
        <li class="nav-item nav-item3">
            <a href="javascript:;"><i class="icon"></i> <span>企业信息</span><i class="fa fa-angle-up nav-more"></i></a>
            <ul class="item-ul">
                <li><a href="javascript:;"><i class="item-icon item-icon1"></i> <span>企业认证</span></a></li>
                <li><a href="javascript:;"><i class="item-icon item-icon2"></i> <span>基本资料</span></a></li>
            </ul>
        </li>
        <li class="nav-item nav-item4 <?php echo $config['actionname']=='mylist'?'nav-show':''; ?>">
            <a href="<?php echo url('component/mylist'); ?>"><i class="icon" style='background-image: url("<?php echo $config['actionname']=='mylist'?'/assets/img/goujian-w.png':''; ?>")'></i> <span>我的构件</span><i class="fa fa-angle-up nav-more"></i></a>
            <ul class="item-ul4">
                <li><a href="javascript:;"><i class="item-icon item-icon1" style="<?php if($config['actionname'] == 'upload'): ?>background-image: url('/assets/img/upload-l.png')<?php endif; ?>"></i> <span class="<?php if($config['actionname'] == 'upload'): ?>color-72D6E5<?php endif; ?>">上传构件</span></a></li>
                <li><a href="javascript:;"><i class="item-icon item-icon2"></i> <span>专属企业码</span></a></li>
            </ul>
        </li>
    </ul>
    <?php echo hook('component_sidenav_after'); ?>
</div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h2 class="page-header">
                        <?php echo __('Upload component'); ?>
                    </h2>

                </div>
            </div>
        </div>
    </div>
</div>
        </main>

        <footer class="footer" style="clear:both">
            <p class="copyright">Copyright&nbsp;©&nbsp;2017-2020 <?php echo $site['name']; ?> All Rights Reserved <a href="http://www.beian.miit.gov.cn" target="_blank"><?php echo htmlentities($site['beian']); ?></a></p>
        </footer>

        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>

    </body>

</html>