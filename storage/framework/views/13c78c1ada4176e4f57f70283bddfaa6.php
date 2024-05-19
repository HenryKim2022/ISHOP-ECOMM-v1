 <?php if(paymentGateway('yookassa')): ?>
 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasYookassa" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title"><?php echo e(localize('Yookassa Configuration')); ?></h5>
         <span class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center" data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="<?php echo e(route('payment-gateway-setting.store')); ?>" method="POST" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <input type="hidden" name="payment_method" value="yookassa">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="YOOKASSA_SHOP_ID" class="form-label"><?php echo e(localize('Yookassa Shop ID')); ?></label>       
                 <input type="text" id="YOOKASSA_SHOP_ID" name="types[YOOKASSA_SHOP_ID]" class="form-control" value="<?php echo e(paymentGatewayValue('yookassa', 'YOOKASSA_SHOP_ID')); ?>">
             </div>
             <div class="mb-3">
                 <label for="YOOKASSA_SECRET_KEY" class="form-label"><?php echo e(localize('Yookassa Secret Key')); ?></label>
                 <input type="text" id="YOOKASSA_SECRET_KEY" name="types[YOOKASSA_SECRET_KEY]" class="form-control" value="<?php echo e(paymentGatewayValue('yookassa', 'YOOKASSA_SECRET_KEY')); ?>">
             </div>

             <div class="mb-3">
                 <label for="YOOKASSA_CURRENCY_CODE" class="form-label"><?php echo e(localize('YOOKASSA Currency Code')); ?></label>      
                 <input type="text" id="YOOKASSA_CURRENCY_CODE" name="types[YOOKASSA_CURRENCY_CODE]" class="form-control" value="<?php echo e(paymentGatewayValue('yookassa', 'YOOKASSA_CURRENCY_CODE')); ?>">
             </div>

             <div class="mb-3">
                 <label class="form-label"><?php echo e(localize('Enable Yookassa')); ?></label>
                 <select id="enable_yookassa" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" <?php echo e(paymentGateway('yookassa')->is_active == '0' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Disable')); ?>

                     </option>
                     <option value="1" <?php echo e(paymentGateway('yookassa')->is_active == '1' ? 'selected' : ''); ?>>
                         <?php echo e(localize('Enable')); ?>

                     </option>
                 </select>
             </div>
             <div class="mb-3">
                 <div class="form-check form-switch">
                     <label for="is_active" class="form-label ms-2"><?php echo e(localize('Reciept ?')); ?> <span class="text-danger ms-1"> </span></label>         
                     <input type="checkbox" class="form-check-input" id="yookassa_reciept_active" name="types[YOOKASSA_RECIEPT]"
                      <?php if(paymentGatewayValue('yookassa', 'YOOKASSA_RECIEPT') == 'on'): ?> checked <?php endif; ?>>
                 </div>
             </div>
             <div class="reciept <?php echo e(paymentGatewayValue('yookassa', 'YOOKASSA_RECIEPT') == 'on' ? '' : 'd-none'); ?>" id="reciept_yookassa">
                 <?php
                    $vatLists = [
                    '1'=> 'VAT not included',
                    '2'=> '0% VAT rate',
                    '3'=> '10% VAT rate',
                    '4'=> '20% receipt’s VAT rate',
                    '5'=> '10/110 receipt’s estimate VAT rate',
                    '6'=> '20/120 receipt’s estimate VAT rate',
                    ]
                 ?>
                 <div class="mb-3">
                     <label class="form-label"><?php echo e(localize('VAT rates Yookassa')); ?></label> 
              
                     <select id="yookassa_vat" class="form-control select2" name="types[YOOKASSA_VAT]" data-toggle="select2">
                         <?php $__currentLoopData = $vatLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($key); ?>" <?php echo e(paymentGatewayValue('yookassa', 'YOOKASSA_VAT') == $key ? 'selected' : (2 == $key ? 'selected' : '')); ?>>
                             <?php echo e(localize($vat)); ?>

                         </option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                 </div>

             </div>
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                 </button>
             </div>
         </form>
     </div>
 </div>
 <?php $__env->startSection('scripts'); ?>
 <script>
    $(document).on('change', '#yookassa_reciept_active', function(){
        let status = $(this).is(':checked') ? true : false;
        if(status == true) {
            $('#reciept_yookassa').removeClass('d-none');
        }else{
            $('#reciept_yookassa').addClass('d-none');
        }
    })
 </script>
 <?php $__env->stopSection(); ?>
 <?php endif; ?><?php /**PATH G:\laragon\www\Modules/PaymentGateway\Resources/views/settings/paymentForm/yookassa.blade.php ENDPATH**/ ?>