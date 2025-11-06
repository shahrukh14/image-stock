@extends($activeTemplate . 'layouts.frontend')
@section('content')
@php
    $content = getContent('about.content', true);
    $elements = getContent('about.element', false, 4, true);
    if($content){
        $image = $content->data_values->image;
    }else{
        $image = "about-us-hero-image.png";
    }
@endphp

<section class="section section-hero---v2 about" style="background-image: url({{ asset('assets/images/frontend/about/' . $image)}})">
    <div class="container-default w-container">
        <div class="inner-container _640px center">
            <div class="inner-container _500px---mbl center">
                <div class="text-center">
                    <h1 class="display-1 nutral-black mg-bottom-20px"> {{ __(@$content->data_values->title) }}</h1>
                    <p class="nutral-black mg-bottom-32px keep">{{ __(@$content->data_values->subtitle) }}</p>
                    <div class="buttons-row center">
                        <a href="{{route('user.become.contributor.page')}}" class="btn-primary white w-button">Become a contributor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pd-156px">
    <div class="container-default w-container">
        <div class="inner-container _375px center">
            <div class="text-center mg-bottom-32px keep">
                <h2 class="display-3 mg-bottom-0">GreenStock has been helping creatives since 2017 </h2>
            </div>
        </div>
        <div class="w-layout-grid grid-3-columns _1-col-tablet gap-row-48px">
            <div class="layout---image-v1">
                <div class="image-wrapper layout---image-v1---image">
                    <img src="{{ asset('core/public/assets/image/about/about_image_1.png')}}" alt="Canon 52mm" class="image fit-cover">
                    </div>
                <div class="layout---image-v1---content">
                    <div>
                        <h3 class="display-4">Downloadable design assets</h3>
                    </div>
                </div>
            </div>
            <div class="layout---image-v1">
                <div class="image-wrapper layout---image-v1---image">
                    <img src="{{ asset('core/public/assets/image/about/about_image_2.png')}}" alt="Canon 52mm" class="image fit-cover">
                    </div>
                <div class="layout---image-v1---content">
                    <div>
                        <h3 class="display-4">Creative artists</h3>
                    </div>
                </div>
            </div>
            <div class="layout---image-v1">
                <div class="image-wrapper layout---image-v1---image">
                    <img src="{{ asset('core/public/assets/image/about/about_image_3.png')}}" alt="Canon 52mm" class="image fit-cover">
                    </div>
                <div class="layout---image-v1---content">
                    <div>
                        <h3 class="display-4">A library of stock photos & assets</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pd-120px bg-accent-gray">
    <div class="container-default w-container">
        <div class="inner-container _1008px center">
            <div>
                <div class="text-center mg-bottom-32px keep">
                    <h2 class="display-3 neutral-black mg-bottom-6px">Frequently asked questions</h2>
                </div>
            </div>
            <div>
                <div class="tabs-content w-tab-content">
                    <div lass="w-tab-pane w--tab-active" id="w-tabs-0-data-w-pane-0"  role="tabpanel">
                        <div class="w-layout-grid grid-1-column gap-row-0" id="accordion">
                            @foreach ($elements as $element)
                                <h3 class="accordion-item-wrapper accordion-header accordion-title heading-h4-size neutral-black">{{ __($element->data_values->title) }}
                                    <div class="accordion-side right-side">
                                        <a href="javascript:void(0)" class="btn-circle-secondary small accordion-btn w-inline-block">
                                            <div class="accordion-btn-line vertical"></div>
                                            <div class="accordion-btn-line horizontal"></div>
                                        </a>
                                    </div>
                                </h3>
                                <div class="accordion-item-wrapper acordion-body">
                                    <div class="accordion-spacer"></div>
                                    <p class="neutral-black mg-bottom-0">
                                        {{ __($element->data_values->description) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('style')
<style>
h3.accordion-item-wrapper {
    display: block;
    border-bottom: 0;
}
h3.accordion-item-wrapper:first-child {
    border-top: 0;
}
h3.accordion-item-wrapper .accordion-side.right-side {
    float: right;
}
.accordion-item-wrapper.acordion-body {
    justify-content: start;
    border-top: 0;
    padding-top: 0;
}
</style>
@endpush
@push('script')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#accordion").accordion();
    });
</script>
@endpush
