<?php $__empty_1 = true; $__currentLoopData = $mediaFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mediaFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="tt-media-item" data-active-file-id="<?php echo e($mediaFile->id); ?>"
        onclick="handleSelectedFiles(<?php echo e($mediaFile->id); ?>)">
        <div class="tt-media-img">
            <?php if($mediaFile->media_type == 'image'): ?>
                <img src=<?php echo e(uploadedAsset($mediaFile->id)); ?> class="img-fluid" />
            <?php else: ?>
            <?php endif; ?>

        </div>
        <div class="tt-media-info-wrap p-2">
            <div class="tt-media-info">
                <p class="fs-base mb-0 text-truncate"><?php echo e($mediaFile->media_name); ?></p>
                <span class="text-muted fs-sm text-truncate"><?php echo e($mediaFile->media_extension); ?></span>
            </div>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_media')): ?>
            <div class="tt-media-action-wrap d-flex align-items-center justify-content-center">
                <a class="tt-remove btn btn-sm px-2 btn-danger media-delete-btn" data-bs-toggle="tooltip"
                    data-bs-placement="top" data-bs-title="Remove this file"
                    data-href="<?php echo e(route('uppy.delete', $mediaFile->id)); ?>" onclick="confirmDelete(this)"><i
                        data-feather="trash"></i></a>
            </div>
        <?php endif; ?>


    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="text-center text-danger p-5"><?php echo e(localize('No data found')); ?></div>
<?php endif; ?>
<?php /**PATH G:\laragon\www\resources\views/backend/inc/media-manager/previous.blade.php ENDPATH**/ ?>