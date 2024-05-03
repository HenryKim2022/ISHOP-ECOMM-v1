<?php $__env->startSection('title'); ?>
    <?php echo e(localize('About Us')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center"><?php echo e(localize('About Us')); ?></h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page"><?php echo e(localize('Pages')); ?></li>
                <li class="breadcrumb-item fw-bold" aria-current="page"><?php echo e(localize('About')); ?></li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <!--about section start-->
    <section class="pt-4 ab-about-section position-relative z-1 overflow-hidden">
        
        <div class="container">
            <div class="row g-5 g-xl-4 align-items-center">
                <div class="col-12 text-center">
                    <div class="subtitle d-flex align-items-center gap-3 flex-wrap">
                        <span class="gshop-subtitle"><?php echo e(getSetting('about_intro_sub_title')); ?></span>
                        <span>
                            <svg width="78" height="16" viewBox="0 0 78 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.0138875" y1="7.0001" x2="72.0139" y2="8.0001" stroke="#FF7C08"
                                    stroke-width="2" />
                                <path d="M78 8L66 14.9282L66 1.0718L78 8Z" fill="#FF7C08" />
                            </svg>
                        </span>
                    </div>
                    <h2 class="mb-4"><?php echo getSetting('about_intro_title'); ?></h2>
                    <p class="mb-8"><?php echo e(getSetting('about_intro_text')); ?></p>
                </div>
                <div class="col-xl-6">
                    <div class="ab-left position-relative">
                        <img src="<?php echo e(uploadedAsset(getSetting('about_intro_image'))); ?>" alt="" class="img-fluid">
                        <div class="text-end">
                            <div class="ab-quote p-4 text-start">
                                <h4 class="mb-0 fw-normal text-white">“<?php echo e(getSetting('about_intro_quote')); ?>” <span
                                        class="fs-md fw-medium position-relative"><?php echo e(getSetting('about_intro_quote_by')); ?></span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ab-about-right">
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="image-box py-6 px-4 image-box-border">
                                    <div class="icon position-relative">
                                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/icons/hand-icon.svg')); ?>"
                                            alt="hand icon" class="img-fluid">
                                    </div>
                                    <h4 class="mt-3"><?php echo e(localize('Our Mission')); ?></h4>
                                    <p class="mb-0"><?php echo e(getSetting('about_intro_mission')); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image-box py-6 px-4 image-box-border">
                                    <div class="icon position-relative">
                                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/icons/hand-icon.svg')); ?>"
                                            alt="hand icon" class="img-fluid">
                                    </div>
                                    <h4 class="mt-3"><?php echo e(localize('Our Vision')); ?></h4>
                                    <p class="mb-0"><?php echo e(getSetting('about_intro_vision')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about section end-->

    <!--brands section start-->
    <section class="brands-section pt-120 position-relative z-1 overflow-hidden">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape-4.png')); ?>" alt="bg shape"
            class="position-absolute start-0 bottom-0 w-100 z--1 bg-shape">
        <div class="container">
            <div class="brand-wrapper px-5 rounded-4">
                <h4 class="section-title mb-0"><?php echo e(localize('The Most Popular Brands')); ?></h4>
                <div class="brands-slider swiper px-2 pt-4 pb-7">
                    <?php
                        $about_popular_brand_ids = getSetting('about_popular_brand_ids') != null ? json_decode(getSetting('about_popular_brand_ids')) : [];
                        $brands = \App\Models\Brand::whereIn('id', $about_popular_brand_ids)->get();
                    ?>
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide brand-item rounded">
                                <img src="<?php echo e(uploadedAsset($brand->collectLocalization('brand_image'))); ?>" alt=""
                                    class="img-fluid">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--brands section end-->

    <!--feature section start-->
    <?php if($features): ?>
        <section class="about-section bg-shade position-relative z-1">
            <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape-5.png')); ?>" alt="bg shape"
                class="position-absolute start-0 bottom-0 z--1 w-100">
            <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/roll-color.png')); ?>" alt="roll"
                class="position-absolute roll-color z--1" data-parallax='{"y": -50}'>
            <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/roll-color-curve.png')); ?>" alt="roll"
                class="position-absolute roll-color-curve z--1" data-parallax='{"y": 50}'>
            <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/onion-color.png')); ?>" alt="onion"
                class="position-absolute onion-color z--1" data-parallax='{"x": -30}'>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title text-center">
                            <h2 class="mb-3"><?php echo e(getSetting('about_features_title')); ?></h2>
                            <p class="mb-0"><?php echo e(getSetting('about_features_sub_title')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-4">
                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="horizontal-counter d-flex align-items-center gap-3 bg-white rounded p-4">
                                <span
                                    class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-2 flex-shrink-0">
                                    <img src="<?php echo e(uploadedAsset($feature->image)); ?>" alt="icon" class="img-fluid">
                                </span>
                                <div>
                                    <h3 class="mb-1"><?php echo e($feature->title); ?></h3>
                                    <h6 class="mb-0 text-gray fs-sm"><?php echo e($feature->text); ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        <?php endif; ?>
    </section>
    <!--feature section end-->

    <!--about us section-->
    <?php if(getSetting('about_why_choose_banner') ): ?>
        <section class="about-us-section ptb-120">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-xl-5">
                        <div class="about-us-left position-relative">
                            <img src="<?php echo e(uploadedAsset(getSetting('about_why_choose_banner'))); ?>" alt=""
                                class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="about-us-right">
                            <div class="section-title-mx mb-6">
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                    <h6 class="mb-0 gshop-subtitle text-secondary">
                                        <?php echo e(getSetting('about_why_choose_sub_title')); ?></h6>
                                    <span>
                                        <svg width="58" height="10" viewBox="0 0 58 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line x1="-6.99382e-08" y1="5.2" x2="52" y2="5.2"
                                                stroke="#FF7C08" stroke-width="1.6" />
                                            <path d="M58 5L50.5 9.33013L50.5 0.669872L58 5Z" fill="#FF7C08" />
                                        </svg>
                                    </span>
                                </div>
                                <h2 class="mb-3"><?php echo getSetting('about_why_choose_title'); ?></h2>
                                <p class="mb-0"><?php echo e(getSetting('about_why_choose_text')); ?></p>
                            </div>
                            <div class="row g-3">
                                <?php $__currentLoopData = $why_choose_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each_why_choose_us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <div
                                            class="horizontal-icon-box d-flex align-items-center gap-4 bg-white rounded p-4 hover-shadow flex-wrap flex-xxl-nowrap">
                                            <span class="icon-wrapper position-relative flex-shrink-0">
                                                <img src="<?php echo e(uploadedAsset($each_why_choose_us->image)); ?>" alt=""
                                                    class="img-fluid">
                                            </span>
                                            <div class="content-right">
                                                <h5 class="mb-3"><?php echo e($each_why_choose_us->title); ?></h5>
                                                <p class="mb-0"><?php echo e($each_why_choose_us->text); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    <?php endif; ?>
    <!--about us section end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/quickLinks/aboutUs.blade.php ENDPATH**/ ?>