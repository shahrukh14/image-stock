@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section">
        <div class="container-default w-container">
            <div class="">
                <div class="">
                    <div class="inner-container _981px width-100 margin-auto">
                        <h1 class="display-3 mg-bottom-32px text-align-center">Pricing</h1>
                        <p class="mg-bottom-32px text-align-center">Find a package that suits your need</p>
                        <div class="grid-container">
                            @forelse ($plans as $plan)
                            <div class="grid-item text-align-center padding-20px">
                                <h1 class="display-5 mg-bottom-32px text-align-center">{{ $plan->name}}</h1>
                                <div class="d-flex justify-content-center">
                                    @php
                                        $images = json_decode($plan->image);
                                    @endphp
                                    @foreach ($images as $image)
                                        <img src="{{asset('core/public/assets/image/plan_images/'.$image)}}" alt="{{ $plan->name}}"  class="image-price-icon" />
                                    @endforeach
                                    
                                    {{-- <img src=".\assets\images\app_images\vectors-and-graphics-image-stock-x-webflow-template.svg"  alt="Vectors And Graphics Icon - Stock X Webflow Template"  class="image-price-icon" /> --}}
                                </div>
                                <div class="product-page-main-content---top">
                                    <p class="mg-bottom-0">{{ $plan->title}}</p>
                                    <div class="divider_card contact-form-center-divider"></div>
                                    <h3>${{ __(showAmount($plan->yearly_price)) }}</h3>
                                </div>
                                <input type="submit" value="Buy" class="w-commerce-commerceaddtocartbutton btn-primary width-50 margin-auto">
                            </div>
                            @empty
                            <div class="grid-item text-align-center padding-20px">
                                 <h2>No Plans Found</h2>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
