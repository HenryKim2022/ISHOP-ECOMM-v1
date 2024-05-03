<script type="text/javascript" src="<?php echo e(staticAsset('frontend/common/js/custom.js')); ?>"></script>        

<div class="footer-curve position-relative overflow-hidden">
    <span class="position-absolute section-curve-wrapper top-0 h-100"
        data-background="<?php echo e(staticAsset('frontend/default/assets/img/shapes/section-curve.png')); ?>"></span>
</div>

<footer class="gshop-footer position-relative pt-8 bg-dark z-1 overflow-hidden">
    <?php echo $__env->make('frontend.default.inc.footerBgImages.' . getTheme(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6">
                <div class="gshop_subscribe_form text-center">
                    <h4 class="text-white gshop-title"><?php echo e(localize('Subscribe to the us')); ?><mark
                            class="p-0 position-relative text-secondary bg-transparent"> <?php echo e(localize('New Arrivals')); ?>

                            <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/border-line.svg')); ?>"
                                alt="border line" class="position-absolute border-line"></mark><br
                            class="d-none d-sm-block"><?php echo e(localize('& Other Information.')); ?></h4>
                    <form class="mt-5 d-flex align-items-center bg-white rounded subscribe_form"
                        action="<?php echo e(route('subscribe.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(getSetting('enable_recaptcha') == 1): ?>
                            <?php echo RecaptchaV3::field('recaptcha_token'); ?>

                        <?php endif; ?>
                        <input type="email" class="form-control" placeholder="<?php echo e(localize('Enter Email Address')); ?>"
                            type="email" name="email" required>
                        <button type="submit"
                            class="btn btn-primary flex-shrink-0"><?php echo e(localize('Subscribe Now')); ?></button>
                    </form>
                </div>
            </div>
        </div>
        <span class="gradient-spacer my-8 d-block"></span>
        <div class="row g-5">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h5 class="text-white mb-4"><?php echo e(localize('Category')); ?></h5>
                    <?php
                        $footer_categories = getSetting('footer_categories') != null ? json_decode(getSetting('footer_categories')) : [];
                        $categories = \App\Models\Category::whereIn('id', $footer_categories)->get();
                    ?>
                    <ul class="footer-nav">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a
                                    href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"><?php echo e($category->collectLocalization('name')); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h5 class="text-white mb-4"><?php echo e(localize('Quick Links')); ?></h5>
                    <?php
                        $quick_links = getSetting('quick_links') != null ? json_decode(getSetting('quick_links')) : [];
                        $pages = \App\Models\Page::whereIn('id', $quick_links)->get();
                    ?>
                    <ul class="footer-nav">
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a
                                    href="<?php echo e(route('home.pages.show', $page->slug)); ?>"><?php echo e($page->collectLocalization('title')); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h5 class="text-white mb-4"><?php echo e(localize('Customer Pages')); ?></h5>
                    <ul class="footer-nav">
                        <li><a href="<?php echo e(route('customers.dashboard')); ?>"><?php echo e(localize('Your Account')); ?></a></li>
                        <li><a href="<?php echo e(route('customers.orderHistory')); ?>"><?php echo e(localize('Your Orders')); ?></a></li>
                        <li><a href="<?php echo e(route('customers.wishlist')); ?>"><?php echo e(localize('Your Wishlist')); ?></a></li>
                        <li><a href="<?php echo e(route('customers.address')); ?>"><?php echo e(localize('Address Book')); ?></a></li>
                        <li><a href="<?php echo e(route('customers.profile')); ?>"><?php echo e(localize('Update Profile')); ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h5 class="text-white mb-4"><?php echo e(localize('Contact Info')); ?></h5>
                    <ul class="footer-nav">
                        <li class="text-white pb-2 fs-xs"><?php echo e(getSetting('topbar_location')); ?></li>
                        <li class="text-white pb-2 fs-xs"><?php echo e(getSetting('navbar_contact_number')); ?></li>
                        <li class="text-white pb-2 fs-xs"><?php echo e(getSetting('topbar_email')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright pt-120 pb-3">
        <span class="gradient-spacer d-block mb-3"></span>
        <div class="container">
            <?php
                $acceptedPaymentBanner = getSetting('accepted_payment_banner');
            ?>
    
            <div class="row align-items-center <?php echo e($acceptedPaymentBanner == '' ? 'g-0' : 'g-3'); ?>">
                <div class="col-lg-4">
                    <div class="text-start text-lg-start text-sm-center text-xxs-center text-light" id="cpr_text">
                        <?php echo e(getSetting('copyright_text')); ?>

                    </div>
                </div>
    
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-start" id="footer_middle_logo">
                    <?php if($acceptedPaymentBanner != ''): ?>
                        <!-- Handle the case when accepted_payment_banner exists -->
                        <div class="logo-wrapper text-center">
                            <a href="<?php echo e(route('home')); ?>" class="logo">
                                <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="img-fluid tt-brand-favicon ms-1 w-10" alt="footer logo">
                                <?php if(getSetting('admin_panel_logo') != ''): ?>
                                    <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="img-fluid tt-brand-logo ms-2" alt="logo">
                                <?php else: ?>
                                    <h6 class="d-inline-block px-2 m-auto text-light fs-16"><?php echo e(env('APP_NAME')); ?></h6>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
    
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end">
                    <?php if($acceptedPaymentBanner != ''): ?>
                        <!-- Handle the case when accepted_payment_banner exists -->
                        <div class="footer-payments-info d-flex align-items-center justify-content-lg-end gap-2">
                            <div class="rounded-1 d-inline-flex align-items-center justify-content-center p-2 flex-shrink-0">
                                <img src="<?php echo e(uploadedAsset(getSetting('accepted_payment_banner'))); ?>" alt="Accepted Payment Banner" class="img-fluid">
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Handle the case when accepted_payment_banner is none -->
                        <div class="footer-payments-info d-flex align-items-center justify-content-lg-end gap-2">
                            <div class="rounded-1 d-inline-flex align-items-center justify-content-center p-2 flex-shrink-0">
                                <a href="<?php echo e(route('home')); ?>" class="logo">
                                    <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="img-fluid tt-brand-favicon ms-1 w-10" alt="footer logo">
                                    <?php if(getSetting('admin_panel_logo') != ''): ?>
                                        <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="img-fluid tt-brand-logo ms-2" alt="logo">
                                    <?php else: ?>
                                        <h6 class="d-inline-block px-2 m-auto text-light fs-16"><?php echo e(env('APP_NAME')); ?></h6>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/inc/footer.blade.php ENDPATH**/ ?>