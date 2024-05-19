<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Shipping Zones')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center g-3">
                                <div class="col-auto flex-grow-1">
                                    <div class="tt-page-title">
                                        <h2 class="h5 mb-0"><?php echo e(localize('Shipping Zones')); ?></h2>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <?php echo $__env->make('backend.pages.fulfillments.partials.zoneNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_shipping_zones')): ?>
                                    <div class="col-auto">
                                        <a href="<?php echo e(route('admin.logisticZones.create')); ?>" class="btn btn-primary"><i
                                                data-feather="plus"></i><?php echo e(localize('Add Zone')); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="<?php echo e(Request::fullUrl()); ?>" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                                    <i data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search" placeholder="<?php echo e(localize('Search')); ?>"
                                                    <?php if(isset($searchKey)): ?>
                                    value="<?php echo e($searchKey); ?>"
                                <?php endif; ?>>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="input-group">
                                            <select class="form-select select2" name="searchLogistic"
                                                data-minimum-results-for-search="Infinity">
                                                <option value=""><?php echo e(localize('Select a Logistic')); ?></option>
                                                <?php $__currentLoopData = \App\Models\Logistic::where('is_published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($logistic->id); ?>"
                                                        <?php if($searchLogistic == $logistic->id): ?> selected <?php endif; ?>>
                                                        <?php echo e($logistic->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary">
                                            <i data-feather="search" width="18"></i>
                                            <?php echo e(localize('Search')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center" width="7%"><?php echo e(localize('S/L')); ?></th>
                                    <th width="10%"><?php echo e(localize('Name')); ?></th>
                                    <th width="15%"><?php echo e(localize('Logistic')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Cities')); ?></th>
                                    <th data-breakpoints="xs sm" width="10%"><?php echo e(localize('Shipping Time')); ?></th>
                                    <th data-breakpoints="xs sm" width="10%"><?php echo e(localize('Shipping Charge')); ?></th>
                                    <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $logisticZones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logisticZone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo e($key + 1 + ($logisticZones->currentPage() - 1) * $logisticZones->perPage()); ?>

                                        </td>

                                        <td class="fw-semibold">
                                            <?php echo e($logisticZone->name); ?>

                                        </td>

                                        <td class="fw-semibold">
                                            <?php echo e($logisticZone->logistic->name); ?>

                                        </td>

                                        <?php
                                            $cities = $logisticZone->cities;
                                        ?>
                                        <td>
                                            <?php $__empty_1 = true; $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <span class="badge bg-secondary rounded-pill"><?php echo e($city->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <span class="badge bg-secondary rounded-pill"><?php echo e(localize('n/a')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php if($logisticZone->standard_delivery_time): ?>
                                                <?php echo e($logisticZone->standard_delivery_time); ?>

                                            <?php else: ?>
                                                <span class="badge bg-secondary rounded-pill"><?php echo e(localize('n/a')); ?></span>
                                            <?php endif; ?>

                                        </td>

                                        <td class="fw-bold">

                                            <span class="text-accent">
                                                <?php echo e(formatPrice($logisticZone->standard_delivery_charge)); ?>

                                            </span>

                                        </td>

                                        <td class="text-end">
                                            <div class="dropdown tt-tb-dropdown">
                                                <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end shadow">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_shipping_zones')): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('admin.logisticZones.edit', ['id' => $logisticZone->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                            <i data-feather="edit-3" class="me-2"></i><?php echo e(localize('Edit')); ?>

                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_shipping_zones')): ?>
                                                        <a href="#" class="dropdown-item confirm-delete"
                                                            data-href="<?php echo e(route('admin.logisticZones.delete', $logisticZone->id)); ?>"
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

                                <?php echo e($logisticZones->firstItem()); ?>-<?php echo e($logisticZones->lastItem()); ?>

                                <?php echo e(localize('of')); ?>

                                <?php echo e($logisticZones->total()); ?> <?php echo e(localize('results')); ?></span>
                            <nav>
                                <?php echo e($logisticZones->appends(request()->input())->links()); ?>

                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/fulfillments/logisticZones/index.blade.php ENDPATH**/ ?>