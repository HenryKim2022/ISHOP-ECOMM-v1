

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Support Categories')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1"><?php echo e(localize('Payment Methods Settings')); ?></h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(localize('Dashboard')); ?></a>
                                    </li>
                                    <li class="breadcrumb-item"><?php echo e(localize('Payment Methods Settings')); ?></li>
                                </ol>
                            </div>
                            <div class="tt-action">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">

                <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="tt-payment-gateway rounded-3 shadow-sm card border-0 h-100 flex-column cursor-pointer"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvas<?php echo e(ucfirst($payment_gateway->gateway)); ?>">
                            <div class="card-body tt-payment-info">
                                <div class="d-flex align-items-center justify-content-between">
                                    <img class="img-fluid" src="<?php echo e(imagePath($payment_gateway->image)); ?>"
                                        alt="avatar" />
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input"
                                            <?php if($payment_gateway->is_active == 1): ?> checked <?php endif; ?>>
                                    </div>
                                </div>
                                <div class="tt-payment-setting position-absolute btn rounded-pill btn-light">
                                    <?php echo e(localize('Settings')); ?><i data-feather="arrow-right" class="ms-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                   
                 
            </div>

         
           
        </div>
    </section>
        
    <?php echo $__env->make('paymentgateway::settings.paymentForm.paypal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.mercadopago', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.stripe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.paytm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.razorpay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.iyzico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.paystack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.flutterwave', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.duitku', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.yookassa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
    <?php echo $__env->make('paymentgateway::settings.paymentForm.molile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.mercadopago', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.midtrans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.offline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('paymentgateway::settings.paymentForm.cash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('paymentgateway::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/gateway-settings.blade.php ENDPATH**/ ?>