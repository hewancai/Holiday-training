<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element forum-info">
						<span>
							<a href="/">
								<img alt="image" class="img-container logo" src="<?php echo e(asset('public/img/logo.png')); ?>"
                                     style=""/>
							</a>
						</span>

                </div>
                <div class="logo-element">
                    <a href="/">
                        iSchool
                    </a>
                </div>
            </li>

            <li>
                <a href="<?php echo e(URL::to('/')); ?>">
                    <i class="fa fa-th-large"></i><span class="nav-label">首页导航</span>
                </a>

            </li>
            <?php foreach($courses as $key=>$course): ?>
                <?php if($course->id>1 && $course->first==1): ?>
        </ul>
        </li>
        <?php endif; ?>
        <?php if($course->first==1): ?>
            <li>
                <a href="index.html"><i class="fa fa-th-large"></i> <span
                            class="nav-label"><?php echo e($course->type_des); ?></span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(URL::action('CourseController@index',['course'=>$course->url])); ?>">
                            <i class="fa fa-list-ul"></i> <?php echo e($course->name); ?>

                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="active">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">更多精彩</span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="/itool">
                            <i class="fa fa-code"></i> iTool代码编辑器
                        </a>
                    </li>
                    <li>
                        <a href="/timeline">
                            <i class="fa fa-git"></i> iSchool时光机
                        </a>
                    </li>
                    <li>
                        <a href="/links">
                            <i class="fa fa-link"></i> 友情链接
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/jtahstu/iSchool" target="_blank">
                            <i class="fa fa-github"></i> Github
                        </a>
                    </li>
                </ul>
            </li>

            <?php echo $__env->yieldContent('nav_li'); ?>

            </ul>
    </div>
</nav>