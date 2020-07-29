<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta name="Keywords" content="<?php echo e(\App\Config::getConfig('keywords')); ?>"/>
    <meta name="Description" content="<?php echo e(\App\Config::getConfig('description')); ?>"/>
    <meta name="author" content="<?php echo e(\App\Config::getConfig('author')); ?>"/>

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
    <?php /*手写的css*/ ?>
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <?php /*菜单js*/ ?>
    <script src="<?php echo e(asset('js/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.slimscroll.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/inspinia.js')); ?>"></script>

    <link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>

    <?php /*手写的js*/ ?>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

    <?php echo $__env->yieldContent('head'); ?>


</head>

<body>

<div id="wrapper">
    <?php echo $__env->make('part.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                    <form role="search" class="navbar-form-custom" action="/search" type="get">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something ..." class="form-control"
                                   name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-left col-md-offset-1 m-t-sm">
                    <li class="tooltip-demo">
                        <button class="btn btn-link" style="color: #1AB394" type="button" onclick="announce('<?php echo csrf_token(); ?>')" data-toggle="tooltip" data-placement="bottom" title="网站公告">
                            网站公告：<?php echo e($announce); ?>

                        </button>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <?php if(!Auth::check()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">登录</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">注册</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <img alt="image" class="img-circle head_pic"
                                     src="<?php echo e(\App\Http\Controllers\Tool::get_user_head_pic()); ?>" width="30px"
                                     style="width: 30px;"/>
                                <?php echo e(\Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/setting')); ?>">
                                        <i class="fa fa-user"></i> 个人设置
                                    </a></li>
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i> 退出登录</a></li>
                            </ul>
                        </li>
                        <?php if(\App\Http\Controllers\Tool::getLevel()==1): ?>
                            <li>
                                <a href="/admin-course">
                                    <i class="fa fa-sign-in"></i> 管理后台
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                </ul>

            </nav>
        </div>
        <?php echo $__env->yieldContent('body'); ?>
    </div>
    <?php echo $__env->make('part.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="show_announce_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="announce_modal_title">貌似出错了，没有标题</h4>
            </div>
            <div class="modal-body">
                <p id="announce_modal_body">貌似出错了，没有内容</p>
            </div>
            <div class="modal-footer">
                <div class="pull-left">发布时间：<span id="announce_modal_time"></span></div>
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>
