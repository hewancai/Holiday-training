<?php $__env->startSection('title','首页'); ?>


<?php $__env->startSection('body'); ?>
    <div class="wrapper wrapper-content">
        <?php $i = -1;$j = 0; ?>
        <?php foreach($courses as $course): ?>

            <?php if($course->first==1): ?>
                <?php $i++;$j = 0;?>
                <?php if($i>0): ?>
                    </div>
                    <?php endif; ?>
                    <div class="alert alert-success col-lg-12" role="alert" style="font-size: 18px;"><i
                                class="fa fa-list-ul"></i> <?php echo e($course->type_des); ?></div>

                    <div class="row animated fadeInDown">
                <?php else: ?>
                    <?php $j++;?>
                    <?php if($j%4==0): ?>
                        </div>
                        <div class="row animated fadeInDown">
                <?php endif; ?>

        <?php endif; ?>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="<?php echo e(URL::action('CourseController@index',['course'=>$course->url])); ?>">

                    <img alt="image" class="img-circle"
                         src="<?php echo $course->logo ? $course->logo : 'public/img/logo/a41def31e94869ced7de969c6a28bdf1.jpg'; ?>">

                    <h3 class="m-b-xs"><strong><?php echo e($course->name); ?></strong></h3>

                    <div class="">
                        <?php echo e($course->des); ?>

                    </div>


                </a>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>