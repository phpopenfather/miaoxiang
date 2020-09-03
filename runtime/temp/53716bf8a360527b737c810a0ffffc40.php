<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:103:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\public/../application/index\view\user\register.html";i:1598436922;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\layout\default.html";i:1599032182;s:91:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\meta.html";i:1596610657;s:94:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\captcha.html";i:1596610657;s:93:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\application\index\view\common\script.html";i:1596610657;}*/ ?>
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
    .login-section{
        width: 900px;
        height: 560px;
        border: none;
        margin: 160px auto;
        padding: 15px 176px;
    }

    .login-title{
        font-size: 24px;
        color: #3A3C3C;
        text-align: center;
        margin: 23px 0;
    }
    .login-section .control-label{
        font-size: 17px;
        color: #3A3C3C;
        padding-right: 3px;
    }
    .sign-up{
        width: 149px;
        height: 40px;
        font-size: 18px;
        color: #fff;
        background: #72D6E5;
        border-radius: 4px;
        margin: 5px auto 0;
        display: block;
    }
    .sign-up:hover{
        color: #fff;
    }
    .i_txt p a{
        color: #72D6E5;
    }
    .i_txt p{
        margin-top: 15px;
        margin-bottom: 15px;
        text-align: center;
        color: #899294;
        font-size: 16px;
    }
    .login-section .n-bootstrap .n-right{
        text-align: left;
        left: 394px;
    }
    .form-control{
        border-color: #BEC8CA;
        font-size: 17px;
        color: #899294;
    }
</style>
<div id="content-container" class="container">
    <div class="user-section login-section">
<!--        <div class="logon-tab clearfix"> <a href="<?php echo url('user/login'); ?>?url=<?php echo urlencode($url); ?>"><?php echo __('Sign in'); ?></a> <a class="active"><?php echo __('Sign up'); ?></a> </div>-->
        <p class="login-title">注册秒象</p>
        <div class="login-main"> 
            <form name="form1" id="register-form" class="form-horizontal" method="POST" action="">
                <input type="hidden" name="invite_user_id" value="0" />
                <input type="hidden" name="url" value="<?php echo $url; ?>" />
                <?php echo token(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label required"><?php echo __('Email'); ?><span class="text-success"></span></label>
                    <div class="col-sm-10 controls">
                        <input type="text" name="email" id="email" data-rule="required;email" class="form-control input-lg" placeholder="<?php echo __('Email'); ?>">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __('Username'); ?></label>
                    <div class="col-sm-10 controls">
                        <input type="text" id="username" name="username" data-rule="required;username" class="form-control input-lg" placeholder="<?php echo __('Username must be 3 to 30 characters'); ?>">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __('Password'); ?></label>
                    <div class="col-sm-10 controls">
                        <input type="password" id="password" name="password" data-rule="required;password" class="form-control input-lg" placeholder="<?php echo __('Password must be 6 to 30 characters'); ?>">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">手机</label>
                    <div class="col-sm-10 controls">
                        <input type="text" id="mobile" name="mobile" data-rule="required;mobile" class="form-control input-lg" placeholder="<?php echo __('Mobile'); ?>">
                        <p class="help-block"></p>
                    </div>
                </div>

                <?php if($captchaType): ?>
                <div class="form-group">
                    <label class="control-label"><?php echo __('Captcha'); ?></label>
                    <div class="controls">
                        <div class="input-group">
                            <!--@formatter:off-->
<?php if("" == 'email'): ?>
    <input type="text" name="captcha" class="form-control input-lg" data-rule="required;length(4);integer[+];remote(<?php echo url('api/validate/check_ems_correct'); ?>, event=register, email:#email)" />
    <span class="input-group-btn" style="padding:0;border:none;">
        <a href="javascript:;" class="btn btn-info btn-captcha btn-lg" data-url="<?php echo url('api/ems/send'); ?>" data-type="email" data-event="register">发送验证码</a>
    </span>
<?php elseif("" == 'mobile'): ?>
    <input type="text" name="captcha" class="form-control input-lg" data-rule="required;length(4);integer[+];remote(<?php echo url('api/validate/check_sms_correct'); ?>, event=register, mobile:#mobile)" />
    <span class="input-group-btn" style="padding:0;border:none;">
        <a href="javascript:;" class="btn btn-info btn-captcha btn-lg" data-url="<?php echo url('api/sms/send'); ?>" data-type="mobile" data-event="register">发送验证码</a>
    </span>
<?php elseif("" == 'wechat'): if(get_addon_info('wechat')): ?>
        <input type="text" name="captcha" class="form-control input-lg" data-rule="required;length(4);remote(<?php echo addon_url('wechat/captcha/check'); ?>, event=register)" />
        <span class="input-group-btn" style="padding:0;border:none;">
            <a href="javascript:;" class="btn btn-info btn-captcha btn-lg" data-url="<?php echo addon_url('wechat/captcha/send'); ?>" data-type="wechat" data-event="register">获取验证码</a>
        </span>
    <?php else: ?>
        请在后台插件管理中安装《微信管理插件》
    <?php endif; elseif("" == 'text'): ?>
    <input type="text" name="captcha" class="form-control input-lg" data-rule="required;length(4)" />
    <span class="input-group-btn" style="padding:0;border:none;">
        <img src="<?php echo captcha_src(); ?>" width="100" height="40" onclick="this.src = '<?php echo captcha_src(); ?>?r=' + Math.random();"/>
    </span>
<?php endif; ?>
<!--@formatter:on-->
                        </div>
                        <p class="help-block"></p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <div class="item i_txt">
                        <p class="col-sm-offset-2 col-sm-10">
                            <input checked="checked" id="inputacc" type="checkbox">
                            我同意并遵守<a target="_blank" href="">《秒象服务协议》</a><a target="_blank" href="">《隐私政策》</a>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn sign-up">立即加入</button>
                    </div>
                </div>
            </form>
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