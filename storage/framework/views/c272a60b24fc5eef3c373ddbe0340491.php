<aside class="tt-sidebar bg-light-subtle" id="sidebar">
    <style>
        .tt-brand-link {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .tt-brand-content {
            display: flex;
            align-items: center;
        }

        .tt-brand-favicon {
            margin-right: 5px;
        }

        .tt-brand-logo {
            margin-left: 5px;
        }

        .tt-brand-name {
            margin-left: 5px;
        }
    </style>

    <div class="tt-brand">
        

        <a href="<?php echo e(auth()->user()->user_type != 'deliveryman' ? route('admin.dashboard') : route('deliveryman.dashboard')); ?>"
            class="tt-brand-link overflow-x-hidden">
            <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon ms-1" alt="favicon" />
            <?php if(getSetting('admin_panel_logo')): ?>
                <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="tt-brand-logo ms-2"
                    alt="logo" />
            <?php else: ?>
                <span id="appname_part" class="overflow-x-hidden">
                    <h3 class="d-inline-block px-2 m-auto"><?php echo e(env('APP_NAME')); ?></h3>
                </span>
            <?php endif; ?>
        </a>
        <a href="javascript:void(0);" class="tt-toggle-sidebar">
            <span><i data-feather="chevron-left"></i></span>
        </a>


    </div>

    <div class="tt-sidebar-nav pb-9 pt-4" data-simplebar>

        <ul class="tt-side-nav">
            <li class="side-nav-item nav-item tt-sidebar-user">
                <div class="side-nav-link bg-secondary-subtle mx-2 rounded-3 px-2">
                    <div class="tt-user-avatar lh-1">
                        <div class="avatar avatar-md status-online">
                            <img class="rounded-circle" src="<?php echo e(uploadedAsset(auth()->user()->avatar)); ?>"
                                alt="avatar">
                        </div>
                    </div>
                    <div class="tt-nav-link-text ms-2">
                        <h6 class="mb-0 lh-1 tt-line-clamp tt-clamp-1"><?php echo e(auth()->user()->name); ?></h6>
                        <?php if(auth()->user()->user_type != 'deliveryman'): ?>
                            <span
                                class="text-muted fs-sm"><?php echo e(auth()->user()->role ? auth()->user()->role->name : localize('Super Admin')); ?></span>
                        <?php else: ?>
                            <span class="text-muted fs-sm"><?php echo e(localize('Deliveryman')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        </ul>
        <nav class="navbar navbar-vertical navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="w-100" id="leftside-menu-container">
                    <?php if(auth()->user()->user_type != 'deliveryman'): ?>
                        <?php echo $__env->make('backend.inc.sidebarMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('backend.inc.deliverymanSidebarMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</aside>
<?php /**PATH G:\laragon\www\resources\views/backend/inc/leftSidebar.blade.php ENDPATH**/ ?>