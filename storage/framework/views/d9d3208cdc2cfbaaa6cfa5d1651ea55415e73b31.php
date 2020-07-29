<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
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
    <?php /*<link href="<?php echo e(asset('public/css/cai.css')); ?>" rel="stylesheet">*/ ?>
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
                            <input type="text" placeholder="Search for something ..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <?php if(!Auth::check()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">登录</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">注册</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img alt="image" class="img-circle head_pic" src="<?php echo e(asset(\App\Http\Controllers\Tool::get_user_head_pic())); ?>" width="30px" />
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

        <div class="wrapper animated fadeInDown" style="margin-top: 30px;">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">

                        <div class="ibox-title">
                            <h5><?php echo e($course_main['course']['name']); ?></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="row">

                                <div class="col-md-4 text-center">
                                    <div class="product-images" style="vertical-align:middle;display: table-cell;text-align:center;" id="course-thumb">
                                        <img src="<?php echo asset($course_main['course']['logo'] ? $course_main['course']['logo'] : 'img/logo/a41def31e94869ced7de969c6a28bdf1.jpg'); ?>" style="max-height: 300px;">
                                    </div>

                                </div>
                                <div class="col-md-8" id="course-introduce">
                                    <h2 class="font-bold m-b-xs">
                                        <?php echo e($course_main['course']['name']); ?>

                                    </h2>
                                    <hr>
                                    <div class="text-muted col-md-12">
                                        <div class="col-md-10 col-md-offset-1">
                                        <table class="table table-bordered text-center">
                                            <tbody>
                                                <tr>
                                                    <td>课程介绍</td>
                                                    <td><?php echo e($course_main['course']['introduce']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>学习人数</td>
                                                    <td><?php echo e($course_main['learn_num']); ?> 人</td>
                                                </tr>
                                                <tr>
                                                    <td>课程评分</td>
                                                    <td><?php echo e($course_main['avg_score']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>最后更新</td>
                                                    <td><?php echo e(\App\Http\Controllers\Tool::datetime_to_YmdHi($course_main['course']['updated_at'])); ?></td>
                                                </tr>
                                                <?php if(\App\Http\Controllers\Tool::isLogin()): ?>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <?php if($course_main['learn_status']==0): ?>
                                                            <button class="btn btn-primary btn-sm btn-outline" onclick="study_course()">
                                                                加入学习
                                                            </button>
                                                        <?php else: ?>
                                                            <button class="btn btn-success btn-sm btn-outline">
                                                                继续学习
                                                            </button>
                                                        <?php endif; ?>
                                                        <?php if(\App\Http\Controllers\Tool::getLevel()==1): ?>
                                                            <a href="/course-edit/<?php echo e($course_main['course']['id']); ?>"><button class="btn btn-primary btn-sm btn-outline">编辑课程</button></a>
                                                                <a href="/course-ware-add/<?php echo e($course_main['course']['id']); ?>"><button class="btn btn-primary btn-sm btn-outline">添加课件</button></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                    <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
        <div class="wrapper" >
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox float-e-margins col-md-12 animated fadeInLeft">
                        <div class="ibox-title">
                            <h5>课程详情</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content col-md-12">
                            <?php echo $__env->yieldContent('body'); ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="ibox float-e-margins col-md-12 animated fadeInRight">
                        <div class="ibox-title">
                            <h5>讲师提示</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content col-md-12">
                            <img src="<?php echo e($course_main['teacher']['head_pic']); ?>" alt="" class="img-circle head_pic" style="width: 30px;">
                            &nbsp;
                            <?php echo e($course_main['teacher']['name']); ?>

                            <hr>
                            <div class="">
                                <div class="m-t-md">
                                    <h4>课程须知</h4>
                                    <?php echo $course_main['course']['notice']; ?>

                                </div>
                                <div class="m-t-md">
                                    <h4>老师告诉你能学到什么？</h4>
                                    <?php echo $course_main['course']['reward']; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php echo $__env->make('part.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

    <script>
        $(function () {
            var h = $('#course-introduce').outerHeight(true);
            $('#course-thumb').height(h)
        })
    </script>
</body>

</html>
