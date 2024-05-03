<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Campaigns')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center"><?php echo e(localize('All Campaigns')); ?></h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page"><?php echo e(localize('Campaigns')); ?></li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <!--campaign section start-->
    <section class="tt-campaigns pt-8 pb-100">
        <div class="container">
            <div class="row g-4">

                <?php
                    $campaigns = \App\Models\Campaign::where('end_date', '>=', strtotime(date('Y-m-d')))
                        ->where('is_published', 1)
                        ->latest()
                        ->get();
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card shadow-sm border-0 tt-single-campaign tt-gradient-right"
                            style="background:
          url('<?php echo e(uploadedAsset($campaign->banner)); ?>')no-repeat center
          center / cover">
                            <div class="card-body p-5 w-75">
                                <h3 class="h5 text-light"><?php echo e($campaign->title); ?></h3>
                                <ul class="timing-countdown countdown-timer d-flex align-items-center gap-2 mt-3"
                                    data-date="<?php echo e(date('m/d/Y', $campaign->end_date)); ?> 23:59:59">
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 days fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Days')); ?></span>
                                    </li>
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 hours fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Hours')); ?></span>
                                    </li>
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 minutes fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Min')); ?></span>
                                    </li>
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 seconds fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block"><?php echo e(localize('Sec')); ?></span>
                                    </li>
                                </ul>
                                <a href="<?php echo e(route('home.campaigns.show', $campaign->slug)); ?>"
                                    class="btn btn-secondary btn-md mt-5"><?php echo e(localize('View Products')); ?></a>
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

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/campaigns/index.blade.php ENDPATH**/ ?>