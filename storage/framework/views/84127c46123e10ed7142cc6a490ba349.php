<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Website Homepage Configuration')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Popular Brands Section')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!--about popular brands info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <?php
                                        $about_popular_brand_ids = getSetting('about_popular_brand_ids') != null ? json_decode(getSetting('about_popular_brand_ids')) : [];
                                    ?>
                                    <label class="form-label"><?php echo e(localize('Popular Brands')); ?></label>
                                    <input type="hidden" name="types[]" value="about_popular_brand_ids">
                                    <select class="select2 form-control" multiple="multiple"
                                        data-placeholder="<?php echo e(localize('Select popular brands')); ?>"
                                        name="about_popular_brand_ids[]" required>
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($brand->id); ?>"
                                                <?php if(in_array($brand->id, $about_popular_brand_ids)): ?> selected <?php endif; ?>>
                                                <?php echo e($brand->collectLocalization('name')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--about popular brands info end-->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Changes')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo e(localize('About Us Configuration')); ?></h5>
                            <div class="tt-vertical-step-link">
                                <ul class="list-unstyled">
                                    <?php echo $__env->make('backend.pages.appearance.aboutUs.inc.rightSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/appearance/aboutUs/popularBrands.blade.php ENDPATH**/ ?>