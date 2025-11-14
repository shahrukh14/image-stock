@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v12">
        <div class="container-default center width-100 mg-bottom-0 w-password-page w-form">
            <form action="{{ route ('user.login') }}" method="POST" id="user-login" name="email-form" data-name="Email Form" class="password-protected-page-form w-password-page" data-wf-page-id="642ee44a50f5435ee5b2f9b4" data-wf-element-id="619f19bf53fba71664558e2800000000000c" aria-label="Email Form">
                @csrf
                <div data-w-id="2078a685-0c58-ebe5-b8d7-ebd2a748e8ad" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="card password-protected-card bg-color-gray">
                    <h1 class="display-2 mg-bottom-50px-text-center font-size-35">Login</h1>
                    <div class="w-layout-grid grid-2-columns form-v2">
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <input type="text" class="input w-input" name="username" data-name="username" placeholder="Enter Username" id="username" required>
                        </div>
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c" class="input-box">
                            <input type="password" class="input w-input form-control" name="password" data-name="password" placeholder="Enter Password" id="password" required>
                            <span id="viewPassword">View</span>
                        </div>
                    </div>
                    <div class="text-align-center margin-top-20px">
                        {{-- <input type="submit" data-wait="Please wait..." id="loginButton" class="loginButton"> --}}
                        <button type="submit" id="loginButton" class="loginButton">Button</button>
                    </div>
                    <div id="w-node-_9eb9b4a8-abc6-d1d3-38aa-da6b1d25671d-852cefdd" class="margin-top-20px text-align-center">Don't have an account? <a href="{{ route('signup') }}" class="text-link text-medium color-neutral-800">Sign Up</a></div>
                    <div id="w-node-_9eb9b4a8-abc6-d1d3-38aa-da6b1d25671d-852cefdd" class="margin-top-20px text-align-center"><a href="{{ route('user.password.request') }}" class="text-link text-medium color-neutral-800">Forgot Password</a></div>

                    @php
                        $credentials = $general->socialite_credentials;
                    @endphp
                    @if ($credentials->google->status == Status::ENABLE || $credentials->facebook->status == Status::ENABLE || $credentials->linkedin->status == Status::ENABLE)
                    <div>
                        <div class="margin-top-20px text-align-center"><span class="text-medium color-neutral-800">or Login with</span></div>
                        <div class="w-layout-grid social-media-grid-top" style="margin-left:155px; margin-top:10px;">
                            @if ($credentials->google->status == Status::ENABLE)
                                <a href="{{ route('user.social.login', 'google') }}"  class="social-icon w-inline-block"><div class="social-icon-font"></div></a>
                            @endif

                            @if ($credentials->facebook->status == Status::ENABLE)
                                <a href="{{ route('user.social.login', 'facebook') }}"  class="social-icon w-inline-block"><div class="social-icon-font"></div></a>
                            @endif

                            @if ($credentials->linkedin->status == Status::ENABLE)
                                <a href="{{ route('user.social.login', 'linkedin') }}"  class="social-icon w-inline-block"><div class="social-icon-font"></div></a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </section>
@endsection

@push('style')
<style>
    .input-box {
        position: relative;
    }

    #viewPassword {
        position: absolute;
        top: 13px;
        right: 15px;
        cursor: pointer;
    }

    .loginButton {
        background: url("/core/public/assets/image/buttons/Log in button black.png") no-repeat;
        background-size: 100% 100%;
        padding: 10px 70px;
        color: transparent;
    }

    .loginButton:hover {
        background: url("/core/public/assets/image/buttons/Log in button green.png") no-repeat;
        background-size: 100% 100%;
        padding: 10px 70px;
        color: transparent;
    }
</style>
@endpush

@push('script')
<script>
    $(document).ready(function(){

        // $('#viewPassword').on('click', function(){
        //     var fieldType = $('#password').attr('type');

        //     if (fieldType === 'password') {
        //         $('#password').attr('type', 'text');
        //     } else {
        //         $('#password').attr('type', 'password');
        //     }
        // });

        $('#viewPassword').on('mousedown', function(){
                $('#password').attr('type', 'text');
        });

        $('#viewPassword').on('mouseup', function(){
                $('#password').attr('type', 'password');
        });
    });
</script>
@endpush
