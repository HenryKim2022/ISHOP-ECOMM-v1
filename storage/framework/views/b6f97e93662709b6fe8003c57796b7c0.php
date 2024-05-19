<?php if(paymentGateway('paystack')): ?> 
 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasPaystack" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Paystack Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <input type="hidden" name="payment_method" value="paystack">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="PAYSTACK_PUBLIC_KEY" class="form-label"><?php echo e(localize('Paystack Public Key')); ?></label>
                 <input type="text" id="PAYSTACK_PUBLIC_KEY" name="types[PAYSTACK_PUBLIC_KEY]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('paystack', 'PAYSTACK_PUBLIC_KEY')); ?>">
             </div>

             <div class="mb-3">
                 <label for="PAYSTACK_SECRET_KEY" class="form-label"><?php echo e(localize('Secret Key')); ?></label>
                 <input type="text" id="PAYSTACK_SECRET_KEY" name="types[PAYSTACK_SECRET_KEY]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('paystack', 'PAYSTACK_SECRET_KEY')); ?>">
             </div>

             <div class="mb-3">
                 <label for="MERCHANT_EMAIL" class="form-label"><?php echo e(localize('Merchant Email')); ?></label>
                 <input type="text" id="MERCHANT_EMAIL" name="types[MERCHANT_EMAIL]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('paystack', 'MERCHANT_EMAIL')); ?>">
             </div>

             <div class="mb-3">
                 <label for="" class="form-label"><?php echo e(localize('Paystack Callback')); ?></label>
                 <input type="text" id="" name="" class="form-control" disabled
                     value="<?php echo e(route('paystack.callback')); ?>">
             </div>

             <div class="mb-3">
                 <label for="PAYSTACK_CURRENCY_CODE"
                     class="form-label"><?php echo e(localize('Paystack Currency Code')); ?></label>
                 <input type="text" id="PAYSTACK_CURRENCY_CODE" name="types[PAYSTACK_CURRENCY_CODE]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('paystack', 'PAYSTACK_CURRENCY_CODE')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Paystack')); ?></label>
                 <select id="enable_paystack" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('paystack')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('paystack')->is_active == '1' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?></option>
                 </select>
             </div>
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                 </button>
             </div>
         </form>
     </div>
 </div>
<?php endif; ?><?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/paystack.blade.php ENDPATH**/ ?>