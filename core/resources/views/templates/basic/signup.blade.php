@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v12">
        <div class="container-default center width-100 mg-bottom-0 w-password-page w-form">
            <form action="{{ route ('user.register') }}" method="POST" class="password-protected-page-form w-password-page" aria-label="Email Form">
                <div data-w-id="2078a685-0c58-ebe5-b8d7-ebd2a748e8ad"  style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="card password-protected-card bg-color-gray">
                    @csrf
                    <h1 class="display-2 mg-bottom-50px-text-center font-size-35">Sign up</h1>
                    <div class="w-layout-grid grid-2-columns form-v2">
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <input type="email" class="input w-input"  name="email" data-name="Email" placeholder="Email" id="email" required>
                        </div>
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <input type="text" class="input w-input" maxlength="256" name="username" data-name="username" placeholder="User Name" id="username" required>
                        </div>
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c" class="input-box">
                            <input type="password" class="input w-input" maxlength="256" name="password" data-name="Password" placeholder="Password" id="password" required>
                            <span id="viewPassword">View</span>
                        </div>
                    </div>
                    <div class="text-align-center margin-top-20px">
                        {{-- <input type="submit" data-wait="Please wait..." id="signUpButton" class="signUpButton"> --}}
                        <button type="submit" id="signUpButton" class="signUpButton">Button</button>
                    </div>
                    <div class="margin-top-20px text-align-center">Already have an account? <a href="{{ route('user.login') }}" class="text-link text-medium color-neutral-800">Log in</a></div>
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
    .signUpButton {
        background: url("/core/public/assets/image/buttons/sign up button black.png") no-repeat;
        background-size: 100% 100%;
        padding: 10px 70px;
        color: transparent;
    }

    .signUpButton:hover {
        background: url("/core/public/assets/image/buttons/sign up button green.png") no-repeat;
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
