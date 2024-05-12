<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($category->id); ?>" <?php echo e(isset($product) ?  ($product->categories()->pluck('category_id')->contains($category->id) ? 'selected' : '') : ''); ?>>
        <?php echo e($category->collectLocalization('name')); ?></option>
    <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('backend.pages.products.products.subCategory', [
            'subCategory' => $childCategory,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH G:\laragon\www\resources\views/backend/pages/products/products/category.blade.php ENDPATH**/ ?>