@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v12">
        <div class="container-default center width-100 mg-bottom-0 w-password-page w-form">
            <form action="https://stocktemplate.webflow.io/.wf_auth" method="post" id="email-form" name="email-form"
                data-name="Email Form" class="password-protected-page-form w-password-page"
                data-wf-page-id="642ee44a50f5435ee5b2f9b4" data-wf-element-id="619f19bf53fba71664558e2800000000000c"
                aria-label="Email Form">
                <div data-w-id="2078a685-0c58-ebe5-b8d7-ebd2a748e8ad"
                    style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                    class="card password-protected-card bg-color-gray">
                    <h1 class="display-2 mg-bottom-50px-text-center font-size-35">Sign up</h1>
                    <div class="w-layout-grid grid-2-columns form-v2">
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <input type="text" class="input w-input" maxlength="256"
                            name="Email" data-name="Email" placeholder="Email" id="email"
                            required=""></div>
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                                <input type="text" class="input w-input" maxlength="256"
                                name="Website" data-name="Website" placeholder="User Name" id="website"
                                required=""></div>
                        <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c">
                            <input type="text" class="input w-input" maxlength="256"
                                name="Password" data-name="Password" placeholder="Password" id="password"
                                required=""></div>
                    </div>
                    <div class="text-align-center margin-top-20px">
                        <input type="submit" value="Sign up" data-wait="Please wait..."
                        id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f7b-1caef54c"
                        class="btn-primary width-50 mg-top-16px w-button">
                    </div>
                    <div id="w-node-_9eb9b4a8-abc6-d1d3-38aa-da6b1d25671d-852cefdd" class="margin-top-20px text-align-center">Already have an account? <a href="" class="text-link text-medium color-neutral-800">Log in</a></div>
                </div>
            </form>
        </div>
    </section>
@endsection
