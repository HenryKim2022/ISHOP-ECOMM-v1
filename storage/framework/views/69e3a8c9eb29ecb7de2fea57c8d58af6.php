 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasStripe" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Stripe Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <!--stripe settings-->
             <input type="hidden" name="payment_method" value="stripe">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="STRIPE_KEY" class="form-label"><?php echo e(localize('Publishable Key')); ?></label>
                 <input type="text" id="STRIPE_KEY" name="types[STRIPE_KEY]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('stripe', 'STRIPE_KEY')); ?>">
             </div>
             <div class="mb-3">
                 <label for="STRIPE_SECRET" class="form-label"><?php echo e(localize('Stripe Secret')); ?></label>
                 <input type="text" id="STRIPE_SECRET" name="types[STRIPE_SECRET]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('stripe', 'STRIPE_SECRET')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Stripe')); ?></label>
                 <select id="enable_stripe" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('stripe')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('stripe')->is_active == '1' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?></option>
                 </select>
             </div>
             <!--stripe settings-->
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                 </button>
             </div>
         </form>
     </div>
 </div>
<?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/stripe.blade.php ENDPATH**/ ?>