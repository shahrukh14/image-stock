@extends($activeTemplate . 'layouts.frontend')

@section('content')
    <div class="section--xl">
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
    </div>
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
