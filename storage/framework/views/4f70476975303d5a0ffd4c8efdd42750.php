 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasDuitku" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Duitku Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <input type="hidden" name="payment_method" value="duitku">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="DUITKU_API_KEY" class="form-label"><?php echo e(localize('Duitku Api Key')); ?></label>
                 <input type="text" id="DUITKU_API_KEY" name="types[DUITKU_API_KEY]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('duitku','DUITKU_API_KEY')); ?>">
             </div>

             <div class="mb-3">
                 <label for="DUITKU_MERCHANT_CODE" class="form-label"><?php echo e(localize('Duitku Merchant Code')); ?></label>
                 <input type="text" id="DUITKU_MERCHANT_CODE" name="types[DUITKU_MERCHANT_CODE]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('duitku','DUITKU_MERCHANT_CODE')); ?>">
             </div>

             <div class="mb-3">
                 <label for="DUITKU_CALLBACK_URL" class="form-label"><?php echo e(localize('Duitku Callback Url')); ?></label>
                 <input type="url" id="DUITKU_CALLBACK_URL" name="types[DUITKU_CALLBACK_URL]" class="form-control"
                     value="<?php echo e(url('/duitku/payment/callback')); ?>" readonly>
             </div>

             <div class="mb-3">
                 <label for="DUITKU_RETURN_URL" class="form-label"><?php echo e(localize('Duitku Return Url')); ?></label>
                 <input type="url" id="DUITKU_RETURN_URL" name="types[DUITKU_RETURN_URL]" class="form-control"
                     value="<?php echo e(url('/duitku/payment/return')); ?>" readonly>
             </div>

             <div class="mb-3">
                 <label for="DUITKU_ENV" class="form-label"><?php echo e(localize('Duitku Env')); ?></label>
                 <input type="text" id="DUITKU_ENV" name="types[DUITKU_ENV]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('duitku','DUITKU_ENV')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Duitku')); ?></label>
                 <select id="enable_duitku" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('duitku')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('duitku')->is_active == '1' ? 'selected' : ''); ?>>
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
<?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/duitku.blade.php ENDPATH**/ ?>