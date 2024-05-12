<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Login')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contents'); ?>
    <section class="login-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-12 tt-login-img"
                    data-background="<?php echo e(staticAsset('frontend/default/assets/img/banner/login-banner.jpg')); ?>"></div>
                <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                    <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" action="<?php echo e(route('login')); ?>" method="POST"
                        id="login-form">
                        <?php echo csrf_field(); ?>
                        <?php if(getSetting('enable_recaptcha') == 1): ?>
                            <?php echo RecaptchaV3::field('recaptcha_token'); ?>

                        <?php endif; ?>
                        <div class="mb-7">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(uploadedAsset(getSetting('navbar_logo'))); ?>" alt="logo">
                            </a>
                        </div>
                        <h2 class="mb-4 h3"><?php echo e(localize('Hey there!')); ?>

                            <br><?php echo e(localize('Welcome back to ') . " " . getSetting('system_title') . '.'); ?>

                        </h2>

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <input type="hidden" name="login_with" class="login_with" value="email">

                                    <span class="login-email <?php if(old('login_with') == 'phone'): ?> d-none <?php endif; ?>">
                                        <label class="fw-bold text-dark fs-sm mb-1"><?php echo e(localize('Email')); ?></label>
                                        <input type="email" id="email" name="email"
                                            placeholder="<?php echo e(localize('Enter your email')); ?>" class="theme-input mb-1"
                                            value="<?php echo e(old('email')); ?>" required>
                                        <small class="">
                                            <a href="javascript:void(0);" class="fs-sm login-with-phone-btn"
                                                onclick="handleLoginWithPhone()">
                                                <?php echo e(localize('Login with phone?')); ?></a>
                                        </small>
                                    </span>

                                    <span class="login-phone <?php if(old('login_with') == 'email' || old('login_with') == ''): ?> d-none <?php endif; ?>">
                                        <label class="fw-bold text-dark fs-sm mb-1"><?php echo e(localize('Phone')); ?></label>
                                        <input type="text" id="phone" name="phone" placeholder="+xxxxxxxxxx"
                                            class="theme-input mb-1" value="<?php echo e(old('phone')); ?>">

                                        <small class="">
                                            <a href="javascript:void(0);" class="fs-sm login-with-email-btn"
                                                onclick="handleLoginWithEmail()">
                                                <?php echo e(localize('Login with email?')); ?></a>
                                        </small>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-field check-password">
                                    <label class="fw-bold text-dark fs-sm mb-1"><?php echo e(localize('Password')); ?></label>
                                    <div class="check-password">
                                        <input type="password" name="password" id="password"
                                            placeholder="<?php echo e(localize('Password')); ?>" class="theme-input" required>
                                        <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <div class="checkbox d-inline-flex align-items-center gap-2">
                                <div class="theme-checkbox flex-shrink-0">
                                    <input type="checkbox" id="save-password">
                                    <span class="checkbox-field"><i class="fa-solid fa-check"></i></span>
                                </div>
                                <label for="save-password" class="fs-sm"> <?php echo e(localize('Remember me')); ?></label>
                            </div>
                            <a href="<?php echo e(route('password.request')); ?>" class="fs-sm"><?php echo e(localize('Forgot Password')); ?></a>
                        </div>

                        <?php if(env('DEMO_MODE') == 'On'): ?>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <label class="fw-bold">Admin Access</label>
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between border-bottom pb-3">
                                        <small>admin@themetags.com</small>
                                        <small>123456</small>
                                        <button class="btn btn-sm btn-secondary py-0 px-2" type="button"
                                            onclick="copyAdmin()">Copy</button>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <label class="fw-bold">Customer Access</label>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <small>customer@themetags.com</small>
                                        <small>123456</small>

                                        <button class="btn btn-sm btn-secondary py-0 px-2" type="button"
                                            onclick="copyCustomer()">Copy</button>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="fw-bold">Delivery Access</label>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <small>delivery-man@themetags.com</small>
                                        <small>123456</small>

                                        <button class="btn btn-sm btn-secondary py-0 px-2" type="button"
                                            onclick="copyDeliveryMan()">Copy</button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row g-4 mt-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary w-100 sign-in-btn"
                                    onclick="handleSubmit()"><?php echo e(localize('Sign In')); ?></button>
                            </div>

                        </div>

                        <div class="row g-4 mt-3">
                            <!--social login-->
                            <?php echo $__env->make('frontend.default.inc.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!--social login-->

                        </div>
                        <p class="mb-0 fs-xs mt-3"><?php echo e(localize("Don't have an Account?")); ?> <a
                                href="<?php echo e(route('register')); ?>"><?php echo e(localize('Sign Up')); ?></a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // copyAdmin
        function copyAdmin() {
            $('#email').val('admin@themetags.com');
            $('#password').val('123456');
        }

        // copyCustomer
        function copyCustomer() {
            $('#email').val('customer@themetags.com');
            $('#password').val('123456');
        }
        // copyCustomer
        function copyDeliveryMan() {
            $('#email').val('delivery-man@themetags.com');
            $('#password').val('123456');
        }

        // change input to phone
        function handleLoginWithPhone() {
            $('.login_with').val('phone');

            $('.login-email').addClass('d-none');
            $('.login-email input').prop('required', false);

            $('.login-phone').removeClass('d-none');
            $('.login-phone input').prop('required', true);
        }

        // change input to email
        function handleLoginWithEmail() {
            $('.login_with').val('email');
            $('.login-email').removeClass('d-none');
            $('.login-email input').prop('required', true);

            $('.login-phone').addClass('d-none');
            $('.login-phone input').prop('required', false);
        }


        // disable login button
        function handleSubmit() {
            $('#login-form').on('submit', function(e) {
                $('.sign-in-btn').prop('disabled', true);
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/auth/login.blade.php ENDPATH**/ ?>