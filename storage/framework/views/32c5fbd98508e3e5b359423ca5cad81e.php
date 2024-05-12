<?php if(isset($category)): ?>
    <form action="<?php echo e(route('support.category.update')); ?>" class="pb-650" method="POST">
        <input type="hidden" value="<?php echo e($category->id); ?>" name="id">
<?php else: ?>
    <form action="<?php echo e(route('support.category.store')); ?>" class="pb-650" method="POST">
<?php endif; ?>
    <?php echo csrf_field(); ?>
    <!-- Category info start-->
    <div class="card mb-4" id="section-2">
        <div class="card-body">
            <?php if(isset($category)): ?>
            <h5 class="mb-4"><?php echo e(localize('Edit Category')); ?></h5>
            <?php else: ?>  
            <h5 class="mb-4"><?php echo e(localize('Add New Category')); ?></h5>
            <?php endif; ?>

            <div class="mb-4">
                <label for="name" class="form-label"><?php echo e(localize('Category Name')); ?><span
                        class="text-danger ms-1">*</span></label>
                <input class="form-control" type="text" id="name" name="name"
                    placeholder="<?php echo e(localize('Type category name')); ?>"
                    value="<?php echo e(old('name', isset($category) ? $category->name : '')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="assign_staff"
                    class="form-label"><?php echo e(localize('Assign Staff')); ?>

                    <span class="text-danger ms-1"></span></label>

                <select class="form-select select2" id="assign_staff" name="assign_staff">
                    <option value="">
                        <?php echo e(localize('Select Staff')); ?>

                    </option>
                    <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <option value="" <?php echo e(isset($category) ? $category->assign_staff == $staff->id ? 'selected':'':''); ?>>
                        <?php echo e($staff->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                 
                </select>
            </div>
            <div class="mb-4">
                <label for="status"
                    class="form-label"><?php echo e(localize('Status')); ?>

                    <span class="text-danger ms-1">*</span></label>

                <select class="form-select select2" id="status" name="status"
                    required>
                    <option value="1" <?php echo e(isset($category) ? $category->is_active == 1 ? 'selected':'':''); ?>>
                        <?php echo e(localize('Active')); ?>

                    </option>
                    <option value="0" <?php echo e(isset($category) ? $category->is_active == 0 ? 'selected':'':''); ?>>
                        <?php echo e(localize('Deactive')); ?>

                    </option>
                 
                </select>
            </div>
        </div>
    </div>
    <!-- Category info end-->

    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-primary" type="submit">
                    <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Category')); ?>

                </button>
            </div>
        </div>
    </div>
</form><?php /**PATH G:\laragon\www\Modules/Support\Resources/views/category/inc/form.blade.php ENDPATH**/ ?>