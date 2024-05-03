<!--footer section start-->
<footer class="tt-footer bg-light-subtle py-3 mt-auto">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-6 order-last order-md-first">
                <div class="copyright text-center text-md-start">
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center justify-content-md-end">
                    
                    
                    <?php echo e(getSetting('copyright_text') == null ? "Copyright " . getSetting('copyright_text') . env('APP_ALIAS') : getSetting('copyright_text')); ?>                        
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer section end-->
<?php /**PATH G:\laragon\www\resources\views/backend/inc/footer.blade.php ENDPATH**/ ?>