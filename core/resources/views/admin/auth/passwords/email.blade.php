@extends('admin.layouts.master')
@section('content')
    <div class="login-main" style="background-image: url('{{ asset('assets/admin_reviewer/images/login.jpg') }}')">
        <div class="custom-container container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                    <div class="login-area">
                        <div class="login-wrapper">
                            <div class="login-wrapper__top">
                                <h3 class="title text-white">@lang('Recover Account')</h3>
                            </div>
                            <div class="login-wrapper__body">
                                <form class="login-form verify-gcaptcha" action="{{ route('admin.password.reset') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>@lang('Email')</label>
                                        <input class="form-control" name="email" type="email" value="{{ old('email') }}" required>
                                    </div>
                                    <x-captcha />
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <a class="forget-text" href="{{ route('admin.login') }}">@lang('Login Here')</a>
                                    </div>
                                    <button class="btn cmn-btn w-100" type="submit">@lang('Submit')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
