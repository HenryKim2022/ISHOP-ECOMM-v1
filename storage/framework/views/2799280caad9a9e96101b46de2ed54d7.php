<div class="gstore-breadcrumb position-relative z-1 overflow-hidden mt--50 pt-15 pb-2">
    <?php echo $__env->make('frontend.default.inc.breadcrumbBgImages.' . getTheme(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo $__env->yieldContent('breadcrumb-contents'); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/inc/breadcrumb.blade.php ENDPATH**/ ?>