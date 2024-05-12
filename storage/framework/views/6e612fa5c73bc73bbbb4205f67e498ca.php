<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Add Product')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Add Product')); ?></h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" class="pb-650" id="product-form">
                        <?php echo csrf_field(); ?>
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Basic Information')); ?></h5>

                                <div class="mb-4">
                                    <label for="category_id" class="form-label"><?php echo e(localize('Themes')); ?> <span
                                            class="text-danger">*</span> </label>
                                    <select class="form-control select2 themeChange" name="theme_ids[]"
                                        data-placeholder="<?php echo e(localize('Select themes')); ?>" data-toggle="select2" multiple
                                        required>
                                        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($theme->id); ?>" <?php echo e(in_array($theme->id, active_themes_array()) ? 'selected':''); ?>>
                                                <?php echo e($theme->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="mb-4">
                                    <label for="name" class="form-label"><?php echo e(localize('Product Name')); ?></label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="<?php echo e(localize('Type your product name')); ?>" name="name" required>
                                    <span class="fs-sm text-muted">
                                        <?php echo e(localize('Product name is required and recommended to be unique.')); ?>

                                    </span>
                                </div>
                                <div class="mb-4">
                                    <label for="short_description"
                                        class="form-label"><?php echo e(localize('Short Description')); ?></label>
                                    <textarea class="form-control" id="short_description"
                                        placeholder="<?php echo e(localize('Type your product short description')); ?>" rows="5" name="short_description"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="form-label"><?php echo e(localize('Description')); ?></label>
                                    <textarea id="description" class="editor" name="description"></textarea>
                                </div>

                            </div>
                        </div>
                        <!--basic information end-->

                        <!--product image and gallery start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Images')); ?></h5>
                                <div class="mb-4">
                                    <label class="form-label"><?php echo e(localize('Thumbnail')); ?> (592x592)</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Product Thumbnail')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="image">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"><?php echo e(localize('Gallery')); ?></label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Gallery Images')); ?></span>

                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="multiple">
                                                <input type="hidden" name="images">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product image and gallery end-->


                        <div class="mb-4 card">
                            <div class="card-body">
                                <label for="name" class="form-label"><?php echo e(localize('Product Youtube Vedio Embeded Code')); ?></label>
                                <input class="form-control" type="text" id="vedio_link" name="vedio_link">
                            </div>
                           
                        </div>



                        <!--product category start-->
                        <div class="card mb-4" id="section-3">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Product Categories')); ?> <span
                                    class="text-danger">*</span></h5>
                                <div class="mb-4">
                                    <select class="select2 form-control" multiple="multiple"
                                        data-placeholder="<?php echo e(localize('Select categories')); ?>" name="category_ids[]"
                                        required id="appendCategory">
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--product category end-->

                        <!--product tags start-->
                        <div class="card mb-4" id="section-tags">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Product Tags')); ?></h5>
                                <div class="mb-4">
                                    <select class="form-control select2" name="tag_ids[]" data-toggle="select2" multiple
                                        data-placeholder="<?php echo e(localize('Select tags..')); ?>">
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tag->id); ?>">
                                                <?php echo e($tag->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--product tags end-->

                        <!--product brand and unit start-->
                        <div class="row" id="section-4">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4"><?php echo e(localize('Product Brand')); ?></h5>
                                        <div class="tt-select-brand">
                                            <select class="select2 form-control" id="selectBrand" name="brand_id">
                                                <option value=""><?php echo e(localize('Select Brand')); ?></option>
                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($brand->id); ?>">
                                                        <?php echo e($brand->collectLocalization('name')); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4"><?php echo e(localize('Product Unit')); ?></h5>
                                        <div class="tt-select-brand">
                                            <select class="select2 form-control" id="selectUnit" name="unit_id">
                                                <option value=""><?php echo e(localize('Select Unit')); ?></option>
                                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($unit->id); ?>">
                                                        <?php echo e($unit->collectLocalization('name')); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product brand and unit end-->

                        <!--product price sku and stock start-->
                        <div class="card mb-4" id="section-5">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4"><?php echo e(localize('Price, Sku & Stock')); ?></h5>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label fw-medium text-primary"
                                            for="is_variant"><?php echo e(localize('Has Variations?')); ?></label>
                                        <input type="checkbox" class="form-check-input" id="is_variant"
                                            onchange="isVariantProduct(this)" name="is_variant">
                                    </div>
                                </div>

                                <!-- without variation start-->
                                <div class="noVariation">
                                    <div class="row g-3">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="price" class="form-label"><?php echo e(localize('Price')); ?> <span
                                                    class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.0001" id="price"
                                                    name="price" placeholder="<?php echo e(localize('Product price')); ?>"
                                                    class="form-control" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="stock" class="form-label"><?php echo e(localize('Stock')); ?> <span
                                                    class="text-danger">*</span><small
                                                        class="text-warning">(<?php echo e(localize('Default Location')); ?>)</small></label>
                                                <input type="number" id="stock"
                                                    placeholder="<?php echo e(localize('Stock qty')); ?>" name="stock"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="sku" class="form-label"><?php echo e(localize('SKU')); ?> <span
                                                    class="text-danger">*</span></label>
                                                <input type="text" id="sku"
                                                    placeholder="<?php echo e(localize('Product sku')); ?>" name="sku"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="code" class="form-label"><?php echo e(localize('Code')); ?> <span
                                                    class="text-danger">*</span></label>
                                                <input type="text" id="code"
                                                    placeholder="<?php echo e(localize('Product code')); ?>" name="code"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- without variation start end-->


                                <!--for variation row start-->
                                <div class="hasVariation" style="display: none">
                                    <?php
                                        $sizes = \App\Models\VariationValue::isActive()
                                            ->where('variation_id', 1)
                                            ->get();
                                        
                                        $colors = \App\Models\VariationValue::isActive()
                                            ->where('variation_id', 2)
                                            ->get();
                                    ?>

                                    <div class="row g-3">
                                        <!-- size -->
                                        <?php if(count($sizes) > 0): ?>
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label for="product-thumb"
                                                        class="form-label"><?php echo e(localize('Sizes')); ?></label>
                                                    <input type="hidden" name="chosen_variations[]" value="1">
                                                    <select class="select2 form-control" multiple="multiple"
                                                        data-placeholder="<?php echo e(localize('Select Sizes')); ?>"
                                                        onchange="generateVariationCombinations()"
                                                        name="option_1_choices[]">
                                                        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($size->id); ?>">
                                                                <?php echo e($size->collectLocalization('name')); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <!-- size end -->

                                        <!-- colors -->
                                        <?php if(count($colors) > 0): ?>
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label for="product-thumb"
                                                        class="form-label"><?php echo e(localize('Colors')); ?></label>
                                                    <input type="hidden" name="chosen_variations[]" value="2">
                                                    <select class="select2 form-control" multiple="multiple"
                                                        data-placeholder="<?php echo e(localize('Select colors')); ?>"
                                                        onchange="generateVariationCombinations()"
                                                        name="option_2_choices[]">
                                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($color->id); ?>">
                                                                <?php echo e($color->collectLocalization('name')); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <!-- colors end -->
                                    </div>

                                    <?php if(count($variations) > 0): ?>
                                        <div class="row g-3 mt-1">
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label class="form-label"><?php echo e(localize('Select Variations')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label class="form-label"><?php echo e(localize('Select Values')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chosen_variation_options">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <div class="mb-0">
                                                        <select class="form-select select2"
                                                            onchange="getVariationValues(this)"
                                                            name="chosen_variations[]">
                                                            <option value=""><?php echo e(localize('Select a Variation')); ?>

                                                            </option>
                                                            <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($variation->id); ?>">
                                                                    <?php echo e($variation->collectLocalization('name')); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-0">
                                                        <div class="variationvalues">
                                                            <input type="text" class="form-control"
                                                                placeholder="<?php echo e(localize('Select variation values')); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <button class="btn btn-link px-0 fw-medium fs-base" type="button"
                                                        onclick="addAnotherVariation()">
                                                        <i data-feather="plus" class="me-1"></i>
                                                        <?php echo e(localize('Add Another Variation')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="variation_combination" id="variation_combination">
                                        
                                    </div>

                                    <!-- size guide -->
                                    <div class="mt-3">
                                        <label class="form-label"><?php echo e(localize('Product Size Guide')); ?></label>
                                        <div class="tt-image-drop rounded">
                                            <span class="fw-semibold"><?php echo e(localize('Choose Size Guide Image')); ?></span>
                                            <!-- choose media -->
                                            <div class="tt-product-thumb show-selected-files mt-3">
                                                <div class="avatar avatar-xl cursor-pointer choose-media"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                    onclick="showMediaManager(this)" data-selection="single">
                                                    <input type="hidden" name="size_guide">
                                                    <div class="no-avatar rounded-circle">
                                                        <span><i data-feather="plus"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- choose media -->
                                        </div>
                                    </div>
                                    <!-- size guide end -->
                                </div>
                            </div>
                            <!--for variation row end-->
                        </div>
                        <!--product price sku and stock end-->

                        <!--product discount start-->
                        <div class="card mb-4" id="section-6">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Product Discount')); ?></h5>

                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e(localize('Date Range')); ?></label>
                                            <div class="input-group">
                                                <input class="form-control date-range-picker date-range" type="text"
                                                    placeholder="<?php echo e(localize('Start date - End date')); ?>"
                                                    name="date_range">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="discount_value"
                                                class="form-label"><?php echo e(localize('Discount Amount')); ?></label>
                                            <input class="form-control" type="number"
                                                placeholder="<?php echo e(localize('Type discount amount')); ?>" id="discount_value"
                                                value="0" step="0.001" name="discount_value">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="discount_type"
                                                class="form-label"><?php echo e(localize('Percent or Fixed')); ?></label>
                                            <select class="select2 form-control" id="discount_type" name="discount_type">
                                                <option value="percent"><?php echo e(localize('Percent %')); ?></option>
                                                <option value="flat"><?php echo e(localize('Fixed')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product discount end-->

                        <!--shipping configuration start-->
                        <div class="card mb-4" id="section-7">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Shipping Configuration')); ?></h5>

                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="mb-0">
                                            <label for="min_purchase_qty"
                                                class="form-label"><?php echo e(localize('Minimum Purchase Qty')); ?></label>
                                            <input type="number" id="min_purchase_qty" name="min_purchase_qty"
                                                min="1" value="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-0">
                                            <label for="max_purchase_qty"
                                                class="form-label"><?php echo e(localize('Maximum Purchase Qty')); ?></label>
                                            <input type="number" id="max_purchase_qty" name="max_purchase_qty"
                                                min="1" value="10" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="mb-0">
                                            <label for="standard_delivery_hours"
                                                class="form-label"><?php echo e(localize('Standard Delivery Time')); ?></label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control"
                                                    name="standard_delivery_hours" value="72" min="0" required
                                                    id="standard_delivery_hours">
                                                <div class="input-group-append"><span
                                                        class="input-group-text">hr(s)</span></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="mb-0">
                                            <label for="express_delivery_hours"
                                                class="form-label"><?php echo e(localize('Express Delivery Time')); ?></label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control"
                                                    name="express_delivery_hours" value="24" min="0" required
                                                    id="express_delivery_hours">
                                                <div class="input-group-append"><span
                                                        class="input-group-text">hr(s)</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--shipping configuration end-->

                        <!--product tax start-->
                        <div class="card mb-4" id="section-8">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Product Taxes')); ?> (<?php echo e(localize('Default 0%')); ?>)</h5>
                                <div class="row g-3">
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label class="form-label"><?php echo e($tax->name); ?></label>
                                                <input type="hidden" value="<?php echo e($tax->id); ?>" name="tax_ids[]">
                                                <input type="number" lang="en" min="0" value="0"
                                                    step="0.01" placeholder="<?php echo e(localize('Tax')); ?>" name="taxes[]"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label class="form-label"><?php echo e(localize('Percent or Fixed')); ?></label>
                                                <select class="select2 form-control" name="tax_types[]">
                                                    <option value="percent"><?php echo e(localize('Percent')); ?> % </option>
                                                    <option value="flat"><?php echo e(localize('Fiexed')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <!--product tax end-->

                        <!--product sell target & status start-->
                        <div class="row g-3" id="section-9">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4"><?php echo e(localize('Sell Target')); ?></h5>
                                        <div class="tt-select-brand">
                                            <input type="number" min="0" name="sell_target" class="form-control"
                                                placeholder="<?php echo e(localize('Type your sell target')); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4"><?php echo e(localize('Product Status')); ?></h5>
                                        <div class="tt-select-brand">
                                            <select class="select2 form-control" id="is_published" name="is_published">
                                                <option value="1"><?php echo e(localize('Published')); ?></option>
                                                <option value="0"><?php echo e(localize('Unpublished')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product sell target & status end-->

                        <!--seo meta description start-->
                        <div class="card mb-4" id="section-10">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('SEO Meta Configuration')); ?></h5>

                                <div class="mb-4">
                                    <label for="meta_title" class="form-label"><?php echo e(localize('Meta Title')); ?></label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        placeholder="<?php echo e(localize('Type meta title')); ?>" class="form-control">
                                    <span class="fs-sm text-muted">
                                        <?php echo e(localize('Set a meta tag title. Recommended to be simple and unique.')); ?>

                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_description"
                                        class="form-label"><?php echo e(localize('Meta Description')); ?></label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                                        placeholder="<?php echo e(localize('Type your meta description')); ?>"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"><?php echo e(localize('Meta Image')); ?></label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Meta Image')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="meta_image">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--seo meta description end-->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Product')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo e(localize('Product Information')); ?></h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active"><?php echo e(localize('Basic Information')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-2"><?php echo e(localize('Product Images')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-3"><?php echo e(localize('Category')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-tags"><?php echo e(localize('Product tags')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-4"><?php echo e(localize('Product Brand & Unit')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-5"><?php echo e(localize('Price, SKU, Stock & Variations')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-6"><?php echo e(localize('Product Discount')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-7"><?php echo e(localize('Minimum Purchase')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-8"><?php echo e(localize('Product Taxes')); ?></a>
                                    </li>

                                    <li>
                                        <a href="#section-9"><?php echo e(localize('Sell Target and Status')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-10"><?php echo e(localize('SEO Meta Options')); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('backend.inc.product-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/backend/pages/products/products/create.blade.php ENDPATH**/ ?>