<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:103:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\message\index.html";i:1597976605;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\sidenav.html";i:1597112841;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
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
    .statistics h5 {
        margin: 0;
        padding: 15px 0;
        font-size: 16px;
        color: #616161;
    }

    .statistics > div {
        padding: 0 10px;
    }

    .statistics .panel-body span {
        font-size: 16px;
        font-family: Arial, verdana, tahoma;
    }

    .panel-statistics h5 {
        padding-bottom: 0px;
        font-weight: 500;
    }

    .charts h2, .orders h2 {
        font-size: 16px;
    }

    .orders .nav-tabs > li > a {
        font-size: 14px;
        color: #666;
    }

    .orders .nav-tabs > li.active > a, .orders .nav-tabs > li.active > a:hover, .orders .nav-tabs > li.active > a:focus {
        border-color: transparent;
        border-bottom-color: #0084ff;
        color: #444;
    }

    .orders .nav > li > a:hover, .orders .nav > li > a:active, .orders .nav > li > a:focus {
        background: none;
        border-left-color: transparent;
        border-top-color: transparent;
        border-right-color: transparent;
    }

    .orders .table thead tr th {
        font-weight: 400;
    }
    .orders .table tbody tr td {
        text-align: center;
    }
</style>
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
            <div class="row statistics">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-title">
                            <h5>消息中心</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default orders" style="min-height: 300px">
                <div class="panel-body mt-2" style="padding:0;">
                    <ul class="nav nav-tabs">
                        <?php if(is_array($messageTypeList) || $messageTypeList instanceof \think\Collection || $messageTypeList instanceof \think\Paginator): if( count($messageTypeList)==0 ) : echo "" ;else: foreach($messageTypeList as $key=>$vo): ?>
                        <li <?php if((!\think\Request::instance()->get('type') && $key == 'system') || \think\Request::instance()->get('type') == $key): ?>class="active"<?php endif; ?>>
                        <a href="?type=<?php echo $key; ?>" class="px-0 mr-3"><h2 class="mb-1"><?php echo $vo; ?></h2></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Message_id'); ?></th>
                                <th class="text-center"><?php echo __('Message_title'); ?></th>
                                <th class="text-center hidden-xs"><?php echo __('Createtime'); ?></th>
                                <th class="text-center"><?php echo __('Status'); ?></th>
                                <th class="text-center"><?php echo __('Operate'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                            <tr>
                                <td><?php echo $vo['rec_id']; ?></td>
                                <td><?php echo $vo['messagenotice']['message_title']; ?></td>
                                <td><?php echo date('Y-m-d H:i',$vo['createtime']); ?></td>
                                <td><?php if($vo['is_see'] == 1): ?><span style="color:green">已读</span><?php else: ?><span style="color:red">未读</span><?php endif; ?></td>
                                <td>
                                    <a target="_self" href="<?php echo url('message/details',['rec_id'=>$vo['rec_id']]); ?>}"><?php echo __('More'); ?></a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <div class="pager">
                            <?php echo $list->render(); ?>
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