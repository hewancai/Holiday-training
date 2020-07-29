<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta name="Keywords" content="<?php echo e(\App\Config::getConfig('keywords')); ?>" />
    <meta name="Description" content="<?php echo e(\App\Config::getConfig('description')); ?>" />
    <meta name="author" content="<?php echo e(\App\Config::getConfig('author')); ?>" />

    <title><?php echo $__env->yieldContent('title'); ?> - iSchool</title>

    <link rel="icon" href="<?php echo e(\App\Config::getConfig('icon')); ?>" />
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <?php /*动画*/ ?>
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <?php /*菜鸟教程css*/ ?>
    <link href="<?php echo e(asset('css/cai.css')); ?>" rel="stylesheet">
    <?php /*后台模板css*/ ?>
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <?php /*表格*/ ?>
    <link href="<?php echo e(asset('css/footable.core.css')); ?>" rel="stylesheet">
    <?php /*菜鸟教程css*/ ?>
    <link href="<?php echo e(asset('css/cai.css')); ?>" rel="stylesheet">
    <?php /*手写的css*/ ?>
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">


    <script src="<?php echo e(asset('js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <?php /*菜单*/ ?>
    <script src="<?php echo e(asset('js/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pace.min.js')); ?>"></script>
    <?php /*网站手写的js*/ ?>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <?php /*弹窗*/ ?>
    <link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <?php /*文件上传*/ ?>
    <link href="<?php echo e(asset('css/jasny-bootstrap.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/jasny-bootstrap.min.js')); ?>"></script>
    <?php /*表格*/ ?>
    <script src="<?php echo e(asset('js/footable.all.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('head'); ?>

</head>

<body>


<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element forum-info">
						<span>
						<img alt="image" class="img-circle head_pic" src="<?php echo e(asset(\App\Http\Controllers\Tool::get_user_head_pic())); ?>" width="100px"/>
						</span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"><?php echo e(Auth::user()->name); ?></strong>&nbsp;<b
                                            class="caret"></b> </span>  </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li>
                                <a href="<?php echo e(url('/setting')); ?>">
                                    设置
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/logout')); ?>">
                                    退出
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="logo-element">
                        <a href="/admin">
                            iAdmin
                        </a>
                    </div>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <i class="fa fa-th-large"></i><span class="nav-label">首页</span>
                    </a>
                </li>
                <?php if(\App\Http\Controllers\Tool::getLevel()==1): ?>
                    <?php /*<li>*/ ?>
                        <?php /*<a href="/admin">*/ ?>
                            <?php /*<i class="fa fa-dashboard"></i><span class="nav-label">Dashboards</span>*/ ?>
                        <?php /*</a>*/ ?>

                    <?php /*</li>*/ ?>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">课程管理</span> <span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in">
                            <li>
                                <a href="/course-add">
                                    <i class="fa fa-plus"></i> 课程添加
                                </a>
                            </li>
                            <li>
                                <a href="/admin-course">
                                    <i class="fa fa-mortar-board"></i>课程编辑
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="/admin-comment">
                            <i class="fa fa-comment"></i><span class="nav-label">评论管理</span>
                        </a>

                    </li>
                    <li>
                        <a href="/admin-problem">
                            <i class="fa fa-th-large"></i><span class="nav-label">问答管理</span>
                        </a>

                    </li>
                    <li>
                        <a href="/admin-note">
                            <i class="fa fa-pencil"></i><span class="nav-label">笔记管理</span>
                        </a>

                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">网站管理</span> <span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in">

                            <li>
                                <a href="/set">
                                    <i class="fa fa-cog"> 网站配置</i>
                                </a>
                            </li>
                            <li>
                                <a href="/git">
                                    <i class="fa fa-git"> Git管理</i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/user">
                            <i class="fa fa-user"> 用户管理</i>
                        </a>
                    </li>
                    <?php /*<li>*/ ?>
                        <?php /*<a href="/announce">*/ ?>
                            <?php /*<i class="fa fa-th-large"> 公告管理</i>*/ ?>
                        <?php /*</a>*/ ?>
                    <?php /*</li>*/ ?>
                <?php endif; ?>

            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message"></span>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i><span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages <span
                                                class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers <span
                                                class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted <span
                                                class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/logout">
                            <i class="fa fa-sign-out"></i> 退出
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <?php echo $__env->yieldContent('body'); ?>
        <?php echo $__env->make('part.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

</div>
</body>

</html>
