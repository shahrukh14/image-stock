@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $content = getContent('register.content', true);
        $policyPages = getContent('policy_pages.element', false, null, true);
    @endphp
    <div class="section login-section" style="background-image: url({{ getImage('assets/images/frontend/register/' . @$content->data_values->background_image, '1920x800') }})">
        <div class="section">
            <div class="container">
                <div class="row g-4 justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <img src="{{ getImage('assets/images/frontend/register/' . @$content->data_values->image, '690x550') }}" alt="@lang('images')" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <h3 class="login-form__title">{{ __(@$content->data_values->form_title) }}</h3>
                            <form action="{{ route('user.register') }}" class="row g-3 g-xxl-4" method="post" autocomplete="off">
                                @csrf
                                @if (session()->has('reference'))
                                    <div class="col-md-12">
                                        <label for="referenceBy" class="form-label">@lang('Reference by')</label>
                                        <input type="text" name="referBy" id="referenceBy" class="form-control form--control" value="{{ session()->get('reference') }}" readonly>
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    <label class="form-label">@lang('Username')</label>
                                    <input type="text" class="form-control form--control checkUser" name="username" value="{{ old('username') }}" required>
                                    <small class="text--danger usernameExist"></small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">@lang('E-Mail Address')</label>
                                    <input type="email" class="form-control form--control checkUser" name="email" value="{{ old('email') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">@lang('Country')</label>
                                    <div class="form--select">
                                        <select name="country" class="form-select">
                                            @foreach ($countries as $key => $country)
                                                <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Password')</label>
                                        <input type="password" class="form-control form--control @if($general->secure_password) secure-password @endif" name="password" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Confirm Password')</label>
                                        <input type="password" class="form-control form--control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <x-captcha googleCaptchaClass="col-12" customCaptchaDiv="col-12" customCaptchaCode="mb-3" />

                                @if ($general->agree)
                                    <div class="col-sm-12">
                                        <div class="form-check form--check">
                                            <input class="form-check-input custom--check" type="checkbox" id="agree" name="agree" @checked(old('agree')) />
                                            <label class="form-check-label form-label" for="agree">
                                                @lang('I agree with')
                                                @foreach ($policyPages as $policy)
                                                    <a class="t-link t-link--base text--base" href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}" target="_blank">{{ __($policy->data_values->title) }}</a>
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </label>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <button class="btn btn--lg btn--base w-100 rounded">@lang('REGISTER')</button>
                                </div>

                                <div class="col-12">
                                    <p class="m-0 sm-text text-center lh-1">
                                        @lang('Already have an account?') <a href="{{ route('user.login') }}" class="t-link t-link--base text--base">@lang('Login Now')</a>
                                    </p>
                                </div>
                                @php
                                    $credentials = $general->socialite_credentials;
                                @endphp
                                @if ($credentials->google->status == Status::ENABLE || $credentials->facebook->status == Status::ENABLE || $credentials->linkedin->status == Status::ENABLE)
                                    <div class="col-12">
                                        <p class="text-center sm-text">@lang('Or Login with')</p>
                                        <ul class="list list--row justify-content-center social-list">
                                            @if ($credentials->google->status == Status::ENABLE)
                                                <li><a href="{{ route('user.social.login', 'google') }}" class="t-link social-list__icon"><i class="lab la-google"></i></a></li>
                                            @endif
                                            @if ($credentials->facebook->status == Status::ENABLE)
                                                <li><a href="{{ route('user.social.login', 'facebook') }}" class="t-link social-list__icon"><i class="lab la-facebook-f"></i></a></li>
                                            @endif
                                            @if ($credentials->linkedin->status == Status::ENABLE)
                                                <li><a href="{{ route('user.social.login', 'linkedin') }}" class="t-link social-list__icon"><i class="lab la-linkedin-in"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal custom--modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <p class="text-center text--danger">@lang('You already have an account, please Login')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark btn--sm" data-bs-dismiss="modal">@lang('Close')</button>
                    <a href="{{ route('user.login') }}" class="btn btn--base btn--sm">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
@endpush

@if ($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif

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

            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush

@push('style')
    <style>
        .input-group-text.mobile-code {
            padding: 0 5px;
        }
    </style>
@endpush
