<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Shipping Cities')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

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
                                        <h2 class="h5 mb-0"><?php echo e(localize('Shipping Citites')); ?></h2>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <?php echo $__env->make('backend.pages.fulfillments.partials.zoneNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="col-auto">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_shipping_cities')): ?>
                                        <a href="<?php echo e(route('admin.cities.create')); ?>" class="btn btn-primary"><i
                                                data-feather="plus"></i><?php echo e(localize('Add City')); ?></a>
                                    <?php endif; ?>
                                </div>
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
                                            <select class="form-select select2" name="searchState">
                                                <option value=""><?php echo e(localize('Select an State')); ?></option>
                                                <?php $__currentLoopData = \App\Models\State::where('is_active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($state->id); ?>"
                                                        <?php if($searchState == $state->id): ?> selected <?php endif; ?>>
                                                        <?php echo e($state->name); ?></option>
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

                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(localize('S/L')); ?></th>
                                    <th><?php echo e(localize('Name')); ?></th>
                                    <th><?php echo e(localize('State')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Active')); ?></th>
                                    <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo e($key + 1 + ($cities->currentPage() - 1) * $cities->perPage()); ?>

                                        </td>

                                        <td class="fw-semibold">
                                            <?php echo e($city->name); ?>

                                        </td>

                                        <td class="fw-semibold">
                                            <?php echo e($city->state->name); ?>

                                        </td>

                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('publish_shipping_cities')): ?>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input"
                                                        onchange="updateStatus(this)"
                                                        <?php if($city->is_active): ?> checked <?php endif; ?>
                                                        value="<?php echo e($city->id); ?>">
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

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_shipping_cities')): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('admin.cities.edit', ['id' => $city->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                            <i data-feather="edit-3" class="me-2"></i><?php echo e(localize('Edit')); ?>

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

                                <?php echo e($cities->firstItem()); ?>-<?php echo e($cities->lastItem()); ?>

                                <?php echo e(localize('of')); ?>

                                <?php echo e($cities->total()); ?> <?php echo e(localize('results')); ?></span>
                            <nav>
                                <?php echo e($cities->appends(request()->input())->links()); ?>

                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        function updateStatus(el) {
            if (el.checked) {
                var is_active = 1;
            } else {
                var is_active = 0;
            }
            $.post('<?php echo e(route('admin.cities.updateStatus')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: el.value,
                    is_active: is_active
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '<?php echo e(localize('Status updated successfully')); ?>');
                    } else {
                        notifyMe('danger', '<?php echo e(localize('Something went wrong')); ?>');
                    }
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/fulfillments/cities/index.blade.php ENDPATH**/ ?>