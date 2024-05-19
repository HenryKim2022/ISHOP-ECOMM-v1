 <div class="modal fade addAddressModal" id="addAddressModal">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body">
                 <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>

                 <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                     <h2 class="modal-title fs-5 mb-3"><?php echo e(localize('Add New Address')); ?></h2>
                     <div class="row align-items-center g-4 mt-3">
                         <form action="<?php echo e(route('address.store')); ?>" method="POST">
                             <?php echo csrf_field(); ?>
                             <div class="row g-4">
                                 <div class="col-sm-6">
                                     <div class="w-100 label-input-field">
                                         <label><?php echo e(localize('Country')); ?></label>
                                         <select class="select2Address" name="country_id" required>
                                             <option value=""><?php echo e(localize('Select Country')); ?></option>
                                             <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="w-100 label-input-field">
                                         <label><?php echo e(localize('State')); ?></label>
                                         <select class="select2Address" required name="state_id">
                                             <option value=""><?php echo e(localize('Select State')); ?></option>

                                         </select>
                                     </div>
                                 </div>

                                 <div class="col-sm-6">
                                     <div class="w-100 label-input-field">
                                         <label><?php echo e(localize('City')); ?></label>
                                         <select class="select2Address" required name="city_id">
                                             <option value=""><?php echo e(localize('Select City')); ?></option>

                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="w-100 label-input-field">
                                         <label><?php echo e(localize('Default Address?')); ?></label>
                                         <select class="select2Address" name="is_default">
                                             <option value="0"><?php echo e(localize('No')); ?></option>
                                             <option value="1"><?php echo e(localize('Set Default')); ?></option>
                                         </select>
                                     </div>
                                 </div>

                                 <div class="col-sm-12">
                                     <div class="label-input-field">
                                         <label><?php echo e(localize('Address')); ?></label>
                                         <textarea rows="4" placeholder="<?php echo e(localize('2/5 Elephant Road, New Town')); ?>" name="address" required></textarea>
                                     </div>
                                 </div>

                             </div>
                             <div class="mt-6 d-flex">
                                 <button type="submit"
                                     class="btn btn-secondary btn-md me-3"><?php echo e(localize('Save')); ?></button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade editAddressModal" id="editAddressModal">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body">
                 <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                     <h2 class="modal-title fs-5 mb-3"><?php echo e(localize('Update Address')); ?></h2>

                     <div class="spinner pt-6 pb-8 d-none">
                         <div class="row align-items-center g-4 mt-3">
                             <div class="d-flex justify-content-center">
                                 <div class="spinner-border" role="status">
                                     <span class="visually-hidden">Loading...</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="edit-address d-none">

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade deleteAddressModal" id="deleteAddressModal">
     <div class="modal-dialog address-delete-modal modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body">
                 <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="bg-white rounded-3 py-6 px-4">
                     <h2 class="modal-title fs-5 mb-3"><?php echo e(localize('Delete Address')); ?></h2>
                     <div class="pt-6 pb-8 text-center">
                         <h6><?php echo e(localize('Want to delete this address?')); ?></h6>
                     </div>
                     <div class="text-center">
                         <a href="" class="btn btn-secondary delete-address-link"><?php echo e(localize('Delete')); ?></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <?php $__env->startSection('scripts'); ?>
     <script>
         "use strict";

         var parent = '.addAddressModal';

         // runs when the document is ready --> for media files
         $(document).ready(function() {
             if ($("input[name='shipping_address_id']").is(':checked')) {
                 let city_id = $("input[name='shipping_address_id']:checked").data('city_id');
                 getLogistics(city_id);
             }
         });


         //  new address
         function addNewAddress() {
             $('#addAddressModal').modal('show');
             parent = '.addAddressModal';
             addressModalSelect2(parent);
         }

         //  edit address
         function editAddress(addressId) {
             $('#editAddressModal').modal('show');
             $('.spinner').removeClass('d-none');
             $('.edit-address').addClass('d-none');

             parent = '.editAddressModal';
             getAddress(addressId);
         }

         //  delete address
         function deleteAddress(thisAnchorTag) {
             $('#deleteAddressModal').modal('show');
             $('.delete-address-link').prop('href', $(thisAnchorTag).data('url'));
         }

         //  get states on country change
         $(document).on('change', '[name=country_id]', function() {
             var country_id = $(this).val();
             getStates(country_id);
         });

         //  get states
         function getStates(country_id) {
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                 },
                 url: "<?php echo e(route('address.getStates')); ?>",
                 type: 'POST',
                 data: {
                     country_id: country_id
                 },
                 success: function(response) {
                     $('[name="state_id"]').html("");
                     $('[name="state_id"]').html(JSON.parse(response));
                     addressModalSelect2(parent);
                 }
             });
         }

         //  get cities on state change
         $(document).on('change', '[name=state_id]', function() {
             var state_id = $(this).val();
             getCities(state_id);
         });

         //  get cities
         function getCities(state_id) {
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                 },
                 url: "<?php echo e(route('address.getCities')); ?>",
                 type: 'POST',
                 data: {
                     state_id: state_id
                 },
                 success: function(response) {
                     $('[name="city_id"]').html("");
                     $('[name="city_id"]').html(JSON.parse(response));
                     addressModalSelect2(parent);
                 }
             });
         }

         //  get edit address
         function getAddress(addressId) {
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                 },
                 url: "<?php echo e(route('address.edit')); ?>",
                 type: 'POST',
                 data: {
                     addressId: addressId
                 },
                 success: function(response) {
                     $('.spinner').addClass('d-none');
                     $('.edit-address').html(response);
                     $('.edit-address').removeClass('d-none');
                     addressModalSelect2(parent);
                 }
             });
         }
     </script>
 <?php $__env->stopSection(); ?>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/inc/addressForm.blade.php ENDPATH**/ ?>