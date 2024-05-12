<?php
    $itemPrefix = null;
    for ($i = 0; $i < $subCategory->level; $i++) {
        $itemPrefix .= '▸';
    }
?>
<option value="<?php echo e($subCategory->id); ?>"
    <?php if(isset($product_categories)): ?>
        <?php echo e($product_categories->contains($subCategory->id) ? 'selected' : ''); ?> <?php endif; ?>
    <?php if(isset($coupon_categories)): ?>
        <?php if(!is_null($coupon_categories)): ?> <?php echo e($coupon_categories->contains($subCategory->id) ? 'selected' : ''); ?> <?php endif; ?>
        <?php endif; ?>>
    <?php echo e($itemPrefix . ' ' . $subCategory->collectLocalization('name')); ?></option>
<?php if($subCategory->categories): ?>
    <?php $__currentLoopData = $subCategory->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('backend.pages.products.products.subCategory', ['subCategory' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH G:\laragon\www\resources\views/backend/pages/products/products/subCategory.blade.php ENDPATH**/ ?>