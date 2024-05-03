<?php $__env->startSection('title'); ?>
    <?php echo e(localize('About Us Configuration')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Why Choose Us Section')); ?></h2>
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
                                <h5 class="mb-4"><?php echo e(localize('General Information')); ?></h5>

                                <div class="mb-3">
                                    <label for="about_why_choose_sub_title"
                                        class="form-label"><?php echo e(localize('Sub Title')); ?></label>
                                    <input type="hidden" name="types[]" value="about_why_choose_sub_title">
                                    <input type="text" name="about_why_choose_sub_title" id="about_why_choose_sub_title"
                                        placeholder="<?php echo e(localize('Type sub title')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_why_choose_sub_title')); ?>">
                                </div>


                                <div class="mb-3">
                                    <label for="about_why_choose_title" class="form-label"><?php echo e(localize('Title')); ?></label>
                                    <input type="hidden" name="types[]" value="about_why_choose_title">
                                    <input type="text" name="about_why_choose_title" id="about_why_choose_title"
                                        placeholder="<?php echo e(localize('Type title')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_why_choose_title')); ?>">
                                </div>


                                <div class="mb-3">
                                    <label for="about_why_choose_text" class="form-label"><?php echo e(localize('Text')); ?></label>
                                    <input type="hidden" name="types[]" value="about_why_choose_text">
                                    <input type="text" name="about_why_choose_text" id="about_why_choose_text"
                                        placeholder="<?php echo e(localize('Type text')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('about_why_choose_text')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><?php echo e(localize('Image')); ?></label>
                                    <input type="hidden" name="types[]" value="about_why_choose_banner">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Banner Image')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="about_why_choose_banner"
                                                    value="<?php echo e(getSetting('about_why_choose_banner')); ?>">
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
                                <div class="mb-5">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Changes')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- features -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo e(localize('Features')); ?></h5>
                            <table class="table tt-footable" data-use-parent-width="true">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="7%"><?php echo e(localize('S/L')); ?></th>
                                        <th><?php echo e(localize('Icon')); ?></th>
                                        <th data-breakpoints="xs sm"><?php echo e(localize('Title')); ?></th>
                                        <th data-breakpoints="xs sm md lg"><?php echo e(localize('Text')); ?></th>
                                        <th data-breakpoints="xs sm" class="text-end">
                                            <?php echo e(localize('Action')); ?>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $why_choose_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $each_why_choose_us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <?php echo e($key + 1); ?>

                                            </td>
                                            <td class="align-middle">
                                                <div class="avatar avatar-md">
                                                    <img class="rounded"
                                                        src="<?php echo e(uploadedAsset($each_why_choose_us->image)); ?>"
                                                        alt="" />
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <h6 class="fs-sm mb-0">
                                                    <?php echo e($each_why_choose_us->title); ?></h6>
                                            </td>

                                            <td class="align-middle">
                                                <?php echo e($each_why_choose_us->text); ?>

                                            </td>

                                            <td class="text-end align-middle">
                                                <div class="dropdown tt-tb-dropdown">
                                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end shadow">

                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('admin.appearance.about-us.editWhyChooseUs', ['id' => $each_why_choose_us->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                            <i data-feather="edit-3"
                                                                class="me-2"></i><?php echo e(localize('Edit')); ?>

                                                        </a>

                                                        <a href="#" class="dropdown-item confirm-delete"
                                                            data-href="<?php echo e(route('admin.appearance.about-us.deleteWhyChooseUs', $each_why_choose_us->id)); ?>"
                                                            title="<?php echo e(localize('Delete')); ?>">
                                                            <i data-feather="trash-2" class="me-2"></i>
                                                            <?php echo e(localize('Delete')); ?>

                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- features -->


                    <!-- add features -->
                    <form action="<?php echo e(route('admin.appearance.about-us.storeWhyChooseUs')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Add New Widget')); ?></h5>

                                <div class="mb-4">
                                    <label for="title" class="form-label"><?php echo e(localize('Title')); ?></label>
                                    <input type="text" name="title" id="title"
                                        placeholder="<?php echo e(localize('Type title')); ?>" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="text" class="form-label"><?php echo e(localize('Text')); ?></label>
                                    <textarea name="text" id="text" placeholder="<?php echo e(localize('Type text')); ?>" class="form-control" required></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label"><?php echo e(localize('Icon Image')); ?></label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Icon Image')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="image">
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
                        <!--slider info end-->


                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Widget')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- add features -->

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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/appearance/aboutUs/whyChooseUs.blade.php ENDPATH**/ ?>