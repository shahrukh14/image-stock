@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v8 mg-bottom-54px">
        <div class="container-default w-container">
            <div class="inner-container _660px center">
                <div data-w-id="e5af3236-bdad-9243-1458-dd352f1591da" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="inner-container _480px center">
                    <div class="inner-container _420px---mbl center">
                        <div class="text-center mg-bottom-32px keep">
                            <h1 class="mg-bottom-12px">Become <span class="text-no-wrap">a contributor</span></h1>
                            <p class="paragraph-small mg-bottom-0">please fill out the form</p>
                        </div>
                    </div>
                </div>
                <div data-w-id="5592ff70-b149-b8af-9a2f-465b7fb15f64" style="opacity: 1;" class="card author---form w-form">
                    <form action="{{ route('user.become.contributor',$user->id) }}" method="POST">
                        @csrf
                        <div class="w-layout-grid grid-2-columns form-v2">
                            <div>
                                <label for="Name">Full name</label>
                                <input type="text" class="input w-input" name="firstname" value="{{$user->firstname}}" id="name"  required>
                            </div>
                            <div>
                                <label for="email">Email address</label>
                                <input type="email" class="input w-input" name="email" value="{{$user->email}}" id="email" required readonly>
                                </div>
                            <div>
                                <label for="mobile">Phone number</label>
                                <input type="number" class="input w-input" name="mobile" value="{{$user->mobile}}" id="mobile" required>
                            </div>
                            <div>
                                <label for="address">Location</label>
                                <input type="text" class="input w-input" name="address" value="{{$user->address->address}}" id="address" required>
                                </div>
                            <div>
                                <label for="location">Username</label>
                                <input type="text" class="input w-input" name="username" id="username"  value="{{$user->username}}" required readonly>
                            </div>
                            <div>
                                <label for="website">Website</label>
                                <input type="text" class="input w-input" name="website" value="{{$user->website}}" id="website">
                            </div>
                            <div id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f77-1caef54c" class="text-area-wrapper">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" maxlength="5000" placeholder="Tell your audience about you..." class="text-area mg-bottom-0 w-input" required>{{$user->description}}</textarea>
                            </div>
                            @if($user->user_status == 1)
                                <input type="button" value="Already Applied" data-wait="Please wait..." id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f7b-1caef54c" class="btn-primary width-100 mg-top-16px w-button" disabled>
                            @else
                                <input type="submit" value="Apply now" data-wait="Please wait..." id="w-node-_5592ff70-b149-b8af-9a2f-465b7fb15f7b-1caef54c" class="btn-primary width-100 mg-top-16px w-button">
                            @endif
                            
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
