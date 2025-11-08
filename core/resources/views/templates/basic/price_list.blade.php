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
                                    <div style="margin-top:20px;">
                                        <p>{{ $plan->dailyLimitText }} daily downloads</p>
                                        <p>{{ $plan->monthlyLimitText }} monthly downloads</p>
                                    </div>
                                    <div class="divider_card contact-form-center-divider"></div>
                                   
                                    <h3>${{ __(showAmount($plan->yearly_price)) }}</h3>
                                </div>
                                <button class="w-commerce-commerceaddtocartbutton btn-primary width-50 margin-auto purchase-btn" data-current="{{ auth()->user()?->purchasedPlan?->plan_id == $plan->id }}" data-daily_limit="{{ $plan->dailyLimitText }}" data-id="{{ $plan->id }}" data-monthly_limit="{{ $plan->monthlyLimitText }}" data-plan_name="{{ __($plan->name) }}" >Buy</button>
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

@push('modal')
    <!--  Purchase Modal  -->
    <div class="modal custom--modal fade" id="purchaseModal" aria-hidden="true" aria-labelledby="title" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">@lang('Purchase Plan')</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"><b>X</b></button>
                </div>
                @auth
                    <form action="{{ route('user.plan.purchase') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input name="period" type="hidden">
                            <input name="plan" type="hidden">
                            <div class="row gy-3">

                                <h6 class="text-danger already_purchased text-center">
                                    @lang('You already purchased the plan')
                                </h6>

                                <p class="plan-info text-center">@lang('By purchasing') <span class="fw-bold plan_name"></span> @lang(' plan, you will get ') <span class="daily_limit fw-bold"></span>@lang(' images download opurtunity per day and') <span class="monthly_limit fw-bold"></span> @lang(' images per month.')</p>
                                <input type="hidden" name="payment_type" value="direct">
                                {{-- <div class="form-group payment-info">
                                    <label class="form-label required" for="payment_type">@lang('Payment Type')</label>
                                    <div class="form--select">
                                        <select class="form-select" id="payment_type" name="payment_type" required>
                                            <option value="">@lang('Select One')</option>
                                            <option value="direct">@lang('Direct Payment')</option>
                                            <option value="wallet">@lang('From Wallet')</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="loginBtn planSubmitConfirm" type="submit">@lang('Buy Now') <span class="plan_id"></span> </button>
                            <button class="btn btn--dark closeButton" data-bs-dismiss="modal" type="button">@lang('Close')</button>
                        </div>
                    </form>
                @else
                    <div class="modal-body">
                        <h4 style="text-align: center">@lang('Please login first to buy a plan')</h4>
                    </div>
                    <div class="modal-footer">
                        <a class="loginBtn" href="{{ route('user.login') }}">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endpush

@push('style')
    <style>
        .loginBtn{
            padding: 2px 12px;
            border-radius: 20px;
            border: 2px solid;
            text-decoration: none;
        }

        .form--select .form-select {
            height: 45px;
            border-radius: 3px;
            padding-right: 46px;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid;
            background: hsl(var(--light)/0.3);
            color: hsl(var(--heading));
        }
        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
@endpush

@push('script')
<script src="http://localhost/viserstock/assets/global/js/bootstrap.bundle.min.js"></script>
    <script>
        (function($) {
            "use strict";

            $('.purchase-btn').on('click', function() {
                console.log($(this).data());
                let plan = $(this).data();
                let plan_id = plan.id;
                // let period = $('[name=plan_period]').val();
                let period = 'yearly';
                let modal = $('#purchaseModal');

                modal.find('[name=plan]').val(plan.id);
                modal.find('[name=period]').val(period);

                modal.find('.plan_name').text(plan.plan_name);
                modal.find('.daily_limit').text(plan.daily_limit);
                modal.find('.monthly_limit').text(plan.monthly_limit);


                $('.already_purchased, .closeButton').css({ 'display': 'none', });
                $('.payment-info,.plan-info,.planSubmitConfirm').css({ 'display': '', });

                let isCurrent = $(this).data('current');
                if (isCurrent) {
                    $('.already_purchased,.closeButton').css({ 'display': '', });
                    $('.payment-info,.plan-info, .planSubmitConfirm').css({ 'display': 'none', });
                }
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush
