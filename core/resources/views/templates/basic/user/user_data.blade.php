@extends($activeTemplate . 'layouts.frontend')

@section('content')
{{-- <div class="section--xl">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-8">
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __($pageTitle) }}</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.data.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('First Name')</label>
                                    <input type="text" class="form-control form--control" name="firstname" value="{{ old('firstname', auth()->user()->firstname) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Last Name')</label>
                                    <input type="text" class="form-control form--control" name="lastname" value="{{ old('lastname', auth()->user()->lastname) }}" required>
                                </div>
                                @if (auth()->user()->login_by)
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">@lang('Email')</label>
                                        <input type="email" class="form-control form--control" name="email" value="{{ old('email', auth()->user()->email) }}" @if (auth()->user()->email) readonly @endif required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">@lang('Country')</label>
                                        <div class="form--select">
                                            <select name="country" class="form-select">
                                                @foreach ($countries as $key => $country)
                                                    <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label required">@lang('Mobile')</label>
                                            <div class="input-group input--group">
                                                <span class="input-group-text mobile-code">

                                                </span>
                                                <input type="hidden" name="mobile_code">
                                                <input type="hidden" name="country_code">
                                                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control form--control checkUser" required>
                                            </div>
                                            <small class="text--danger mobileExist"></small>
                                        </div>
                                    </div>
                                @endif


                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Address')</label>
                                    <input type="text" class="form-control form--control" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('State')</label>
                                    <input type="text" class="form-control form--control" name="state" value="{{ old('state') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Zip Code')</label>
                                    <input type="text" class="form-control form--control" name="zip" value="{{ old('zip') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('City')</label>
                                    <input type="text" class="form-control form--control" name="city" value="{{ old('city') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="base-btn w-100">
                                    @lang('Submit')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section class="section section-hero---v8 mg-bottom-54px">
    <div class="container-default w-container">
        <div class="inner-container _660px center">
            <div data-w-id="e5af3236-bdad-9243-1458-dd352f1591da" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="inner-container _480px center">
                <div class="inner-container _420px---mbl center">
                    <div class="text-center mg-bottom-32px keep">
                        <h1 class="mg-bottom-12px">User Data</span></h1>
                        <p class="paragraph-small mg-bottom-0">Please fill out the form</p>
                    </div>
                </div>
            </div>
            <div data-w-id="5592ff70-b149-b8af-9a2f-465b7fb15f64" style="min-height: 520px;" class="card author---form w-form">
                <form action="{{ route('user.data.submit') }}" method="POST">
                    @csrf
                    <div class="w-layout-grid grid-2-columns form-v2">
                        <div>
                            <label for="firstname">First name</label>
                            <input type="text" class="input w-input" name="firstname" value="" id="firstname"  required>
                        </div>
                        <div>
                            <label for="lastname">Last Name</label>
                            <input type="text" class="input w-input" name="lastname" value="" id="lastname" required>
                        </div>
                        <div>
                            <label for="address">Address</label>
                            <input type="text" class="input w-input" name="address" id="address" required>
                        </div>
                        <div>
                            <label for="state">State</label>
                            <input type="text" class="input w-input" name="state" value="" id="state" required>
                            </div>
                        <div>
                            <label for="zip">Zip</label>
                            <input type="text" class="input w-input" name="zip" id="zip"  value="" required>
                        </div>
                        <div>
                            <label for="city">City</label>
                            <input type="text" class="input w-input" name="city" value="" id="city" required>
                        </div>
                        
                        <input type="submit" value="Submit" id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f7b-1caef54c" class="btn-primary width-100 mg-top-16px w-button">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@if (auth()->user()->login_by)
    @push('script')
        <script>
            "use strict";
            (function($) {
                @if ($mobileCode)
                    $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
                @endif

                $('select[name=country]').change(function() {
                    $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                    $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                    $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
                });
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            })(jQuery);
        </script>
    @endpush
@endif
