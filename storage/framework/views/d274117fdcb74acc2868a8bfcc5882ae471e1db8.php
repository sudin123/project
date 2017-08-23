<?php $__env->startSection('title'); ?>Upload Gallery Images - SellNepal @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('assets/dropzone/dropzone.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix">
                <a class="link home-link" href="<?php echo e(url('/')); ?>">back to home</a>
                <h4 class="text-center title">Add Gallery Images</h4>
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center info">You can now upload <span class="upload-number"><?php echo e((6-count($media))); ?></span> images for this Ad.</p>

                    <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if(count($media) < 6): ?>
                    <div class="dropzone" id="mediaFileUpload">
                        <div class="dz-default dz-message">
                            <i class="fa fa-plus"></i>
                            <span>Drop files here to upload</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php echo $__env->make('posts.imagesajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div style="" class="gform_footer left_label" id="proceedtonext">
                        <a href="<?php echo e(route('my-ads')); ?>" class="button gform_button big">Done</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(count($media) < 6): ?>
    <script src="<?php echo e(asset('assets/dropzone/dropzone.js')); ?> "></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var UploadUrl = "<?php echo e(route('upload-ad-images')); ?>";
            var mediaUrl = "<?php echo e(route('show-gallery-image-ajax')); ?>";
            var _total = 6;
            var _count = "<?php echo e(count($media)); ?>";
            var token = "<?php echo e(Session::getToken()); ?>";
            var post_id = "<?php echo e($postid); ?>";
            Dropzone.autoDiscover = false;
            var fileList = new Array;
            var i = 0;
            $("div#mediaFileUpload").dropzone({
                maxFiles:_total - _count,
                parallelUploads: 2,
                addRemoveLinks: false,
                init: function () {
                    // Hack: Add the dropzone class to the element
                    $(this.element).addClass("dropzone");

                    this.on("success", function (file, serverFileName) {
                        $.ajax({
                            type: "post",
                            data: {postid: post_id, _token:token},
                            dataType: 'json',
                            url:mediaUrl,
                            success: function (response)
                            {
                                $("#mediaView").html(response.html);
                                $('.upload-number').html(6-response.count);
                                if(response.count == 6){
                                    $('#mediaFileUpload').remove();
                                }
                            }
                        });
                        $('div.dz-success').remove();
                    });
                },
                url: UploadUrl,
                maxfilesexceeded: function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                },
                params: {
                    postid: post_id,
                    _token: token,
                }
            });
            //File Upload response from the server
            Dropzone.options.dropzoneForm = {
                maxFilesize: 2,
                init: function () {
                    this.on("complete", function (data) {
                        var res = eval('(' + data.xhr.responseText + ')');
                    });
                }
            };
            $('#mediaView').on('click', '.delete-media', function () {
                var id_value = $(this).attr('data-id'); // get value post you want delete
                bootbox.dialog({
                    title: 'Confirm',
                    message: 'Are you sure delete this image',
                    className: 'my-class',
                    buttons: {
                        cancel: {
                            className: 'btn btn-default',
                            label: 'Close'
                        },
                        success: {
                            className: 'btn btn-success',
                            label: 'Delete',
                            callback: function () {
                                $.ajax({
                                    url: baseUrl + "/media/delete",
                                    type: 'post',
                                    data: {id: id_value},
                                    dataType: 'json',
                                    success: function (response) {
                                        if (response.status == 'success') {
                                            MediaUpdateAfterDelete();
                                        } else {
                                            $(this).dialog('open');
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
            });
            function MediaUpdateAfterDelete()
            {
                $.ajax({
                    type: "post",
                    url: baseUrl + "/media",
                    success: function (response)
                    {
                        $("#mediaView").html(response);
                        $.Notification.notify('success', 'bottom left', 'Media Deleted', 'You have Successfully deleted media.');
                    }
                });
            }
        });

    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>