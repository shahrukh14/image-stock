@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v12">
        <div class="container-default center width-100 mg-bottom-0 w-password-page w-form">
            <form action="{{ route('user.verify.email') }}" method="POST" id="user-login" class="password-protected-page-form w-password-page" data-wf-page-id="642ee44a50f5435ee5b2f9b4" data-wf-element-id="619f19bf53fba71664558e2800000000000c" aria-label="Email Form">
                @csrf
                <div data-w-id="2078a685-0c58-ebe5-b8d7-ebd2a748e8ad" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="card password-protected-card bg-color-gray">
                    <h1 class="display-2 mg-bottom-50px-text-center font-size-35">Email Verification</h1>
                    <div class="w-layout-grid grid-2-columns form-v2">
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <p>A 6 digit verification code sent to your email address</p>
                            <input type="text" class="input w-input" name="code" placeholder="Enter Verification Code"  value="{{ old('value') }}" id="username" required>
                        </div>
                    </div>
                    <div class="text-align-center margin-top-20px">
                        {{-- <input type="submit"  data-wait="Please wait..." id="submitButton" class="submitButton"> --}}
                        <button type="submit" id="submitButton" class="submitButton">Button</button>
                    </div>
                    <div class="text-align-center margin-top-20px">
                        <p> If you don't get any code, <a href="{{ route('user.send.verify.code', 'email') }}">Try again</a> </p>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('style')
<style>
    .submitButton {
        background: url("/core/public/assets/image/buttons/submit button black.png") no-repeat;
        background-size: 100% 100%;
        padding: 10px 70px;
        color: transparent;
    }

    .submitButton:hover {
        background: url("/core/public/assets/image/buttons/submit button green.png") no-repeat;
        background-size: 100% 100%;
        padding: 10px 70px;
        color: transparent;
    }
</style>
@endpush

