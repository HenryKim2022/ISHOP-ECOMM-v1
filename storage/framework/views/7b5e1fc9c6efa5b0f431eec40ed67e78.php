<?php if(paymentGateway('molile')): ?>
<!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasMolile" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Molile Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <input type="hidden" name="payment_method" value="molile">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="MOLILE_API_KEY" class="form-label"><?php echo e(localize('Molile API Key')); ?></label>
                 <input type="text" id="MOLILE_API_KEY" name="types[MOLILE_API_KEY]" class="form-control"
                     value="<?php echo e(paymentGatewayValue('molile', 'MOLILE_API_KEY')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Molile')); ?></label>
                 <select id="enable_molile" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('molile')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1" <?php echo e(paymentGateway('molile')->is_active == '1' ? 'selected' : ''); ?>>
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
<?php endif; ?><?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/molile.blade.php ENDPATH**/ ?>