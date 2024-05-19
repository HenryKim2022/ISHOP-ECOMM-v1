 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasOffline_payment" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Offline Payment Configuration')); ?></h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <!--Midtrans settings-->
             <input type="hidden" name="payment_method" value="Offline_payment">
             <input type="hidden" value="0" name="is_virtual">
             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Offline')); ?></label>
                 <select id="is_active" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0"  <?php echo e(paymentGateway('Offline_payment')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?></option>
                     <option value="1"  <?php echo e(paymentGateway('Offline_payment')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?></option>
                 </select>
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Image')); ?></label>
                 <input type="hidden" name="types[]" value="offline_image">

                 <div class="tt-image-drop rounded">
                     <span class="fw-semibold"><?php echo e(localize('Choose Image')); ?></span>
                     <!-- choose media -->
                     <div class="tt-product-thumb show-selected-files mt-3">
                        
                         <div class="avatar avatar-xl cursor-pointer choose-media" data-bs-toggle="offcanvas"
                             data-bs-target="#offcanvasBottom" onclick="showMediaManager(this)" data-selection="single">
                             <input type="hidden" name="offline_image" value="<?php echo e(getSetting('offline_image')); ?>">
                             <div class="no-avatar rounded-circle">
                                 <span><i data-feather="plus"></i></span>
                             </div>
                         </div>
                     </div>
                     <!-- choose media -->
                 </div>

             </div>
             <!--midtrans settings-->
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                 </button>
             </div>
         </form>
     </div>
 </div>
<?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/offline.blade.php ENDPATH**/ ?>