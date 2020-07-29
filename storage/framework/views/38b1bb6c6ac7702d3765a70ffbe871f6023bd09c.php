<?php $__env->startSection('title','iTool - 在线编辑神器'); ?>

<?php $__env->startSection('body'); ?>
    <script type="text/javascript">
        $(function(){
            $('.footer').hide();
            $('iframe').css("height",function(){
                return $(window).height()-55;
            })
        })
    </script>
    <iframe src="http://tool.usta.wiki" width="100%" frameborder="0">
    </iframe>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>