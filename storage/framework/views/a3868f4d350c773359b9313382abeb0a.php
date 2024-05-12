<div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
    <!--Filter by search-->
    <div class="sidebar-widget search-widget bg-white py-5 px-4">
        <div class="widget-title d-flex">
            <h6 class="mb-0 flex-shrink-0"><?php echo e(localize('Search Now')); ?></h6>
            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
        </div>
        <div class="search-form d-flex align-items-center mt-4">
            <input type="hidden" name="view" value="<?php echo e(request()->view); ?>">
            <input type="text" id="search" name="search"
                <?php if(isset($searchKey)): ?>
       value="<?php echo e($searchKey); ?>"
       <?php endif; ?>
                placeholder="<?php echo e(localize('Search')); ?>">
            <button type="submit" class="submit-icon-btn-secondary"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <!--Filter by search-->
    <!--Filter by Categories-->
    <div class="sidebar-widget category-widget bg-white py-5 px-4 border-top mobile-menu-wrapper scrollbar h-400px">
        <div class="widget-title d-flex">
            <h6 class="mb-0 flex-shrink-0"><?php echo e(localize('Categories')); ?></h6>
            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
        </div>
        <ul class="widget-nav mt-4">

            <?php
                $product_listing_categories = getSetting('product_listing_categories') != null ? json_decode(getSetting('product_listing_categories')) : [];
                $categories = \App\Models\Category::whereIn('id', $product_listing_categories)->get();
            ?>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $productsCount = \App\Models\ProductCategory::where('category_id', $category->id)->count();
                ?>
                <li><a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"
                        class="d-flex justify-content-between align-items-center"><?php echo e($category->collectLocalization('name')); ?><span
                            class="fw-bold fs-xs total-count"><?php echo e($productsCount); ?></span></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
    <!--Filter by Categories-->

    <!--Filter by Price-->
    <div class="sidebar-widget price-filter-widget bg-white py-5 px-4 border-top">
        <div class="widget-title d-flex">
            <h6 class="mb-0 flex-shrink-0"><?php echo e(localize('Filter by Price')); ?></h6>
            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
        </div>
        <div class="at-pricing-range mt-4">
            <form class="range-slider-form">
                <div class="price-filter-range"></div>
                <div class="d-flex align-items-center mt-3">
                    <input type="number" min="0" oninput="validity.valid||(value='0');"
                        class="min_price price-range-field price-input price-input-min" name="min_price"
                        data-value="<?php echo e($min_value); ?>" data-min-range="0">
                    <span class="d-inline-block ms-2 me-2 fw-bold">-</span>

                    <input type="number" max="<?php echo e($max_range); ?>"
                        oninput="validity.valid||(value='<?php echo e($max_range); ?>');"
                        class="max_price price-range-field price-input price-input-max" name="max_price"
                        data-value="<?php echo e($max_value); ?>" data-max-range="<?php echo e($max_range); ?>">

                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3"><?php echo e(localize('Filter')); ?></button>
            </form>
        </div>
    </div>
    <!--Filter by Price-->

    <!--Filter by Tags-->
    <div class="sidebar-widget tags-widget py-5 px-4 bg-white">
        <div class="widget-title d-flex">
            <h6 class="mb-0"><?php echo e(localize('Tags')); ?></h6>
            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
        </div>
        <div class="mt-4 d-flex gap-2 flex-wrap">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('products.index')); ?>?&tag_id=<?php echo e($tag->id); ?>"
                    class="btn btn-outline btn-sm"><?php echo e($tag->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!--Filter by Tags-->
</div>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/products/inc/productSidebar.blade.php ENDPATH**/ ?>