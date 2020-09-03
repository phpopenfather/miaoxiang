<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:104:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\user\changepwd.html";i:1596610657;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\sidenav.html";i:1597112841;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
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
            <div id="content-container" class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidenav">
    <?php echo hook('user_sidenav_before'); ?>
    <ul class="list-group">
        <li class="list-group-heading"><?php echo __('Member center'); ?></li>
        <li class="list-group-item <?php echo $config['actionname']=='index'?'active':''; ?>"> <a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i> <?php echo __('User center'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='profile'?'active':''; ?>"> <a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i> <?php echo __('Profile'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='changepwd'?'active':''; ?>"> <a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i> <?php echo __('Change password'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='logout'?'active':''; ?>"> <a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> <?php echo __('Sign out'); ?></a> </li>
    </ul>
    <?php echo hook('user_sidenav_after'); ?>
</div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="page-header"><?php echo __('Change password'); ?></h2>
                    <form id="changepwd-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">
                        <?php echo token(); ?>
                        <div class="form-group">
                            <label for="oldpassword" class="control-label col-xs-12 col-sm-2"><?php echo __('Old password'); ?>:</label>
                            <div class="col-xs-12 col-sm-4">
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" value="" data-rule="required" placeholder="<?php echo __('Old password'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newpassword" class="control-label col-xs-12 col-sm-2"><?php echo __('New password'); ?>:</label>
                            <div class="col-xs-12 col-sm-4">
                                <input type="password" class="form-control" id="newpassword" name="newpassword" value="" data-rule="required" placeholder="<?php echo __('New password'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="renewpassword" class="control-label col-xs-12 col-sm-2"><?php echo __('Renew password'); ?>:</label>
                            <div class="col-xs-12 col-sm-4">
                                <input type="password" class="form-control" id="renewpassword" name="renewpassword" value="" data-rule="required" placeholder="<?php echo __('Renew password'); ?>" />
                            </div>
                        </div>

                        <div class="form-group normal-footer">
                            <label class="control-label col-xs-12 col-sm-2"></label>
                            <div class="col-xs-12 col-sm-8">
                                <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('Submit'); ?></button>
                                <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
                            </div>
                        </div>
                    </form>
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