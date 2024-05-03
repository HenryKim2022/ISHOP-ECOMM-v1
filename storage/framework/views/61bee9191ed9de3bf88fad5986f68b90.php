<section class="gshop-category-section bg-white pt-8 position-relative z-1 overflow-hidden">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape.png')); ?>" alt="bg shape"
        class="position-absolute bottom-0 start-0 w-100 z--1">
    <div class="container">
        <div class="gshop-category-box border-secondary rounded-3 bg-white">
            <div class="text-center section-title">
                <h4 class="d-inline-block px-2 bg-white mb-4"><?php echo e(localize('Our Top Categories')); ?></h4>
            </div>
            <div class="row justify-content-center g-2">
                <?php
                    $top_category_ids = getSetting('top_category_ids') != null ? json_decode(getSetting('top_category_ids')) : [];
                    $categories = \App\Models\Category::whereIn('id', $top_category_ids)->get();
                ?>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $productsCount = \App\Models\ProductCategory::where('category_id', $category->id)->count();
                    ?>
                    <div class="col-xxl-1 cst-img-col-lg-2 col-md-3 col-sm-4">
                        
                         <a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>">
                            <div class="gshop-animated-iconbox mh-95 h-95pt py-2 px-1 text-center border-0 cst-rounded-32-5 position-relative overflow-hidden <?php echo e($loop->even ? 'color-2' : ''); ?>">
                                <div
                                    class="animated-icon d-inline-flex align-items-center justify-content-center rounded-circle position-relative">
                                    <img src="<?php echo e(uploadedAsset($category->collectLocalization('thumbnail_image'))); ?>"
                                        alt="" class="img-fluid cst-mw-fit cst-category-img-size"
                                        >
                                </div>

                                
                                
                                    

                                

                                
                            </div>
                        </a>
                    </div>


                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/home/category.blade.php ENDPATH**/ ?>