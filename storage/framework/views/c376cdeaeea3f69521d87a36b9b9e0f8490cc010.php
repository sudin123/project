<?php $__env->startSection('title'); ?>Select Category - New Post@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix tab-content">
                <a class="link home-link" href="<?php echo e(url('/')); ?>">back to home</a>
                <h4 class="text-center title">Place your ad</h4>
                <div class="new-ads-wizard">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="breadcrumb">
                            <strong>You are here:</strong> <?php echo Breadcrumbs::render('select-category'); ?>

                        </div>
                        <h4 class="text-center">Select Category </h4>
                        <div id="firstlvl-category" class="box-1">
                            <ul class="style-list">
                                <?php foreach($categories as $pcat): ?>
                                    <?php if($pcat->isRoot()): ?>
                                        <li><a class="categories" data-id="<?php echo e($pcat->id); ?>" href="javascript:void(0);"><?php echo e($pcat->name); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div id="secondlvl-cat" class="box-1" style="display:none"></div>
                        <div id="thirdlvl-cat" class="box-1" style="display:none"></div>
                        <div id="proceedtonext" class="gform_footer left_label" style="display:none">
                            <a class="button gform_button big" href="">Proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.bootstrap.wizard.js')); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#rootwizard').bootstrapWizard();
            $('li.disabled a').click(function (e) {
                e.preventDefault();
            });
            var baseUrl = "<?php echo e(url('/')); ?>";
            var subcatUrl = "<?php echo e(route('getsubcategory')); ?>";
            var CreateWithCat = "<?php echo e(url('member-area/create-ad/step2?cat_id=')); ?>";
            var token = "<?php echo e(Session::getToken()); ?>";

            $('div.setup-panel div a.btn-primary').trigger('click');
            $('#firstlvl-category').on('click', '.categories', function () {
                $('#thirdlvl-cat').hide();
                $('#proceedtonext').hide();
                _this = $(this);
                _this.parent().siblings().find('.selected').removeClass('selected');
                _this.addClass('selected');

                var id_value = $(this).attr('data-id'); // get value post you want delete
                $.ajax({
                    url: subcatUrl,
                    type: 'post',
                    data: {id: id_value, _token: token},
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#secondlvl-cat").show();

                            $("#secondlvl-cat").html(response.html)
                            $('html, body').animate({
                                scrollTop: $("#secondlvl-cat").offset().top
                            }, 2000);
                        } else {
                            alert('ERROR');
                        }
                    }
                });
            });
            $('#secondlvl-cat').on('click', '.categories', function () {
                _this = $(this);
                _this.parent().siblings().find('.selected').removeClass('selected');
                _this.addClass('selected');
                var id_value = $(this).attr('data-id'); // get value post you want delete
                $.ajax({
                    url: subcatUrl,
                    type: 'post',
                    data: {id: id_value, _token: token},
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#thirdlvl-cat").show();
                            $("#thirdlvl-cat").html(response.html);
                            $('#proceedtonext').hide();
                            $('html, body').animate({
                                scrollTop: $("#thirdlvl-cat").offset().top
                            }, 2000);
                        } else if(response.status == 'nochildren'){
                            var id_value = _this.attr('data-id'); // get value post you want delete
                            $('#proceedtonext').show();
                            $("#proceedtonext a").attr("href",'');
                            $("#proceedtonext a").attr("href", function(i, href) {
                                return CreateWithCat + id_value;
                            });
                        }
                    }
                });
            });
            $('#thirdlvl-cat').on('click', '.categories', function () {
                _this = $(this);
                _this.parent().siblings().find('.selected').removeClass('selected');
                _this.addClass('selected');
                var id_value = _this.attr('data-id'); // get value post you want delete
                $("#proceedtonext a").attr("href",'');
                $("#proceedtonext a").attr("href", function(i, href) {
                    return CreateWithCat + id_value;
                });
                $('#proceedtonext').show();
            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>