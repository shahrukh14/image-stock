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
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <input type="password" class="input w-input" maxlength="256" name="password" data-name="Password" placeholder="Password" id="password" required>
                        </div>
                    </div>
                    <div class="text-align-center margin-top-20px">
                        <input type="submit" value="Sign up" data-wait="Please wait..." id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f7b-1caef54c" class="btn-primary width-50 mg-top-16px w-button">
                    </div>
                    <div  class="margin-top-20px text-align-center">Already have an account? <a href="{{ route('login') }}" class="text-link text-medium color-neutral-800">Log in</a></div>
                </div>
            </form>
        </div>
    </section>
@endsection
