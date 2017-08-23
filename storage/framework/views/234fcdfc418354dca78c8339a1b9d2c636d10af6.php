
<div class="row">
    <div class="mediacontainer" id="mediaView" style="margin-top:20px;">
        <?php if(count($media) > 0): ?>
        <?php foreach($media as $file): ?>
        <div class="col-md-4">
            <div class="gallery-thumb">
                <img src="<?php echo e(url('uploads/'.$file->filename)); ?>" class="thumb-img"  height="200px">
                <div class="gallery-action">
                    <a class="ico-delete" href="<?php echo e(route('delete-ad-images',$file->id)); ?>"></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
