<address class="fs-sm mb-0">
    <strong><?php echo e($address->address); ?></strong>
</address>

<strong> <?php echo e(localize('City')); ?>: </strong><?php echo e($address->city->name); ?>

<br>

<strong><?php echo e(localize('State')); ?>: </strong><?php echo e($address->state->name); ?>


<br>
<strong><?php echo e(localize('Country')); ?>: </strong> <?php echo e($address->country->name); ?>

<?php /**PATH G:\laragon\www\resources\views/frontend/default/inc/address.blade.php ENDPATH**/ ?>