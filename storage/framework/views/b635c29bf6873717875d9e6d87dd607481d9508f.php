<?php $__env->startSection('title',$detail['title']); ?>

<?php $__env->startSection('head'); ?>
    <link href="/public/css/editormd.min.css" rel="stylesheet">
    <script src="/public/js/editormd/editormd.min.js"></script>
    <?php /*<script src="/public/js/prettify.js"></script>*/ ?>
    <?php /*<link href="https://cdn.bootcss.com/prettify/r298/prettify.css" rel="stylesheet">*/ ?>
    <style>
        .page-heading a:hover{
            color: #1AB394;
        }
    </style>
    <script>
        var Editor;

        $(function () {
//            $('pre').addClass('prettyprint lang-js').attr('style', 'overflow:auto;font-family:consola;');
//            window.prettyPrint && prettyPrint();

            Editor = editormd("editormd", {
                width: "100%",
                height: 350,
                toolbarIcons: function () {
                    return ["undo", "redo", "|", "bold", "del", "italic", "quote", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "list-ul", "list-ol", "hr", "|", "clear", "preview"]
                },
                syncScrolling: "single",
                path: '/public/js/editormd/lib/',
                saveHTMLToTextarea: true,
                taskList: true,
                tocm: true,         // Using [TOCM]
                tex: true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart: true,             // 开启流程图支持，默认关闭
                sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
            });

            $('#comment').click(function () {
                var comment = Editor.getHTML();
                var comment_code = $('#comment_code').val();

                $.ajax({
                    type: "post",
                    data: {'comment': comment, 'comment_code': comment_code, '_token': '<?php echo csrf_token(); ?>'},
                    url: "/comment/<?php echo $detail['id'];?>",
                    success: function (data) {
                        if (data.status == 1) {
                            swal({
                                title: data.msg,
                                type: "success",
                                confirmButtonColor: "#30B593"
                            });
                            //2秒后页面跳转
                            setTimeout('location.reload()', 2000);
                        } else {
                            swal({
                                title: data.msg,
                                type: "error",
                                confirmButtonColor: "#F3AE56"
                            });
                        }

                    }
                })
            });
            $('#comment_code').val('');
//            $('#comment_link').click();
            $('#top-search').focus();

        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav_li'); ?>

        <li class="active">
            <a href="#"><i class="fa fa-list-ul"></i> <span class="nav-label"><?php echo e($course['name']); ?></span><span
                        class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">

                <?php foreach($nav_lis as $key=>$li): ?>
                    <?php if($li['title']==$detail['title']): ?>
                        <li class="active">
                    <?php else: ?>
                        <li>
                            <?php endif; ?>
                            <a href="<?php echo e(URL::action('CourseController@show',['course'=>$course->url,'ware'=>$li['url']])); ?>">
                                <i class="fa fa-file-text"></i> <?php echo e($li['title']); ?>

                            </a>

                        </li>
                        <?php endforeach; ?>

            </ul>
        </li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-11">
                <h2><?php echo e($detail['title']); ?></h2>
                <div class="pull-right">
                    <i class="fa fa-eye"></i> <?php echo e($detail['view']); ?>

                    &nbsp;&nbsp;
                    <i class="fa fa-clock-o"></i> <?php echo e(\App\Http\Controllers\Tool::datetime_to_YmdHi($detail['updated_at'])); ?>

                </div>
                <ol class="breadcrumb">
                    <li>
                        <a href="/">首页</a>
                    </li>
                    <li><a href="/course?course=<?php echo e($course['url']); ?>"><?php echo e($course['name']); ?></a></li>
                    <li class="active"><?php echo e($detail['title']); ?></li>
                    <?php if(\App\Http\Controllers\Tool::getLevel()==1): ?>
                        <li>
                            <a href="/course-ware-edit/<?php echo e($detail['id']); ?>" target="_blank">
                                <button class="btn btn-primary btn-outline btn-xs">编辑课件</button>
                            </a>
                            &nbsp;&nbsp;
                        </li>
                    <?php endif; ?>
                </ol>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="article-intro" id="content">
                            <div id="spider_content">
                                <?php echo $detail['content']; ?>

                            </div>
                            <br>
                            <div class="col-lg-12">

                                <?php if($link_ware['pre_course']['title']): ?>
                                    <div class="pull-left">
                                        <a href="<?php echo e(URL::action('CourseController@show',['course'=>$course->url,'ware'=>$link_ware['pre_course']['url']])); ?>">
                                            <button class="btn btn-primary btn-rounded">
                                                上一篇：<?php echo e($link_ware['pre_course']['title']); ?></button>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if($link_ware['next_course']['title']): ?>
                                    <div class="pull-right">
                                        <a href="<?php echo e(URL::action('CourseController@show',['course'=>$course->url,'ware'=>$link_ware['next_course']['url']])); ?>">
                                            <button class="btn btn-primary btn-rounded">
                                                下一篇：<?php echo e($link_ware['next_course']['title']); ?></button>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-content" style="border: 1px dashed;color: gray;padding: 16px;font-size: 14px;">
                        <ul>
                            <li style="color: #ff6d00;">请先登录 ~\(≧▽≦)/~，再发表评论 /(ㄒoㄒ)/~~</li>
                            <li>评论内容不要超过233个字符 (⊙o⊙)哦</li>
                            <li>请注意单词拼写，以及中英文排版，<a href="https://github.com/sparanoid/chinese-copywriting-guidelines"
                                                   target="_blank">参考此页</a></li>
                            <?php /*<li>支持 Markdown 格式, <strong>**粗体**</strong>、<code>```代码```</code>, 更多语法请见这里 <a*/ ?>
                                        <?php /*href="http://www.markdown.cn/"*/ ?>
                                        <?php /*target="_blank">Markdown 语法</a></li>*/ ?>
                            <?php /*<li>目前MarkDown在添加代码时，预览会有点问题，但不影响评论后的效果 ╮(╯▽╰)╭哎</li>*/ ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">评论</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">问答</a></li>
                        <li><a data-toggle="tab" href="#tab-3">笔记</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="ibox">
                                    <div>
                                        <textarea id="comment_c" cols="20" rows="4" class="form-control"
                                                  placeholder="扯淡、吐槽、表扬、鼓励……想说啥就说啥！"></textarea>
                                        <div class="pull-right m-t-md m-r-md tooltip-demo">
                                            <button id="comment_s" class="btn btn-primary btn-outline btn-sm"
                                                    type="button" data-toggle="tooltip" data-placement="left"
                                                    <?php if(\App\Http\Controllers\Tool::isLogin()): ?>
                                                    title="你已登录，可以评论..."
                                                    <?php else: ?>
                                                    title="请登陆后再发表评论哦..."
                                                    <?php endif; ?>
                                            >发表评论
                                            </button>
                                        </div>
                                    </div>
                                    <div class="chat-discussion animated fadeInLeft" style="margin: 60px 0 0 0;padding: 0;">
                                        <?php $i = count($comments);$lc = ['沙发', '板凳', '地板', '地下室', '下水道']; ?>
                                        <?php foreach($comments as $key=>$comment): ?>
                                            <?php $i--; ?>
                                            <div class="chat-message left m-t-md">
                                                <img class="message-avatar img-circle head_pic"
                                                     src="<?php echo e(asset($comment->head_pic)); ?>"
                                                     alt="大头照啦 ~\(≧▽≦)/~">
                                                <div class="message">
                                                    <a class="message-author"
                                                       href="/u/<?php echo e($comment->add_user_id); ?>"> <?php echo e($comment->name); ?> </a>
                                                    <span class="message-date">
                                            <?php if(\App\Http\Controllers\Tool::getLevel()==1): ?>
                                                            <a type="button" class="btn btn-outline btn-danger btn-xs"
                                                               onclick="delComment(<?php echo $comment->id.',\''. csrf_token().'\''; ?>)">删除评论</a>
                                                        <?php endif; ?>
                                                        &nbsp;&nbsp;
                                                        <?php if($comment->like_status==1): ?>
                                                            <a onclick="dislike(<?php echo e($comment->id); ?>)">
                                            <i class="fa fa-thumbs-up fa-lg" style="color: #ff6d00;"></i>
                                        </a>
                                                        <?php else: ?>
                                                            <a onclick="like(<?php echo e($comment->id); ?>)">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </a>
                                                        <?php endif; ?>
                                                        &nbsp;<?php echo e($comment->like); ?>&nbsp;&nbsp;
                                                        <?php if($i<count($lc)): ?>
                                                            <button class="btn btn-primary btn-outline btn-xs"> <?php echo e($lc[$i]); ?> </button>
                                                        <?php else: ?>
                                                            <button class="btn btn-primary btn-outline btn-xs"> <?php echo e($i+1); ?>

                                                                楼 </button>
                                                        <?php endif; ?>

                                    </span>
                                                    <span class="message-content" style="margin: 10px;">
											<?php echo $comment->comment; ?>

                                    </span>
                                                    <span class="message-foot" style="margin: 5px;">
                                        <small>
                                            时间：<?php echo e(\App\Http\Controllers\Tool::datetime_to_YmdHi($comment->created_at)); ?>

                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        </small>

                                    </span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="text-center">
                                            <ul class="pagination">
                                                <?php $pages = ($c_count % 10 == 0) ? ($c_count / 10) : ($c_count / 10 + 1); ?>
                                                <?php for($i=1;$i<=$pages;$i++): ?>
                                                    <?php $page = $class = ($i == (isset($_GET['page']) ? $_GET['page'] : 1)) ? "class='active'" : ""; ?>
                                                    <li <?php echo $class; ?>>
                                                        <a href="/show?course=<?php echo e($course->url); ?>&ware=<?php echo e($detail['url']); ?>&cpage=<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </a>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary btn-outline btn-sm" id="p_add">提问</button>
                                    <div class="wrapper wrapper-content animated fadeInRight">
                                        <?php /*显示问题开始*/ ?>
                                        <?php foreach($problems as $key=>$problem): ?>
                                            <div class="vote-item">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="vote-actions">
                                                            <?php if($problem->like_status>0): ?>
                                                                <a>
                                                <span style="color: red;">
                                                <?php else: ?>
                                                        <a onclick="like_problem(<?php echo e($problem->id); ?>)">
                                                <span>
                                                <?php endif; ?>
                                                    <i class="fa fa-chevron-up"> </i>
                                                </span>
                                            </a>
                                                        <div><?php echo e($problem->like); ?></div>
                                                        <?php if($problem->like_status>0): ?>
                                                            <a onclick="dislike_problem(<?php echo e($problem->id); ?>)">
                                                <span style="color: gray;" class="tooltip-demo"><i class="fa fa-chevron-down"> </i></span>
                                            </a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <a href="/problem-answer?id=<?php echo e($problem->id); ?>" class="vote-title">
                                                            <?php echo e($problem->title); ?>

                                                        </a>
                                                        <div class="vote-info">
                                                            <i class="fa fa-comments-o"></i> <a href="/problem-answer?id=<?php echo e($problem->id); ?>">Answers (<?php echo e($problem->answer_count); ?>)</a>
                                                            <i class="fa fa-clock-o"></i> <a><?php echo e(\App\Http\Controllers\Tool::datetime_to_YmdHi($problem->created_at)); ?></a>
                                                            <i class="fa fa-user"></i> <a href="/u/<?php echo e($problem->user_id); ?>"><?php echo e($problem->name); ?></a>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="vote-icon">
                                                            <img src="<?php echo e($problem->head_pic); ?>" alt="<?php echo e($problem->name); ?>" class="img-circle head_pic" width="50px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php /*显示问题结束*/ ?>

                                        <?php /*分页开始*/ ?>
                                        <div class="text-center">
                                            <ul class="pagination">
                                                <?php $pages = ($p_count%10==0)?($p_count/10):($p_count/10+1); ?>
                                                <?php for($i=1;$i<=$pages;$i++): ?>
                                                    <?php $page= $class=($i==(isset($_GET['page'])?$_GET['page']:1))?"class='active'":""; ?>
                                                    <li <?php echo $class; ?>>
                                                        <a href="/problem?course=<?php echo e($course['url']); ?>&ware=<?php echo e($detail['url']); ?>&ppage=<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </a>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                        </div>
                                        <?php /*分页结束*/ ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <button class="btn btn-primary btn-outline btn-sm" id="n_add">记笔记</button>
                                <div class="ibox">
                                <div class="chat-discussion" style="margin: 0;padding: 0;">
                                <?php foreach($notes as $key=>$note): ?>
                                    <div class="chat-message left m-t-md">
                                        <img class="message-avatar img-circle head_pic" src="<?php echo e(asset($note->head_pic)); ?>"
                                             alt="大头照啦 ~\(≧▽≦)/~">
                                        <div class="message">
                                            <a class="message-author"
                                               href="/u/<?php echo e($note->add_user_id); ?>"> <?php echo e($note->name); ?> </a>
                                            <span class="message-date">
                                            <?php if(\App\Http\Controllers\Tool::getLevel()==1): ?>
                                                    <a type="button" class="btn btn-outline btn-danger btn-xs"
                                                       onclick="delNote(<?php echo $note->id.',\''. csrf_token().'\''; ?>)">删除笔记</a>
                                                <?php endif; ?>
                                                &nbsp;&nbsp;
                                                <?php if($note->like_status==1): ?>
                                                    <a onclick="dislike_note(<?php echo e($note->id); ?>)">
                                            <i class="fa fa-thumbs-up fa-lg" style="color: #ff6d00;"></i>
                                        </a>
                                                <?php else: ?>
                                                    <a onclick="like_note(<?php echo e($note->id); ?>)">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </a>
                                                <?php endif; ?>
                                                &nbsp;<?php echo e($note->like); ?>&nbsp;&nbsp;


                                    </span>
                                            <span class="message-content" style="margin: 10px;">
											<?php echo $note->note; ?>

                                    </span>
                                            <span class="message-foot" style="margin: 5px;">
                                        <small>
                                            时间：<?php echo e(\App\Http\Controllers\Tool::datetime_to_YmdHi($note->created_at)); ?>

                                        </small>

                                    </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                    <div class="text-center">
                                        <ul class="pagination">
                                            <?php $pages = ($n_count%10==0)?($n_count/10):($n_count/10+1); ?>
                                            <?php for($i=1;$i<=$pages;$i++): ?>
                                                <?php $page = $class = ($i == (isset($_GET['page']) ? $_GET['page'] : 1)) ? "class='active'" : ""; ?>
                                                <li <?php echo $class; ?>>
                                                    <a href="/note?course=<?php echo e($course['url']); ?>&ware=<?php echo e($detail['url']); ?>&npage=<?php echo e($i); ?>">
                                                        <?php echo e($i); ?>

                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <!--提问的模态框-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="p_add_modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">发布问题</h4>
                    </div>
                    <div class="modal-body">
                        <form id="p_form">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="course_id" value="<?php echo e($course->id); ?>" hidden="hidden">
                            <input type="text" name="ware_id" value="<?php echo e($detail['id']); ?>" hidden="hidden">
                            <div class="form-group">
                                <label for="p_title">标题</label>
                                <input type="text" class="form-control" id="p_title" name="p_title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="p_problem">问题详情</label>
                                <textarea name="p_problem" id="p_problem"></textarea>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" onclick="p_add()">添加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--记笔记的模态框-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="n_add_modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">添加笔记</h4>
                    </div>
                    <div class="modal-body">
                        <form id="n_form">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="course_id" value="<?php echo e($course->id); ?>" hidden="hidden">
                            <input type="text" name="ware_id" value="<?php echo e($detail['id']); ?>" hidden="hidden">
                            <div class="form-group">
                                <label for="n_note">笔记详情</label>
                                <textarea name="n_note" id="n_note"></textarea>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" onclick="n_add()">添加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo e(asset('public/js/ueditor/ueditor.config.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/js/ueditor/ueditor.all.js')); ?>"></script>
        <script>
            function re_captcha() {
                $url = "<?php echo e(URL('/img/comment_code')); ?>";
                $url = $url + "/" + Math.random();
                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
            }
            function like(comment_id) {
                dolike('/like', 1, comment_id, '<?php echo csrf_token(); ?>')
            }

            function dislike(comment_id) {
                dolike('/dislike', 1, comment_id, '<?php echo csrf_token(); ?>');
            }

            function like_problem(problem_id) {
                dolike_problem('/problem-like',2,problem_id,'<?php echo csrf_token(); ?>');
            }

            function dislike_problem(problem_id) {
                dolike_problem('/problem-dislike',2,problem_id,'<?php echo csrf_token(); ?>');
            }

            function like_note(note_id) {
                dolike_note('/note-like',3,note_id,'<?php echo csrf_token(); ?>');
            }

            function dislike_note(note_id) {
                dolike_note('/note-dislike',3,note_id,'<?php echo csrf_token(); ?>');
            }
            
            function p_add() {
                var p_form = new FormData(document.getElementById("p_form"));
                $.ajax({
                    type: "post",
                    data: p_form,
                    processData:false,
                    contentType:false,
                    url: "/problem-add-do",
                    success: function(data) {
                        if(data.status==1) {
                            swal({
                                title: data.msg,
                                type: "success",
                                confirmButtonColor: "#30B593"
                            });
                            setTimeout('location.reload()', 1500);
                        } else {
                            swal({
                                title: data.msg,
                                type: "error",
                                confirmButtonColor: "#F3AE56"
                            });
                        }

                    }
                })
            }

            function n_add() {
                var n_form = new FormData(document.getElementById("n_form"));
                $.ajax({
                    type: "post",
                    data: n_form,
                    processData:false,
                    contentType:false,
                    url: "/note-add-do",
                    success: function(data) {
                        if(data.status==1) {
                            swal({
                                title: data.msg,
                                type: "success",
                                confirmButtonColor: "#30B593"
                            });
                            setTimeout('location.reload()', 1500);
                        } else {
                            swal({
                                title: data.msg,
                                type: "error",
                                confirmButtonColor: "#F3AE56"
                            });
                        }

                    }
                })
            }

            $(function () {
//                $("#spider_content").find("a").hide();
                $('#comment_c').val('');

                $('#comment_s').click(function () {
                    var comment = $('#comment_c').val();

                    $.ajax({
                        type: "post",
                        data: {
                            'comment': comment,
                            'course_id': <?php echo e($detail['course_id']); ?>,
                            'ware_id':<?php echo e($detail['id']); ?> ,
                            'type': 1,
                            '_token': '<?php echo csrf_token(); ?>'
                        },
                        url: "/comment",
                        success: function (data) {
                            if (data.status == 1) {
                                swal({
                                    title: data.msg,
                                    type: "success",
                                    confirmButtonColor: "#30B593"
                                });
                                //2秒后页面跳转
                                setTimeout('location.reload()', 1500);
                            } else {
                                swal({
                                    title: data.msg,
                                    type: "error",
                                    confirmButtonColor: "#F3AE56"
                                });
                            }

                        }
                    })
                });
                var ue = UE.getEditor('p_problem',{initialFrameWidth:null,initialFrameHeight:300});
//                ue.setContent('');
                $('#p_add').click(function () {
                    $('#p_add_modal').modal('show');
                })

                var ue2 = UE.getEditor('n_note',{initialFrameWidth:null,initialFrameHeight:300});
//                ue2.setContent('');
                $('#n_add').click(function () {
                    $('#n_add_modal').modal('show');
                })
            })
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>