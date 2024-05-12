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
                                    placeholder="<?php echo e(localize('Search')); ?>..."
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

        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
            <thead>
                <tr>
                    <th class="text-center" width="7%"><?php echo e(localize('S/L')); ?></th>
                    <th><?php echo e(localize('Name')); ?></th>
                    <th><?php echo e(localize('Assign Staff')); ?></th>
                    <th><?php echo e(localize('Status')); ?></th>
                    <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center">
                            <?php echo e($key + 1 + ($categories->currentPage() - 1) * $categories->perPage()); ?>

                        </td>

                        <td class="">
                            <div class="fw-semibold d-flex align-items-center">                               
                                <div class="ms-1"><?php echo e($category->name); ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?php echo e($category->staff->name); ?>

                        </td>
                        <td>
                            <?php if (isset($component)) { $__componentOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd = $attributes; } ?>
<?php $component = App\View\Components\StatusChange::resolve(['modelid' => $category->id,'table' => $category->getTable(),'status' => $category->is_active] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-change'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\StatusChange::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd)): ?>
<?php $attributes = $__attributesOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd; ?>
<?php unset($__attributesOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd)): ?>
<?php $component = $__componentOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd; ?>
<?php unset($__componentOriginalf8a4e8eaf5e55fe84ee71ce72b6d66bd); ?>
<?php endif; ?>
                        </td>
                        <td class="text-end">
                            <?php if(auth()->user()->user_type != 'customer'): ?>
                                <div class="dropdown tt-tb-dropdown">
                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end shadow">
                                        <a class="dropdown-item"
                                            href="<?php echo e(route('support.category.edit', ['id' => $category->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                            <i data-feather="edit-3"
                                                class="me-2"></i><?php echo e(localize('Edit')); ?>

                                        </a>

                                        <a href="#" class="dropdown-item confirm-delete"
                                            data-href="<?php echo e(route('support.category.destroy', $category->id)); ?>"
                                            title="<?php echo e(localize('Delete')); ?>">
                                            <i data-feather="trash-2" class="me-2"></i>
                                            <?php echo e(localize('Delete')); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php if((int) $category->user_id == auth()->user()->id): ?>
                                    <div class="dropdown tt-tb-dropdown">
                                        <button type="button" class="btn p-0"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end shadow">
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('support.category.edit', ['id' => $category->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                <i data-feather="edit-3"
                                                    class="me-2"></i><?php echo e(localize('Edit')); ?>

                                            </a>

                                            <a href="#" class="dropdown-item confirm-delete"
                                                data-href="<?php echo e(route('support.category.destroy', $category->id)); ?>"
                                                title="<?php echo e(localize('Delete')); ?>">
                                                <i data-feather="trash-2" class="me-2"></i>
                                                <?php echo e(localize('Delete')); ?>

                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <!--pagination start-->
        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
            <span><?php echo e(localize('Showing')); ?>

                <?php echo e($categories->firstItem()); ?>-<?php echo e($categories->lastItem()); ?> <?php echo e(localize('of')); ?>

                <?php echo e($categories->total()); ?> <?php echo e(localize('results')); ?></span>
            <nav>
                <?php echo e($categories->appends(request()->input())->links()); ?>

            </nav>
        </div>
        <!--pagination end-->
    </div>
</div><?php /**PATH G:\laragon\www\Modules/Support\Resources/views/category/inc/list.blade.php ENDPATH**/ ?>