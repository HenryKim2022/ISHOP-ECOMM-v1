
<header class="tt-top-fixed bg-light-subtle">
    <div class="container-fluid">
        <nav class="navbar navbar-top navbar-expand" id="navbarDefault">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="tt-mobile-toggle-brand d-lg-none d-md-none">
                    <a class="tt-toggle-sidebar pe-3" href="#offcanvasLeft" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasLeft">
                        <i data-feather="menu"></i>
                    </a>
                    <div class="tt-brand pe-3">
                        

                        <a href="<?php echo e(auth()->user()->user_type != 'deliveryman' ? route('admin.dashboard') : route('deliveryman.dashboard')); ?>"
                            class="tt-brand-link">
                            <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon ms-1" alt="favicon" />
                            <?php if(getSetting('admin_panel_logo') != ''): ?>
                                <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="tt-brand-logo ms-2" alt="logo" />
                            <?php else: ?>
                                <h4 class="d-inline-block px-2 bg-white m-auto"><?php echo e(env('APP_NAME')); ?></h4>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>

                <?php if(Route::is('admin.pos.index')): ?>
                    <div class="align-items-center d-none d-lg-flex">
                        <a class="pe-3" href="<?php echo e(route('admin.dashboard')); ?>" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Go to Dashboard">
                            <i data-feather="pie-chart"></i>
                        </a>
                        <div class="tt-brand pe-3">
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon"
                                    alt="favicon" />
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="tt-search-box d-none d-md-block d-lg-block flex-grow-1 me-4">
                   
                        <div class="input-group">
                            <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                    data-feather="search"></i></span>
                            <input class="form-control rounded-start w-100 border-0 bg-transparent searchNav" type="text" name="search">
                            <ul class="search-item">

                            </ul>
                        </div>
                    
                </div>
                <ul class="navbar-nav flex-row align-items-center tt-top-navbar">

                    <li class="nav-item">
                        <a href="<?php echo e(route('home')); ?>" class="nav-link tt-visit-store" target="_blank">
                            <i data-feather="globe" class="me-2"></i>
                            <?php echo e(localize('Visit Store')); ?>

                        </a>
                    </li>



                    <li class="nav-item dropdown">
                        <?php
                            if (Session::has('locale')) {
                                $locale = Session::get('locale', Config::get('app.locale'));
                            } else {
                                $locale = env('DEFAULT_LANGUAGE');
                            }
                            $currentLanguage = \App\Models\Language::where('code', $locale)->first();
                            
                            if (is_null($currentLanguage)) {
                                $currentLanguage = \App\Models\Language::where('code', 'en')->first();
                            }
                        ?>

                    <li class="nav-item dropdown tt-curency-lang-dropdown d-none d-md-block">
                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="<?php echo e(staticAsset('backend/assets/img/flags/' . $currentLanguage->flag . '.png')); ?>"
                                alt="country" class="img-fluid me-1"> <?php echo e($currentLanguage->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end py-0 shadow border-0">
                            <?php $__currentLoopData = \App\Models\Language::where('is_active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- item-->
                                <li>
                                    <a href="javascript:void(0);"
                                        class="dropdown-item <?php if($currentLanguage->code == $language->code): ?> active <?php endif; ?>"
                                        onclick="changeLocaleLanguage(this)" data-flag="<?php echo e($language->code); ?>">
                                        <img src="<?php echo e(staticAsset('backend/assets/img/flags/' . $language->flag . '.png')); ?>"
                                            alt="<?php echo e($language->code); ?>" class="img-fluid me-1"> <span
                                            class="align-middle"><?php echo e($language->name); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>


                    <?php
                        if (Session::has('currency_code')) {
                            $currency_code = Session::get('currency_code', Config::get('app.currency_code'));
                        } else {
                            $currency_code = env('DEFAULT_CURRENCY');
                        }
                        
                        $currentCurrency = \App\Models\Currency::where('code', $currency_code)->first();
                        
                        if (is_null($currentCurrency)) {
                            $currentCurrency = \App\Models\Currency::where('code', 'usd')->first();
                        }
                    ?>

                    <li class="nav-item dropdown tt-curency-lang-dropdown d-none d-md-block">
                        <a href="#" class="nav-link text-uppercase" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><?php echo e($currentCurrency->symbol); ?> <?php echo e($currentCurrency->code); ?></a>
                        <ul class="dropdown-menu dropdown-menu-end py-0 shadow border-0">

                            <?php $__currentLoopData = \App\Models\Currency::where('is_active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a class="dropdown-item fs-xs text-uppercase" href="javascript:void(0);"
                                        onclick="changeLocaleCurrency(this)" data-currency="<?php echo e($currency->code); ?>">
                                        <?php echo e($currency->symbol); ?> <?php echo e($currency->code); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link tt-theme-toggle">
                            <div class="tt-theme-light"><i data-feather="moon" class="fs-xm"></i></div>
                            <div class="tt-theme-dark"><i data-feather="sun" class="fs-xm"></i></div>
                        </a>
                    </li>

                    <li>
                        <?php if (isset($component)) { $__componentOriginal6ec5a5798a0bca799926efb8195d54a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ec5a5798a0bca799926efb8195d54a9 = $attributes; } ?>
<?php $component = App\View\Components\NotificationComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notification-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\NotificationComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ec5a5798a0bca799926efb8195d54a9)): ?>
<?php $attributes = $__attributesOriginal6ec5a5798a0bca799926efb8195d54a9; ?>
<?php unset($__attributesOriginal6ec5a5798a0bca799926efb8195d54a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ec5a5798a0bca799926efb8195d54a9)): ?>
<?php $component = $__componentOriginal6ec5a5798a0bca799926efb8195d54a9; ?>
<?php unset($__componentOriginal6ec5a5798a0bca799926efb8195d54a9); ?>
<?php endif; ?>
                    </li>

                    <li class="nav-item dropdown tt-user-dropdown">
                        <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="true">
                            <div class="avatar avatar-sm status-online">
                                <img class="rounded-circle" src="<?php echo e(uploadedAsset(auth()->user()->avatar)); ?>"
                                    alt="avatar">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0 shadow-sm border-0"
                            aria-labelledby="navbarDropdownUser">
                            <div class="card position-relative border-0">
                                <div class="card-body py-2">
                                    <ul class="tt-user-nav list-unstyled d-flex flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link px-0"
                                                href="<?php echo e(auth()->user()->user_type == 'deliveryman' ? route('deliveryman.profile') : route('admin.profile')); ?>">
                                                <i data-feather="user" class="me-1 fs-sm"></i>
                                                <?php echo e(localize('My Account')); ?>

                                            </a>
                                        </li>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general_settings')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link px-0" href="<?php echo e(route('admin.generalSettings')); ?>">
                                                    <i data-feather="settings" class="me-1 fs-sm"></i>
                                                    <?php echo e(localize('Settings')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li class="nav-item">
                                            <a class="nav-link px-0" href="<?php echo e(route('logout')); ?>">
                                                <i data-feather="log-out"
                                                    class="me-1 fs-sm"></i><?php echo e(localize('Sign out')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!--mobile offcanvas menu start-->
<div class="offcanvas offcanvas-start tt-aside-navbar" id="offcanvasLeft" tabindex="-1">
    <div class="offcanvas-header border-bottom">
        <div class="tt-brand">
            <a href="index.html" class="tt-brand-link">
                <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon ms-1"
                    alt="favicon" />

                <?php if((getSetting('admin_panel_logo'))): ?>
                    <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="tt-brand-logo ms-2"
                        alt="logo" />
                <?php endif; ?>
            </a>
        </div>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-2 pb-9" data-simplebar>
        <div class="tt-sidebar-nav">
            <nav class="navbar navbar-vertical">
                <div class="w-100">
                    <?php echo $__env->make('backend.inc.sidebarMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--mobile offcanvas menu end-->
<?php /**PATH G:\laragon\www\resources\views/backend/inc/navbar.blade.php ENDPATH**/ ?>