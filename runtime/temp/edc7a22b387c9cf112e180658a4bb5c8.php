<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:106:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\component\mylist.html";i:1599043064;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:97:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\comsidenav.html";i:1599032234;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
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

    .container{
        padding-left: 0;
        padding-right: 0;
    }
    .sidenav{
        border: none;
    }
    .panel-default{
        border: none;
    }
    .mytitle{
        font-size: 18px;
        color: #3A3C3C;
        font-family: pingfang;
    }
    .upload-g{
        color: #899294;
        font-size: 16px;
        margin-left: 13px;
    }
    .upload-g:hover{
        color: #899294;
    }
    .panel-body{
        padding: 15px 0;
    }
    .page-header{
        padding-left: 23px;
        margin-top: 12px !important;
        margin-bottom: 2px !important;
        padding-bottom: 28px !important;
        border-bottom: 2px solid #F5F5F5;
    }
    .list-nav{
        padding: 0 10px;
    }
    .list-nav>li{
        float: left;
        margin-left: 5px;
    }
    .list-nav>li>a{
        color: #202020 !important;
        font-size: 16px;
        background: none !important;
        transition: all 0.3s ease;
        padding: 13px 8px 6px;
        margin: 0 9px;
        border-top: none;
        border-radius: unset !important;
    }
    .nav-span{
        float: right;
        position: relative;
        z-index: 1;
        color: #fff;
        font-size: 14px;
        background: #E3E3E3;
        transition: all 0.3s ease;
        cursor: pointer;
        vertical-align: bottom;
        margin: 13px 7px 0 0 ;
    }
    .nav-span:hover{
        background: #72D6E5;
    }
    .nav-span:hover .select-span{
        display: block;
    }
    .nav-bg{
        background: #72D6E5;
    }
    .img-div{
        width: 239px;
        height: 239px;
        max-height: 239px;
        text-align: center;
        position: relative;
        display: table-cell;
        vertical-align: bottom;
        margin: 0 auto;
    }
    .img-div a img{
        background: #ccc;
        display: block;
        margin: 0 auto;
        max-height: 239px;
    }
    .nav-text{
        display: inline-block;
        padding: 6px 20px;
    }
    .select-span{
        position: absolute;
        width: 100%;
        background: #0a6aa1;
        display: inline-block;
        left: 0;
        display: none;
        top: 32px;
        background: #fff;
        padding: 4px 0;
        box-shadow: rgba(0,0,0,.1) 0px 0px 1px;
    }
    .select-span a{
        color: #868F91;
        font-size: 16px;
        display: block;
        transition: all 0.3s ease;
        text-align: center;
        padding: 5px 0;
    }
    .select-span a:hover{
        color: #72D6E5;
    }
    .nav-pills > li.active > a{
        border-bottom: 4px solid #72D6E5;
    }
    .tab-content{
        padding: 0 15px;
    }
    .list-content{
        margin-top: 14px;
        padding: 0 23.988px;
    }
    .list-item{
        padding: 0 8px;
    }
    .item-div{
        position: relative;
        max-width: 100%;
        width: 100%;
        transition:all .3s;
    }
    .item-div:hover{
        box-shadow: rgba(0,0,0,.2) 0px 0px 4px;
    }
    .checkbox-div{
        position: absolute;
        width: 22px;
        height: 22px;
        cursor: pointer;
        right: 11px;
        border-radius: 20px;
        top: 12px;
        z-index: 1;
        opacity: 0;
        background: #fff;
        background-position: center center;
        background-repeat: no-repeat;
        transition: all 0.3s ease;
        box-shadow: rgba(0,0,0,.2) 0px 0px 3px;
    }
    .checkbox-click{
        opacity: 1;
    }
    .checkbox-bg{
        background-image: url("/assets/img/yes.png");
    }
    .checkbox-div input{
        width: 22px;
        height: 22px;
        cursor: pointer;
        opacity: 0;
        margin-top: 0;
        z-index: 8;
    }
    .item-div:hover .checkbox-div{
        /*display: block;*/
        /*opacity: 1;*/
    }
    .ul-list{
        border: 1px solid #E5E5E5;
        padding: 5px 0 5px;
     }
    .ul-list li{
        text-align: center;
        color: #8F8E96;
        font-size: 12px;
        border: none;
        padding: 4px 15px;
    }
    .item-title a{
        color: #000;
        font-size: 14px;
    }
    .last-li{
        padding-top: 3px !important;
    }
    .last-li .star{
        vertical-align: top;
        margin-right: 5px;
    }

    .page{
        text-align: right;
        padding-right: 10px;
    }
    

    @media (min-width: 992px){
        .col-md-my-3 {
            width: 19.324%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-left: 15px;
        }
        .col-md-my-9{
            width: 80.676%;
            float: left;
            padding-left: 18px;
            padding-right: 15px;
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
        <div class="col-md-my-3">
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
        <div class="col-md-my-9">
            <div class="panel">
                <div class="panel-body">
                    <h2 class="page-header">
                        <span class="mytitle">我的构件</span>
                        <a href="<?php echo url('component/upload'); ?>" class="upload-g">上传你的构件</a>
                    </h2>
                    <div class="list-baseinfo">
                        <!-- 导航区 -->

                        <ul class="nav list-nav nav-pills" role="tablist">
                            <li role="presentation" class="<?php if(!isset($_GET['category_id'])) echo 'active'; ?>">
                                <a href="#home" role="tab" class="tab" val="" data-toggle="tab">全部</a>
                            </li>
                            <li role="presentation" class="<?php if(isset($_GET['category_id']) && $_GET['category_id'] == 15) echo 'active'; ?>">
                                <a href="#home" class="tab" val="15" role="tab" data-toggle="tab">组合</a>
                            </li>
                            <li role="presentation" class="<?php if(isset($_GET['category_id']) && $_GET['category_id'] == 17) echo 'active'; ?>">
                                <a href="#home" class="tab" val="17" role="tab" data-toggle="tab">部品</a>
                            </li>
                            <li role="presentation" class="<?php if(isset($_GET['category_id']) && $_GET['category_id'] == 16) echo 'active'; ?>">
                                <a href="#home" class="tab" val="16" role="tab" data-toggle="tab">构件</a>
                            </li>
                            <li role="presentation">
                                <a href="#settings" class="" val="" role="tab" data-toggle="tab">test</a>
                            </li>
                            <div class="nav-span" id="nav-span">
                                <span class="nav-text">编辑</span>
                                <span class="select-span" id="select-span">
                                    <input type="checkbox" style="display: none" value="" class="select-tmp">
                                    <a href="javascript:;" id="select-all" class="select-all">多选</a>
                                    <a href="javascript:;" id="del">删除</a>
                                </span>
                            </div>
                        </ul>
                        <!-- 面板区 -->
                        <div class="tab-content list-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <?php foreach($result['rows'] as $vo): ?>
                                    <div class="col-md-3 list-item">
                                        <div class="item-div">
                                            <div class="checkbox-div">
                                                <input type="checkbox" class="checkbox-input" name="checkbox-input" value="<?php echo $vo['id']; ?>">
                                            </div>
                                            <div class="img-div">
                                                <a href="<?php echo url('component/detail'); ?>?id=<?php echo $vo['id']; ?>">
                                                    <img class="img-responsive" src="<?php echo $vo['image']; ?>">
                                                </a>
                                            </div>
                                            <ul class="list-group ul-list">
                                                <li class="list-group-item item-title"><a href="<?php echo url('component/detail'); ?>?id=<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a></li>
                                                <li class="list-group-item">分类：<?php echo $vo['categories']['name']; ?></li>
                                                <li class="list-group-item last-li"><img class="star" src="/assets/img/star.png">2468次收藏</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="page">
                                    <?php echo $result['rows']->render(); ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">构件2</div>
                            <div role="tabpanel" class="tab-pane tab-pane3" id="messages">构件3</div>
                            <div role="tabpanel" class="tab-pane tab-pane4" id="settings">构件4</div>
                        </div>
                    </div>
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