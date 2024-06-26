<?php $__env->startSection('contents'); ?>
    <section class="section-404 ptb-120 position-relative overflow-hidden z-1">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="content-404 text-center">
                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/500.png')); ?>" alt="not found"
                            class="img-fluid mb-5 d-none d-md-inline-block w-50">
                        <h3 class="fw-bold display-1 mb-0">500</h3>
                        <h2 class="mt-3">Sorry, Internal Server Error</h2>
                        <p class="mb-6">The page you are looking for might have been removed had its name changed or is
                            temporarily unavailable.</p>
                        <a href="<?php echo e(env('APP_URL')); ?>" class="btn btn-secondary btn-md rounded-1">Back to Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/errors/500.blade.php ENDPATH**/ ?>