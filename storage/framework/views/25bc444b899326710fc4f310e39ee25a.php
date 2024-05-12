<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Products')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Products')); ?></h2>
                            </div>
                            <div class="tt-action">
                                <a href="<?php echo e(route('admin.products.export')); ?>" class="btn btn-danger"> <i
                                        data-feather="download"></i> <?php echo e(localize('Export')); ?></a>

                                <button class="btn btn-primary import"> <i data-feather="upload"></i>
                                    <?php echo e(localize('Import')); ?></button>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_products')): ?>
                                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary"><i
                                            data-feather="plus"></i> <?php echo e(localize('Add Product')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="<?php echo e(Request::fullUrl()); ?>" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
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
                                            <select class="form-select select2" name="brand_id">
                                                <option value=""><?php echo e(localize('Select Brand')); ?></option>
                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($brand->id); ?>"
                                                        <?php if(isset($brand_id)): ?>
                                                         <?php if($brand_id == $brand->id): ?> selected <?php endif; ?>
                                                        <?php endif; ?>>
                                                        <?php echo e($brand->collectLocalization('name')); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <select class="form-select select2" name="is_published"
                                                data-minimum-results-for-search="Infinity">
                                                <option value=""><?php echo e(localize('Select Status')); ?></option>
                                                <option value="1"
                                                    <?php if(isset($is_published)): ?>
                                                         <?php if($is_published == 1): ?> selected <?php endif; ?>
                                                        <?php endif; ?>>
                                                    <?php echo e(localize('Published')); ?></option>
                                                <option value="0"
                                                    <?php if(isset($is_published)): ?>
                                                         <?php if($is_published == 0): ?> selected <?php endif; ?>
                                                        <?php endif; ?>>
                                                    <?php echo e(localize('Hidden')); ?></option>
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
                                    <th class="text-center"><?php echo e(localize('S/L')); ?>

                                    </th>
                                    <th><?php echo e(localize('Product Name')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Brand')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Categories')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Price')); ?></th>
                                    <th data-breakpoints="xs sm md"><?php echo e(localize('Published')); ?></th>
                                    <th data-breakpoints="xs sm md"><?php echo e(localize('Themes')); ?></th>
                                    <th data-breakpoints="xs sm md" class="text-end"><?php echo e(localize('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo e($key + 1 + ($products->currentPage() - 1) * $products->perPage()); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('products.show', $product->slug)); ?>"
                                                class="d-flex align-items-center" target="_blank">
                                                <div class="avatar avatar-sm">
                                                    <img class="rounded-circle"
                                                        src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>" alt=""
                                                        onerror="this.onerror=null;this.src='<?php echo e(staticAsset('backend/assets/img/placeholder-thumb.png')); ?>';" />
                                                </div>
                                                <h6 class="fs-sm mb-0 ms-2"><?php echo e($product->collectLocalization('name')); ?>

                                                </h6>
                                            </a>
                                        </td>
                                        <td>
                                            <span
                                                class="fs-sm"><?php echo e(optional($product->brand)->collectLocalization('name')); ?></span>
                                        </td>
                                        <td>
                                            <?php $__empty_1 = true; $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <span
                                                    class="badge rounded-pill bg-secondary"><?php echo e($category->collectLocalization('name')); ?></span>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <span class="badge rounded-pill bg-secondary"><?php echo e(localize('N/A')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="tt-tb-price fs-sm fw-bold">
                                                <span class="text-accent">
                                                    <?php if($product->max_price != $product->min_price): ?>
                                                        <?php echo e(formatPrice($product->min_price)); ?>

                                                        -
                                                        <?php echo e(formatPrice($product->max_price)); ?>

                                                    <?php else: ?>
                                                        <?php echo e(formatPrice($product->min_price)); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('publish_products')): ?>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" onchange="updatePublishedStatus(this)"
                                                        class="form-check-input"
                                                        <?php if($product->is_published): ?> checked <?php endif; ?>
                                                        value="<?php echo e($product->id); ?>">
                                                </div>
                                            <?php endif; ?>

                                        </td>
                                        <td> <?php echo e($product->themes->pluck('name')); ?></td>
                                        <td class="text-end">
                                            <div class="dropdown tt-tb-dropdown">
                                                <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end shadow">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_products')): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('admin.products.edit', ['id' => $product->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                            <i data-feather="edit-3" class="me-2"></i><?php echo e(localize('Edit')); ?>

                                                        </a>
                                                    <?php endif; ?>

                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('products.show', $product->slug)); ?>"
                                                        target="_blank">
                                                        <i data-feather="eye"
                                                            class="me-2"></i><?php echo e(localize('View Details')); ?>

                                                    </a>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_products')): ?>
                                                        <a href="#" class="dropdown-item confirm-delete"
                                                            data-href="<?php echo e(route('admin.products.delete', $product->id)); ?>"
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

                                <?php echo e($products->firstItem()); ?>-<?php echo e($products->lastItem()); ?> <?php echo e(localize('of')); ?>

                                <?php echo e($products->total()); ?> <?php echo e(localize('results')); ?></span>
                            <nav>
                                <?php echo e($products->appends(request()->input())->links()); ?>

                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="import" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="<?php echo e(route('admin.products.import')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        
                            <h5 class="modal-title"><?php echo e(localize('Import Products')); ?></h5>
                            
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between mb-3 align-items-center">
                            <label for="import" class="h6 mb-0"><?php echo e(localize('Import File')); ?></label>
                            <a href="<?php echo e(asset('public/sample_product.xlsx')); ?>" douwnload class="btn btn-sm rounded-pill btn-secondary py-1 px-2 fs-ms"><i
                                data-feather="download"></i> <?php echo e(localize('Sample File')); ?></a>
                        </div>

                            <input type="file" id="import" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?php echo e(localize('Import')); ?></button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?php echo e(localize('Close')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict"

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.warning("<?php echo e($error); ?>")
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


        $('.import').on('click', function() {
            const modal = $('#import')

            modal.modal('show');
        })

        // update feature status
        function updateFeatureStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('<?php echo e(route('admin.products.updateFeatureStatus')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '<?php echo e(localize('Status updated successfully')); ?>');
                    } else {
                        notifyMe('danger', '<?php echo e(localize('Something went wrong')); ?>');
                    }
                });
        }

        // update publish status 
        function updatePublishedStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('<?php echo e(route('admin.products.updatePublishedStatus')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: el.value,
                    status: status
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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/products/products/index.blade.php ENDPATH**/ ?>