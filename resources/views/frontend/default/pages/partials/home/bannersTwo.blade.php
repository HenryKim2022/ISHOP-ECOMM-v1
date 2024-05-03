<section class="position-relative banner-section z-1 overflow-hidden">
    <img src="{{ staticAsset('frontend/default/assets/img/shapes/bg-shape-4.png') }}" alt="bg shape"
        class="position-absolute start-0 bottom-0 w-100 z--1">

    @php
        $BS1 = getSetting('banner_section_two_banner_one');
        $BS2 = getSetting('banner_section_two_banner_two')
    @endphp

    @if ($BS1 || $BS2)
        <div class="container">
            <div class="row g-4">
                @if ($BS1)
                    @if ($BS1 && $BS2)
                        <div class="col-xl-8">
                    @else
                        <div class="col-xl-12">                            
                    @endif
                        <a href="{{ getSetting('banner_section_two_banner_one_link') }}">
                            <img src="{{ uploadedAsset(getSetting('banner_section_two_banner_one')) }}" alt=""
                                srcset="" class="img-fluid w-100 h-100">
                        </a>
                    </div>
                @endif
                @if ($BS2)
                    @if ($BS2 && $BS1)
                        <div class="col-xl-4 d-none d-xl-block">
                    @else
                        <div class="col-xl-12 d-none d-xl-block">                           
                    @endif
                        <a href="{{ getSetting('banner_section_two_banner_two_link') }}">
                            <img src="{{ uploadedAsset(getSetting('banner_section_two_banner_two')) }}" alt=""
                                srcset="" class="img-fluid w-100 h-100">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif

</section>
