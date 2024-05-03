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
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Intro Section')); ?></h2>
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
                        <!--about intro info start-->
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="about_intro_sub_title"
                                        class="form-label"><?php echo e(localize('Sub Title')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_sub_title">
                                    <input type="text" name="about_intro_sub_title" id="about_intro_sub_title"
                                        placeholder="<?php echo e(localize('Type sub title')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_intro_sub_title')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="about_intro_title" class="form-label"><?php echo e(localize('Title')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_title">
                                    <input type="text" name="about_intro_title" id="about_intro_title"
                                        placeholder="<?php echo e(localize('Type title')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_intro_title')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="about_intro_text" class="form-label"><?php echo e(localize('Text')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_text">
                                    <input type="text" name="about_intro_text" id="about_intro_text"
                                        placeholder="<?php echo e(localize('Type text')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_intro_text')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="about_intro_mission" class="form-label"><?php echo e(localize('Mission')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_mission">
                                    <textarea name="about_intro_mission" id="about_intro_mission" class="form-control"><?php echo e(getSetting('about_intro_mission')); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="about_intro_vision" class="form-label"><?php echo e(localize('Vision')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_vision">
                                    <textarea name="about_intro_vision" id="about_intro_vision" class="form-control"><?php echo e(getSetting('about_intro_vision')); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="about_intro_quote" class="form-label"><?php echo e(localize('Quote')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_quote">
                                    <textarea name="about_intro_quote" id="about_intro_quote" class="form-control"><?php echo e(getSetting('about_intro_quote')); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="about_intro_quote_by" class="form-label"><?php echo e(localize('Quote By')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_quote_by">
                                    <input type="text" name="about_intro_quote_by" id="text"
                                        placeholder="<?php echo e(localize('Type name of the user')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_intro_quote_by')); ?>">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label"><?php echo e(localize('Image')); ?></label>
                                    <input type="hidden" name="types[]" value="about_intro_image">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Banner Image')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="about_intro_image"
                                                    value="<?php echo e(getSetting('about_intro_image')); ?>">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--about intro info end-->

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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/appearance/aboutUs/intro.blade.php ENDPATH**/ ?>