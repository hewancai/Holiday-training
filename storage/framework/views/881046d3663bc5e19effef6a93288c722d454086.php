<?php $__env->startSection('title','登录'); ?>

<?php $__env->startSection('body'); ?>

    <div class="container">

    <div class="row">
        <div class="alert alert-warning alert-dismissible col-md-8 col-md-offset-2 m-t-lg role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            还没有账号? <i class="fa fa-long-arrow-right"></i> <a href="<?php echo e(url('/register')); ?>"> 立即注册</a>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">邮箱</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="E-Mail Address">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                      <!--
                      <div class="form-group">
                            <label class="col-md-4 control-label">验证码</label>

                            <div class="col-md-6">
                                <input type="text" name="captcha" class="form-control" placeholder="Verification Code">
                                <a onclick="javascript:re_captcha();" >
                                    <img src="<?php echo e(url('/img/verification_code/1')); ?>"  alt="验证码" title="刷新图片" width="200" height="80" id="c2c98f0de5a04167a9e427d883690ff6" border="0" class="m-t-sm">
                                </a>
                                <?php if($errors->has('verification_code')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('verification_code')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        -->
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" checked="checked"> 记住登录状态
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> 登录
                                </button>

                                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
        <script>
            function re_captcha() {
                var $url = "<?php echo e(url('/img/verification_code')); ?>";
                $url = $url + "/" + Math.random();
                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
            }
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>