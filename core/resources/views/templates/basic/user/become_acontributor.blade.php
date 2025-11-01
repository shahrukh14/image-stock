@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v8 mg-bottom-54px">
        <div class="container-default w-container">
            <div class="inner-container _660px center">
                <div data-w-id="e5af3236-bdad-9243-1458-dd352f1591da"
                    style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                    class="inner-container _480px center">
                    <div class="inner-container _420px---mbl center">
                        <div class="text-center mg-bottom-32px keep">
                            <h1 class="mg-bottom-12px">Become <span class="text-no-wrap">a contributor</span></h1>
                            <p class="paragraph-small mg-bottom-0">please fill out form</p>
                        </div>
                    </div>
                </div>
                <div data-w-id="5592ff70-b149-b8af-9a2f-465b7fb15f64" style="opacity: 1;" class="card author---form w-form">
                    <form id="wf-form-Author-Form" name="wf-form-Author-Form" data-name="Author Form" method="get"
                        data-wf-page-id="6435f1919d2e7c071caef54c" data-wf-element-id="5592ff70-b149-b8af-9a2f-465b7fb15f65"
                        aria-label="Author Form">
                        <div class="w-layout-grid grid-2-columns form-v2">
                            <div><label for="Name">Full name</label><input type="text" class="input w-input"
                                    maxlength="256" name="Name" data-name="Name" placeholder="John Carter" id="Name"
                                    required=""></div>
                            <div><label for="email">Email address</label><input type="email" class="input w-input"
                                    maxlength="256" name="Email" data-name="Email" placeholder="example@email.com"
                                    id="email" required=""></div>
                            <div><label for="phone">Phone number</label><input type="tel" class="input w-input"
                                    maxlength="256" name="Phone" data-name="Phone" placeholder="(123) 456 - 7890"
                                    id="phone" required=""></div>
                            <div><label for="location">Location</label><input type="text" class="input w-input"
                                    maxlength="256" name="Location" data-name="Location" placeholder="ex. New York, NY"
                                    id="location" required=""></div>
                            <div><label for="location">User name</label><input type="text" class="input w-input"
                                    maxlength="256" name="Location" data-name="Location" placeholder="CarterPhotos23"
                                    id="location" required=""></div>
                            <div id="w-node-_556b4f01-7325-9050-7702-f57a115f9ad7-1caef54c"><label
                                    for="website">Website</label><input type="text" class="input w-input"
                                    maxlength="256" name="Website" data-name="Website" placeholder="ex. www.johncarter.com"
                                    id="website" required=""></div>
                            <div id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f77-1caef54c" class="text-area-wrapper"><label
                                    for="description">Description</label>
                                <textarea id="description" name="Description" maxlength="5000" data-name="Description"
                                    placeholder="Tell your audience about you..." required="" class="text-area mg-bottom-0 w-input"></textarea>
                            </div>
                            <input type="submit" value="Apply now" data-wait="Please wait..."
                                id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f7b-1caef54c"
                                class="btn-primary width-100 mg-top-16px w-button">
                        </div>
                    </form>
                    <div class="success-message w-form-done" tabindex="-1" role="region" aria-label="Author Form success">
                        <div>
                            <div class="line-rounded-icon success-message-check large"></div>
                            <h2 class="display-4 mg-bottom-8px">Thank you</h2>
                            <div>Your message has been submitted. <br>We will get back to you within 24-48 hours.</div>
                        </div>
                    </div>
                    <div class="error-message w-form-fail" tabindex="-1" role="region" aria-label="Author Form failure">
                        <div>Oops! Something went wrong.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
