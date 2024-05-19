<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Logistics')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Logistics')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4" id="section-1">
                                <form class="app-search" action="<?php echo e(Request::fullUrl()); ?>" method="GET">
                                    <div class="card-header border-bottom-0">
                                        <div class="row justify-content-between g-3">
                                            <div class="col-auto flex-grow-1">
                                                <div class="tt-search-box">
                                                    <div class="input-group">
                                                        <span
                                                            class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                                            <i data-feather="search"></i></span>
                                                        <input class="form-control rounded-start w-100" type="text"
                                                            id="search" name="search"
                                                            placeholder="<?php echo e(localize('Search')); ?>"
                                                            <?php if(isset($searchKey)): ?>
                                        value="<?php echo e($searchKey); ?>"
                                    <?php endif; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">
                                                    <i data-feather="search" width="18"></i>
                                                    <?php echo e(localize('Search')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <table class="table tt-footable border-top" data-use-parent-width="true">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo e(localize('S/L')); ?></th>
                                            <th><?php echo e(localize('Name')); ?></th>
                                            <th data-breakpoints="xs sm"><?php echo e(localize(' Is Active')); ?></th>
                                            <th data-breakpoints="xs sm"><?php echo e(localize('Is Publish')); ?></th>
                                            <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $logistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo e($key + 1 + ($logistics->currentPage() - 1) * $logistics->perPage()); ?>

                                                </td>

                                                <td>
                                                    <a class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm">
                                                            <img class="rounded-circle"
                                                                src="<?php echo e(uploadedAsset($logistic->thumbnail_image)); ?>"
                                                                alt="<?php echo e($logistic->name); ?>" />
                                                        </div>
                                                        <h6 class="fs-sm mb-0 ms-2"> <?php echo e($logistic->name); ?>

                                                        </h6>
                                                    </a>
                                                </td>


                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('active_logistics')): ?>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                onchange="updateStatus(this, 'is_active')"
                                                                <?php if($logistic->is_active): ?> checked <?php endif; ?>
                                                                value="<?php echo e($logistic->id); ?>"
                                                                data-is-active="<?php echo e($logistic->is_active); ?>"
                                                            >
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('publish_logistics')): ?>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                onchange="updateStatus(this, 'is_published')"
                                                                <?php if($logistic->is_published): ?> checked <?php endif; ?>
                                                                value="<?php echo e($logistic->id); ?>"
                                                                data-is-active="<?php echo e($logistic->is_published); ?>"
                                                            >
                                                        </div>
                                                    <?php endif; ?>
                                                </td>


                                                
                                                

                                                <td class="text-end">
                                                    <div class="dropdown tt-tb-dropdown">
                                                        <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end shadow">
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_logistics')): ?>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('admin.logistics.edit', ['id' => $logistic->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                                    <i data-feather="edit-3"
                                                                        class="me-2"></i><?php echo e(localize('Edit')); ?>

                                                                </a>
                                                            <?php endif; ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_logistics')): ?>
                                                                <a href="#" class="dropdown-item confirm-delete"
                                                                    data-href="<?php echo e(route('admin.logistics.delete', $logistic->id)); ?>"
                                                                    title="<?php echo e(localize('Delete')); ?>">
                                                                    <i data-feather="trash-2" class="me-2"></i>
                                                                    <?php echo e(localize('Delete')); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <!--pagination start-->
                                <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                                    <span><?php echo e(localize('Showing')); ?>

                                        <?php echo e($logistics->firstItem()); ?>-<?php echo e($logistics->lastItem()); ?> <?php echo e(localize('of')); ?>

                                        <?php echo e($logistics->total()); ?> <?php echo e(localize('results')); ?></span>
                                    <nav>
                                        <?php echo e($logistics->appends(request()->input())->links()); ?>

                                    </nav>
                                </div>
                                <!--pagination end-->
                            </div>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_logistics')): ?>
                            <form action="<?php echo e(route('admin.logistics.store')); ?>" class="pb-650" method="POST">
                                <?php echo csrf_field(); ?>
                                <!-- Logistic info start-->
                                <div class="card mb-4" id="section-2">
                                    <div class="card-body">
                                        <h5 class="mb-4"><?php echo e(localize('Add New Logistic')); ?></h5>

                                        <div class="mb-4">
                                            <label for="name" class="form-label"><?php echo e(localize('Logistic Name')); ?></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="<?php echo e(localize('Type logistic name')); ?>" required>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label"><?php echo e(localize('Logistic Image')); ?></label>
                                            <div class="tt-image-drop rounded">
                                                <span class="fw-semibold"><?php echo e(localize('Choose Logistic Thumbnail')); ?></span>
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
                                <!-- Logistic info end-->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-primary" type="submit">
                                                <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Logistic')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">Logistic Information</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">All Logistics</a>
                                    </li>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_logistics')): ?>
                                        <li>
                                            <a href="#section-2">Add New Logistic</a>
                                        </li>
                                    <?php endif; ?>
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

    function updateStatus(el, type) {
        var status = el.checked ? 1 : 0;
        var initialStatus = el.getAttribute('data-is-active');

        $.post('<?php echo e(route('admin.logistics.updateStatus')); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            id: el.value,
            type: type,
            is_active: status, // Include the is_active value in the request payload
            is_published: status, // Include the is_published value in the request payload
            initial_status: initialStatus
        }, function(data) {
            if (data == 1) {
                notifyMe('success', '<?php echo e(localize('Status updated successfully')); ?>');
            } else {
                notifyMe('danger', '<?php echo e(localize('Something went wrong')); ?>');
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/fulfillments/logistics/index.blade.php ENDPATH**/ ?>