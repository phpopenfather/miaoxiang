<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:106:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\component\detail.html";i:1597906228;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
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

    .detail-div{
        padding: 40px 22px;
        background: #fff;
        border-radius: 40px;
    }
    .col-padd{
        padding: 0;
        margin-left: 15px;
    }
    .img-div{
        width: 418px;
        height: 418px;
        position: relative;
        display: table-cell;
        vertical-align: bottom;
        margin: 0 auto;
    }
    .img-div img{
        background: #ccc;
        display: block;
        margin: 0 auto;
    }

    .text-div{
        position: relative;
        padding: 23px 20px 0 50px;
        height: 418px;
        margin-left: -15px;
    }
    .detail-title{
        font-size: 22px;
        margin-bottom: 27px;
    }
    .detail-des{
        color: #8F8E96;
        font-size: 13px;
        width: 75%;
        min-height: 110px;
    }
    .detail-intro{
        color: #8F8E96;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .btn-div{
        position: absolute;
        bottom: 0;
        right: 2%;
    }
    .detail-btn{
        color: #fff;
        font-size: 16px;
        border-radius: 20px;
        width: 118px;
        height: 38px;
        margin: 0 7px;
    }
    .btn-div .detail-btn1{
        background: #5044FF !important;
    }
    .btn-div .detail-btn2{
        color: #5044FF;
        border: 1px solid #5044FF;
        background: none;
    }
    .detail-favorite{
        color: #fff !important;
        background: #5044FF !important;
    }
    .btn-div .detail-btn1:hover{
        color: #fff;
    }
    .btn-div .detail-btn3:hover{
        color: #fff;
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
    .img-div1{
        width: 240px;
        height: 239px;
        max-width: 240px;
        max-height: 239px;
        position: relative;
        display:table-cell;
        vertical-align:bottom;
        margin: 0 auto;
    }

    .item-list>div a .item-img{
        background: #ccc;
        display:block;
        margin: 0 auto;
        max-height: 239px;
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
    .item-title>a{
        font-size: 16px;
    }
    .item-title a{
        color: #000;
    }
    .similar{
        font-size: 23px;
        margin: 35px 0;
        padding-left: 10px;
    }
    .similar-div{
        width: 1320px;
        margin-left: -21px;
    }

    .rmb{
        color: #000;
    }
    .detail-price{
        color: #000;
        font-size: 19px;
    }

</style>
<div id="content-container" class="container">
    <div class="row">
        <div class="col-md-12 breadcrumb-div">
            <ul class="breadcrumb">
                <li><a class="breadcrumb-a-xm" href="<?php echo url('component/index'); ?>">我的构件</a></li>
                <li class="active">构件详情</li>
            </ul>
        </div>
    </div>

    <div class="row detail-div">
        <div class="col-md-4 col-padd" style="">
            <div class="img-div">
                <img class="img-responsive" src="<?php echo $detail->image; ?>">
            </div>
        </div>
        <div class="col-md-8 text-div">
            <p class="detail-title"><?php echo $detail->name; ?></p>
            <p class="detail-des"><?php echo $detail->description; ?></p>

            <p class="detail-intro">类别：<?php echo $detail->categories->name; ?></p>
            <p class="detail-intro">类别：板材饰品</p>
            <p class="detail-intro">尺寸：<?php echo $detail->size; ?></p>
            <p class="detail-intro">价格：<span class="rmb">￥</span><span class="detail-price"><?php echo $detail->price; ?></span>（1个）</p>
            <div class="btn-div">
                <button type="button" class="btn detail-btn detail-btn1">购买商品</button>
                <button type="button" id="favorite" idd="<?php echo $detail->id; ?>" class="btn detail-btn detail-btn2 <?php if($detail->favorite > 0): ?>detail-favorite<?php endif; ?>"><?php if($detail->favorite > 0): ?>已收藏<?php else: ?>收藏<?php endif; ?></button>
                <button type="button" class="btn detail-btn detail-btn3">去使用</button>
            </div>
        </div>
    </div>
    <div class="row similar-div">
        <p class="similar">推荐相似</p>
        <?php foreach($result['rows'] as $vo): ?>
        <div class="col-lg-1-5 item-list">
            <div class="item-list-div">
                <div class="img-div1">
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

</div>
        </main>

        <footer class="footer" style="clear:both">
            <p class="copyright">Copyright&nbsp;©&nbsp;2017-2020 <?php echo $site['name']; ?> All Rights Reserved <a href="http://www.beian.miit.gov.cn" target="_blank"><?php echo htmlentities($site['beian']); ?></a></p>
        </footer>

        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>

    </body>

</html>