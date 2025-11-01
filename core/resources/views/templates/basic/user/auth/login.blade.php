@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $content = getContent('login.content', true);
    @endphp
    <div class="section login-section" style="background-image: url({{ getImage('assets/images/frontend/login/' . @$content->data_values->background_image, '1920x800') }})">
        <div class="section">
            <div class="container">
                <div class="row g-4 justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <img src="{{ getImage('assets/images/frontend/login/' . @$content->data_values->image, '690x550') }}" alt="@lang('images')" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-xxl-5">
                        <div class="login-form">
                            <h3 class="login-form__title">{{ __(@$content->data_values->form_title) }}</h3>
                            <form action="{{ route('user.login') }}" class="row g-3 g-xxl-4 verify-gcaptcha" method="post" autocomplete="off">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">@lang('Username')</label>
                                    <input type="text" class="form-control form--control" name="username" required />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">@lang('Password')</label>
                                    <input type="password" class="form-control form--control" name="password" required />
                                </div>

                                <x-captcha googleCaptchaClass="col-12" customCaptchaDiv="col-12" customCaptchaCode="mb-3" />

                                <div class="col-sm-6">
                                    <div class="form-check form--check">
                                        <input class="form-check-input custom--check" type="checkbox" id="rememberMe" name="remember" @checked(old('remember')) />
                                        <label class="form-check-label form-label" for="rememberMe">@lang('Remember Me')</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route('user.password.request') }}" class="t-link d-block text-sm-end text--base t-link--base form-label lh-1">
                                        @lang('Forgot Password?')
                                    </a>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn--lg btn--base w-100 rounded">@lang('LOGIN')</button>
                                </div>
                                <div class="col-12">
                                    <p class="m-0 sm-text text-center lh-1">
                                        @lang('Don\'t have an account?') <a href="{{ route('user.register') }}" class="t-link t-link--base text--base">@lang('Create Account')</a>
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
