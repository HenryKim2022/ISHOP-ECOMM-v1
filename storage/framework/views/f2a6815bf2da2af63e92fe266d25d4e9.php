<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Coupons')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center"><?php echo e(localize('All Coupons')); ?></h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page"><?php echo e(localize('Coupons')); ?></li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    
    <!--campaign section start-->
    


    



    <style>
 
        .display-8 {
            font-size: calc(1.045rem + 0.1vw);
            font-weight: 700;
            line-height: 1.2;
        }

        .coupon-row{
            margin: -5px auto;
        }

 
        small, .small, .fs-15 {
            font-size: .775rem;
        }
    </style>


    <section class="tt-campaigns pt-8 pb-100">
        <div class="container">
            <div class="row g-4">

                <?php
                    $coupons = \App\Models\Coupon::where('end_date', '>=', strtotime(date('Y-m-d')))
                        ->latest()
                        ->get();
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6">

                        
                        <?php
                            $couponBanner = $coupon->banner;
                        ?>


                        <?php if($couponBanner != ''): ?>
                            <div class="card shadow-lg border-0 tt-coupon-single tt-gradient-top"
                                style="background:
                                    url('<?php echo e(uploadedAsset($coupon->banner)); ?>')no-repeat center
                                    center / cover">
                       
                        <?php else: ?>
                            <div class="card shadow-lg border-0 tt-coupon-single tt-gradient-top"
                                style="background-color: #84ac75"
                            >
                           
                        <?php endif; ?>

                        

                            <div class="card-body text-center py-5 px-4">
                                <div class="row d-flex justify-content-sm-evenly">
                                    <div class="row d-flex flex-column">
                                        <div class="col">
                                            <div class="offer-text mb-2 mt-2 justify-content-center">
                                                <div class="up-to fw-bold text-light"><?php echo e(localize('UP TO')); ?></div>
                                                <div class="display-5 fw-bold text-danger">
                                                    <?php echo e($coupon->discount_type != 'flat' ? $coupon->discount_value : formatPrice($coupon->discount_value)); ?>

                                                </div>
                                                <p class="display-8 mb-0 fw-bold text-danger">
                                                    <span><?php echo e($coupon->discount_type != 'flat' ? '%' : ''); ?></span> <br>
                                                    <?php echo e(localize('Off')); ?>

                                                </p>
                                            </div>                                      
    
                                        </div>
                                        <div class="coupon-row">
                                            <span class="copyCode pt-2 pb-2 pl-1 pr-1 fs-14"><?php echo e($coupon->code); ?></span>
                                            <span class="copyBtn copy-text pt-2 pb-2 pl-1 pr-1 fs-15 bg-warning"
                                                data-clipboard-text="<?php echo e($coupon->code); ?>"><?php echo e(localize('Copy Code')); ?></span>
                                        </div>
    
                                       
                                    </div>

                                    <ul class="timing-countdown countdown-timer d-inline-block gap-2 mt-3 mb-4"
                                        data-date="<?php echo e(date('m/d/Y', $coupon->end_date)); ?> 23:59:59">
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 days fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Days')); ?></span>
                                        </li>
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 hours fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Hours')); ?></span>
                                        </li>
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 minutes fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Min')); ?></span>
                                        </li>
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 seconds fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Sec')); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                
                               
                           

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 col-md-6 mx-auto">

                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/no-data-found.png')); ?>" class="img-fluid"
                            alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!--campaign section end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/coupons/index.blade.php ENDPATH**/ ?>