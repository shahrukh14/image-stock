@php
    if(gs()->hero_banner_1 != null){
        $hero_banner_1 = json_decode(gs()->hero_banner_1);
        $hero_banner_image_1 = $hero_banner_1->image;
    }else{
        $hero_banner_image_1 = "default_banner.jpg";
        $hero_banner_1 = null;
    }
@endphp
<section class="section section-hero---v1" style="background-image: url({{ asset('core/public/assets/image/hero_banner/'.$hero_banner_image_1)}})">
    <div class="container-default width-100 w-container">
        <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="inner-container _640px center">
            <div class="inner-container _550px---mbl center">
                <div class="text-center">
                    <h1 class="display-1 mg-bottom-16px nutral-black">
                        @if($hero_banner_1){{ $hero_banner_1->heading }}@endif
                    </h1>
                    <p class="color-neutral-200 mg-bottom-32px keep nutral-black">
                        {{-- Find royality-free photos and videos for your projects and <br><span class="text-no-wrap">social media content</span> --}}
                        @if($hero_banner_1){{ $hero_banner_1->sub_heading }}@endif
                    </p>
                    <div class="buttons-row center">
                        <a href="@if($hero_banner_1){{ $hero_banner_1->button_url }}@else javascript:void(0) @endif" class="btn-primary white button-row w-button"> @if($hero_banner_1){{ $hero_banner_1->button_text }}@else Browse @endif</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
