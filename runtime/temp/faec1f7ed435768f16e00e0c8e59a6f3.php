<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"D:\phpstudy_pro\WWW\miaoxiang_php\website\miaoxiang\addons\message\view\hook\user_sidenav_after.html";i:1597976605;}*/ ?>
<ul class="list-group">
    <li class="list-group-item <?php echo $controllername =='message'?'active':''; ?>"><a href="<?php echo url('index/message/index'); ?>"><i class="fa fa-bullhorn"></i> <?php echo __('消息中心'); ?></a></li>
</ul>