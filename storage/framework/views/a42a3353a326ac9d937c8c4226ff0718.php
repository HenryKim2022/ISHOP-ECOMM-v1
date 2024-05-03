<section class="position-relative banner-section z-1 overflow-hidden">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape-4.png')); ?>" alt="bg shape"
        class="position-absolute start-0 bottom-0 w-100 z--1">

    <?php
        $BS1 = getSetting('banner_section_two_banner_one');
        $BS2 = getSetting('banner_section_two_banner_two')
    ?>

    <?php if($BS1 || $BS2): ?>
        <div class="container">
            <div class="row g-4">
                <?php if($BS1): ?>
                    <?php if($BS1 && $BS2): ?>
                        <div class="col-xl-8">
                    <?php else: ?>
                        <div class="col-xl-12">                            
                    <?php endif; ?>
                        <a href="<?php echo e(getSetting('banner_section_two_banner_one_link')); ?>">
                            <img src="<?php echo e(uploadedAsset(getSetting('banner_section_two_banner_one'))); ?>" alt=""
                                srcset="" class="img-fluid w-100 h-100">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if($BS2): ?>
                    <?php if($BS2 && $BS1): ?>
                        <div class="col-xl-4 d-none d-xl-block">
                    <?php else: ?>
                        <div class="col-xl-12 d-none d-xl-block">                           
                    <?php endif; ?>
                        <a href="<?php echo e(getSetting('banner_section_two_banner_two_link')); ?>">
                            <img src="<?php echo e(uploadedAsset(getSetting('banner_section_two_banner_two'))); ?>" alt=""
                                srcset="" class="img-fluid w-100 h-100">
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

</section>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/home/bannersTwo.blade.php ENDPATH**/ ?>