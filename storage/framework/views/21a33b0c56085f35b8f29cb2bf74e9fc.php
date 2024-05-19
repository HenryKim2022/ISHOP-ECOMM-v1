<?php if(paymentGateway('mercadopago')): ?>

<!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasMercadopago" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Mercadopago Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <!--Mercadopago settings-->
             <input type="hidden" name="payment_method" value="mercadopago">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="MERCADOPAGO_SECRET_KEY" class="form-label"><?php echo e(localize('Mercadopago Secret Key')); ?></label>
                 <input type="text" id="MERCADOPAGO_SECRET_KEY" name="types[MERCADOPAGO_SECRET_KEY]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('mercadopago', 'MERCADOPAGO_SECRET_KEY')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Mercadopago')); ?></label>
                 <select id="is_active" class="form-control select2" name="is_active"
                     data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('mercadopago')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('mercadopago')->is_active == '1' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?></option>
                 </select>
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Test Sandbox Mode')); ?></label>
                 <select id="mercadopago_sandbox" class="form-control select2" name="mercadopago_sandbox"
                     data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('mercadopago')->sandbox == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('mercadopago')->sandbox == '1' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?></option>
                 </select>
             </div>
             <!--Mercadopago settings-->
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                 </button>
             </div>
         </form>
     </div>
 </div>
<?php endif; ?><?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/mercadopago.blade.php ENDPATH**/ ?>