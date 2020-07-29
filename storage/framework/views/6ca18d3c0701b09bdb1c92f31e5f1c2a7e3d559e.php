<?php $__env->startSection('title',$course_main['course']['name']); ?>

<?php $__env->startSection('head'); ?>
    <style>
        th,td{
            vertical-align: middle !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#">
                    目录
                </a>
            </li>
            <li class="">
                <a href="/comment?course=<?php echo e($course_main['course']['url']); ?>">
                    评论
                </a>
            </li>
            <li class="">
                <a href="/problem?course=<?php echo e($course_main['course']['url']); ?>">
                    问答
                </a>
            </li>
            <li class="">
                <a href="/note?course=<?php echo e($course_main['course']['url']); ?>">
                    笔记
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">

                    <table class="table table-hover col-md-12">
                        <tbody>
                            <?php foreach($wares as $key=>$ware): ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(URL::action('CourseController@show',['course'=>$course_main['course']['url'],'ware'=>$ware->url])); ?>">
                                            <div style="margin-left: 30px;"><?php echo e($ware->title); ?></div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(URL::action('CourseController@show',['course'=>$course_main['course']['url'],'ware'=>$ware->url])); ?>">
                                        <div class="pull-right" style="margin-right: 30px;">
                                        <?php if($ware->status==1): ?>
                                            <button class="btn btn-xs btn-outline btn-success">继续学习</button>
                                        <?php else: ?>
                                            <button class="btn btn-xs btn-outline btn-primary">立即学习</button>
                                        <?php endif; ?>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>