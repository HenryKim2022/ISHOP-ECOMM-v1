 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasPaypal" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Paypal Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">            
             <?php echo csrf_field(); ?>
             <input type="hidden" value="1" name="is_virtual">
             <!--paypal settings-->
             <input type="hidden" name="payment_method" value="paypal">
             <div class="mb-3">
                 <label for="PAYPAL_CLIENT_ID" class="form-label"><?php echo e(localize('Paypal Client ID')); ?></label>
                 <input type="text" id="PAYPAL_CLIENT_ID" name="types[PAYPAL_CLIENT_ID]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('paypal', 'PAYPAL_CLIENT_ID')); ?>">
             </div>
             <div class="mb-3">
                 <label for="PAYPAL_CLIENT_SECRET" class="form-label"><?php echo e(localize('Paypal Client Secret')); ?></label>
                 <input type="text" id="PAYPAL_CLIENT_SECRET" name="types[PAYPAL_CLIENT_SECRET]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('paypal','PAYPAL_CLIENT_SECRET')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Paypal')); ?></label>
                 <select id="enable_paypal" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('paypal')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('paypal')->is_active == '1' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?></option>
                 </select>
             </div>


             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Gateway')); ?> <span><small>Sandbox/Live</small></span></label>
                 <select id="paypal_type" class="form-control select2" name="payment_type" data-toggle="select2">
                     <option value="sandbox" <?php echo e(paymentGateway('paypal')->type == 'sandbox' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Sandbox')); ?></option>
                     <option value="live" <?php echo e(paymentGateway('paypal')->type == 'live' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Live')); ?></option>
                 </select>
             </div>
             
             <!--paypal settings-->
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                 </button>
             </div>
         </form>
     </div>
 </div>
<?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/paypal.blade.php ENDPATH**/ ?>