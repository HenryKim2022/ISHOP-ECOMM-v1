<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Shipping Countries')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

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
                                        <h2 class="h5 mb-0"><?php echo e(localize('Shipping Countries')); ?></h2>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <?php echo $__env->make('backend.pages.fulfillments.partials.zoneNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <th><?php echo e(localize('Code')); ?></th>
                                    <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Active')); ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo e($key + 1 + ($countries->currentPage() - 1) * $countries->perPage()); ?>

                                        </td>

                                        <td class="fw-semibold">
                                            <?php echo e($country->name); ?>

                                        </td>

                                        <td class="fw-semibold">
                                            <?php echo e($country->code); ?>

                                        </td>

                                        <td class="pe-4">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('publish_shipping_countries')): ?>
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input type="checkbox" class="form-check-input"
                                                        onchange="updateStatus(this)"
                                                        <?php if($country->is_active): ?> checked <?php endif; ?>
                                                        value="<?php echo e($country->id); ?>">
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span><?php echo e(localize('Showing')); ?>

                                <?php echo e($countries->firstItem()); ?>-<?php echo e($countries->lastItem()); ?>

                                <?php echo e(localize('of')); ?>

                                <?php echo e($countries->total()); ?> <?php echo e(localize('results')); ?></span>
                            <nav>
                                <?php echo e($countries->appends(request()->input())->links()); ?>

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
            $.post('<?php echo e(route('admin.countries.updateStatus')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: el.value,
                    is_active: is_active
                },
                function(data) {
                    if (data == 1) {
                        location.reload();
                    } else {
                        notifyMe('danger', '<?php echo e(localize('Something went wrong')); ?>');
                    }
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/fulfillments/countries/index.blade.php ENDPATH**/ ?>