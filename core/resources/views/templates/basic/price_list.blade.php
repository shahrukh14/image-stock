@extends($activeTemplate . 'layouts.frontend')
@section('content')
@php
    $content = getContent('plan.content', true);
    $elements = getContent('plan.element', false, 4, true);
@endphp

    <section class="section">
        <div class="container-default w-container">
            <div class="">
                <div class="">
                    <div class="inner-container _981px width-100 margin-auto">
                        <h1 class="display-3 mg-bottom-32px text-align-center">Pricing</h1>

                        <div style="margin-left: 20px">
                            <h4 class="">{{ __(@$content->data_values->title_1) }}</h4>
                            <p class="mg-bottom-20px ">{{ __(@$content->data_values->subtitle_1) }}</p>
                            <h4 class="">{{ __(@$content->data_values->title_2) }}</h4>
                            <p class="mg-bottom-40px ">{{ __(@$content->data_values->subtitle_2) }}</p>
                        </div>

                        <div class="grid-container">
                            @forelse ($plans as $plan)
                            <div class="grid-item text-align-center padding-20px">
                                <h2 class="display-5 text-align-center">{{ $plan->name }}</h2>
                                @if($plan->plan_for == "photo")
                                <h4 class="text-align-center">Photos | Vectors & graphics</h4>
                                @else
                                <h4 class="text-align-center">Videos</h4>
                                @endif
                                <h3>${{ __(showAmount($plan->yearly_price)) }}</h3>
                                <div class="product-page-main-content---top">
                                    <p class="mg-bottom-0">{{ $plan->title}}</p>
                                </div>
                                <button class="buyButton purchase-btn" data-current="{{ auth()->user()?->purchasedPlan?->plan_id == $plan->id }}" data-daily_limit="{{ $plan->dailyLimitText }}" data-id="{{ $plan->id }}" data-monthly_limit="{{ $plan->monthlyLimitText }}" data-plan_name="{{ __($plan->name) }}" @if($plan->plan_for == 'video') data-plan_type="videos" @else data-plan_type="photos, vectors or graphics images" @endif >Buy</button>
                            </div>
                            @empty
                            <div class="grid-item text-align-center padding-20px">
                                 <h2>No Plans Found</h2>
                            </div>
                            @endforelse
                        </div>
                        <div style="margin-top: 20px;">
                            <h3>Buy Out</h3>
                            <span>
                                You can buy our assets with one time fee. The price will be different from the regular price.
                                Buyer will receive the copyright and the assets will be removed from our site and the public.
                                Please contact us <a href="mailto:green@greenstockpro.com" style="color:rgb(59, 59, 233) !important">green@greenstockpro.com</a>
                            </span>
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
                                    @lang('You already purchased this plan')
                                </h6>

                                <p class="plan-info text-center">@lang('By purchasing') <span class="fw-bold plan_name"></span> @lang(' plan, you will get') <span class="daily_limit fw-bold"></span> <span class="fw-bold plan_type"> </span>@lang('. No limit per day download. You can download all one day or at different times.')</p>
                                {{-- <input type="hidden" name="payment_type" value="direct"> --}}
                                <div class="form-group payment-info">
                                    <label class="form-label required" for="payment_type">@lang('Payment Type')</label>
                                    <div class="form--select">
                                        <select class="form-select" id="payment_type" name="payment_type" required readonly>
                                            <option value="direct" selected>@lang('Credit Card Or Paypal')</option>
                                            {{-- <option value="wallet">@lang('From Wallet')</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="buyNowButton planSubmitConfirm" type="submit">@lang('Buy Now') <span class="plan_id"></span> </button>
                            <button class="loginBtn closeButton" data-bs-dismiss="modal" type="button">@lang('Close')</button>

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

        .buyButton {
            background: url("/core/public/assets/image/buttons/buy button black.png") no-repeat;
            background-size: 100% 100%;
            padding: 12px 70px;
            color: transparent;
        }

        .buyButton:hover {
            background: url("/core/public/assets/image/buttons/buy button green.png") no-repeat;
            background-size: 100% 100%;
            padding: 12px 70px;
            color: transparent;
        }

        .buyNowButton {
            background: url("/core/public/assets/image/buttons/buy package black.png") no-repeat;
            background-size: 100% 100%;
            padding: 8px 40px;
            color: transparent;
        }

        .buyNowButton:hover {
            background: url("/core/public/assets/image/buttons/buy package green.png") no-repeat;
            background-size: 100% 100%;
            padding: 8px 40px;
            color: transparent;
        }

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
<script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            $('.purchase-btn').on('click', function() {
                let plan = $(this).data();
                let plan_id = plan.id;
                // let period = $('[name=plan_period]').val();
                let period = 'yearly';
                let modal = $('#purchaseModal');

                modal.find('[name=plan]').val(plan.id);
                modal.find('[name=period]').val(period);

                modal.find('.plan_name').text(plan.plan_name);
                modal.find('.plan_type').text(plan.plan_type);
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
