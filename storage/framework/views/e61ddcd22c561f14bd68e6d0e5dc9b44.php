<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Currencies')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Currencies')); ?></h2>
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
                                            <th class="all"><?php echo e(localize('Name')); ?></th>
                                            <th><?php echo e(localize('Symbol')); ?></th>
                                            <th data-breakpoints="xs sm"><?php echo e(localize('Code')); ?></th>
                                            <th data-breakpoints="xs sm"><?php echo e(localize('Alignment')); ?></th>
                                            <th data-breakpoints="xs sm"><?php echo e(localize('1 USD = ?')); ?></th>
                                            <th data-breakpoints="xs sm"><?php echo e(localize('Active')); ?></th>
                                            <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo e($loop->index + 1); ?>

                                                </td>

                                                <td class="fw-semibold"><?php echo e($currency->name); ?> </td>


                                                <td>
                                                    <?php echo e($currency->symbol); ?>

                                                </td>

                                                <td class="fw-semibold"><?php echo e($currency->code); ?> </td>

                                                <td>
                                                    <?php echo e($currency->alignment == 0 ? localize('[symbol][amount]') : localize('[amount][symbol]')); ?>

                                                </td>
                                                <td class="fw-semibold">
                                                    <?php echo e($currency->rate); ?>

                                                </td>

                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('publish_currency')): ?>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                onchange="updateStatus(this)"
                                                                <?php if($currency->is_active): ?> checked <?php endif; ?>
                                                                value="<?php echo e($currency->id); ?>">
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

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_currency')): ?>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('admin.currencies.edit', $currency->id)); ?>">
                                                                    <i data-feather="edit-3"
                                                                        class="me-2"></i><?php echo e(localize('Edit')); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_currency')): ?>
                            <form action="<?php echo e(route('admin.currencies.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <!--currency info start-->
                                <div class="card mb-4" id="section-2">
                                    <div class="card-body">
                                        <h5 class="mb-4"><?php echo e(localize('Add New Currency')); ?></h5>

                                        <div class="mb-4">
                                            <label for="name" class="form-label"><?php echo e(localize('Currency Name')); ?></label>
                                            <input type="text" name="name" id="name"
                                                placeholder="<?php echo e(localize('Type currency name')); ?>" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="symbol" class="form-label"><?php echo e(localize('Currency Symbol')); ?></label>
                                            <input type="text" name="symbol" id="symbol"
                                                placeholder="<?php echo e(localize('Type symbol')); ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="code" class="form-label"><?php echo e(localize('Currency Code')); ?></label>
                                            <input type="text" name="code" id="code"
                                                placeholder="<?php echo e(localize('Type code')); ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="rate" class="form-label"><?php echo e(localize('Rate')); ?> <small>(
                                                    <?php echo e(localize('1 USD = ?')); ?> )</small></label>
                                            <input type="number" step="0.001" min="0" name="rate"
                                                id="rate" placeholder="<?php echo e(localize('Rate')); ?>" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="symbol" class="form-label"><?php echo e(localize('Alignment')); ?></label>
                                            <select id="alignment" class="form-control text-uppercase select2"
                                                name="alignment" data-toggle="select2">
                                                <option value="0"><?php echo e(localize('[symbol][amount]')); ?>

                                                </option>
                                                <option value="1"><?php echo e(localize('[amount][symbol]')); ?>

                                                </option>
                                                <option value="2"><?php echo e(localize('[symbol] [amount]')); ?>

                                                </option>
                                                <option value="3"><?php echo e(localize('[amount] [symbol]')); ?>

                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--currency info end-->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-primary" type="submit">
                                                <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Currency')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>

                        <!--configurations start-->
                        <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" class="pb-650 mt-3">
                            <?php echo csrf_field(); ?>
                            <div class="card mb-4" id="section-3">
                                <div class="card-body">
                                    <h5 class="mb-4"><?php echo e(localize('Set Default Currency')); ?></h5>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('default_currency')): ?>
                                        <div class="mb-4">
                                            <input type="hidden" name="types[]" value="DEFAULT_CURRENCY">
                                            <label for="symbol"
                                                class="form-label"><?php echo e(localize('Default Currency')); ?></label>
                                            <select id="DEFAULT_CURRENCY" class="form-control country-flag-select"
                                                name="DEFAULT_CURRENCY" data-toggle="select2">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($currency->code); ?>"
                                                        <?php echo e(getSetting('default_currency') == $currency->code ? 'selected' : ''); ?>>
                                                        <?php echo e($currency->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>


                                    <div class="mb-4">
                                        <input type="hidden" name="types[]" value="no_of_decimals">
                                        <label for="no_of_decimals"
                                            class="form-label"><?php echo e(localize('No of Decimals')); ?></label>
                                        <select id="no_of_decimals" class="form-control country-flag-select"
                                            name="no_of_decimals" data-toggle="select2">
                                            <option value="0"
                                                <?php echo e(getSetting('no_of_decimals') == '0' ? 'selected' : ''); ?>>
                                                <?php echo e(localize('Disable')); ?></option>
                                            <option value="1"
                                                <?php echo e(getSetting('no_of_decimals') == '1' ? 'selected' : ''); ?>>123.0
                                            </option>
                                            <option value="2"
                                                <?php echo e(getSetting('no_of_decimals') == '2' ? 'selected' : ''); ?>>123.00
                                            </option>
                                            <option value="3"
                                                <?php echo e(getSetting('no_of_decimals') == '3' ? 'selected' : ''); ?>>123.000
                                            </option>
                                        </select>
                                    </div>


                                    <div class="mb-4">
                                        <input type="hidden" name="types[]" value="truncate_price">
                                        <label for="truncate_price"
                                            class="form-label"><?php echo e(localize('Price Format')); ?></label>
                                        <select id="truncate_price" class="form-control country-flag-select"
                                            name="truncate_price" data-toggle="select2">
                                            <option value="0"
                                                <?php echo e(getSetting('truncate_price') == '0' ? 'selected' : ''); ?>>
                                                <?php echo e(localize('Show Full Price (1000000)')); ?></option>
                                            <option value="1"
                                                <?php echo e(getSetting('truncate_price') == '1' ? 'selected' : ''); ?>>
                                                <?php echo e(localize('Truncate Price (1M/1B)')); ?></option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-primary" type="submit">
                                            <i data-feather="save" class="me-1"></i>
                                            <?php echo e(localize('Save Configurations')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--configurations end-->

                    </div>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo e(localize('Currency Information')); ?></h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active"><?php echo e(localize('All Currencies')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-2"><?php echo e(localize('Add New Currency')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-3"><?php echo e(localize('Currency Configurations')); ?></a>
                                    </li>
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

        function updateStatus(el) {
            if (el.checked) {
                var is_active = 1;
            } else {
                var is_active = 0;
            }
            $.post('<?php echo e(route('admin.currencies.updateStatus')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: el.value,
                    is_active: is_active
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '<?php echo e(localize('Status updated successfully')); ?>');
                    } else if (data == 2) {
                        notifyMe('danger', '<?php echo e(localize('Default currency can not be disabled')); ?>');
                    } else {
                        notifyMe('danger', '<?php echo e(localize('Something went wrong')); ?>');
                    }
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/systemSettings/currency.blade.php ENDPATH**/ ?>