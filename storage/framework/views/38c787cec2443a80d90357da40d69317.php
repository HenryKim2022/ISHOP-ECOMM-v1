<div class="btn-group flex-wrap" role="group" aria-label="First group">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping_zones')): ?>
        <a href="<?php echo e(route('admin.logisticZones.index')); ?>"
            class="btn btn-outline-primary <?php echo e(areActiveRoutes(['admin.logisticZones.index'])); ?>">
            <i data-feather="disc" class="me-1"></i><?php echo e(localize('Zones')); ?>

        </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping_cities')): ?>
        <a href="<?php echo e(route('admin.cities.index')); ?>"
            class="btn btn-outline-primary <?php echo e(areActiveRoutes(['admin.cities.index'])); ?>">
            <i data-feather="pocket" class="me-1"></i><?php echo e(localize('Cities')); ?>

        </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping_states')): ?>
        <a href="<?php echo e(route('admin.states.index')); ?>"
            class="btn btn-outline-primary <?php echo e(areActiveRoutes(['admin.states.index'])); ?>">
            <i data-feather="pie-chart" class="me-1"></i><?php echo e(localize('States')); ?>

        </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping_countries')): ?>
        <a href="<?php echo e(route('admin.countries.index')); ?>"
            class="btn btn-outline-primary <?php echo e(areActiveRoutes(['admin.countries.index'])); ?>">
            <i data-feather="globe" class="me-1"></i><?php echo e(localize('Countries')); ?>

        </a>
    <?php endif; ?>
</div>
<?php /**PATH G:\laragon\www\resources\views/backend/pages/fulfillments/partials/zoneNavbar.blade.php ENDPATH**/ ?>