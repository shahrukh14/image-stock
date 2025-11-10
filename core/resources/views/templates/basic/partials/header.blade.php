<div data-w-id="0f04fa47-b280-a98d-cbb1-756575b035fe" data-animation="default" data-collapse="medium"
data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="header-wrapper w-nav"
style="opacity: 1">
<div class="container-default w-container">
    <div class="header-content-wrapper">
        <div class="header-left-side header-v1">
            <a href="{{ route('home') }}" class="header-logo-link w-nav-brand" aria-label="home">
                <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="Logo - green Stock" class="header-logo" />
            </a>
        </div>
        <div class="header-right-side">
            <nav role="navigation" class="header-nav-menu-wrapper w-nav-menu">
                <form action="https://stocktemplate.webflow.io/search" class="header-search-bar---mobile">
                    <div class="line-rounded-icon header-search-bar-icon"></div>
                    <label for="search" class="hidden-on-desktop">Search</label><input type="search"
                        class="input small search-header w-input" maxlength="256" name="query"
                        placeholder="Search for resources…" id="header-search-mobile"
                        required="" /><input type="submit" value="Search"
                        class="hidden-on-desktop w-button" />
                </form>
                <ul role="list" class="header-nav-menu-list">
                    <li class="header-nav-list-item"><a href="{{ route('home') }}" aria-current="page" class="header-nav-link w-nav-link w--current" style="max-width: 1364px">Home</a></li>
                    <li class="header-nav-list-item"><a href="{{ route('search', ['type'=>'image'])}}" class="header-nav-link w-nav-link"  style="max-width: 1364px">Search</a></li>
                    <li class="header-nav-list-item"><a href="{{ route('photos')}}" class="header-nav-link w-nav-link" style="max-width: 1364px">Photos</a></li>
                    <li class="header-nav-list-item"><a href="#" class="header-nav-link w-nav-link" style="max-width: 1364px">Vectors</a></li>
                    <li class="header-nav-list-item"><a href="#" class="header-nav-link w-nav-link" style="max-width: 1364px">Videos</a></li>
                    <li class="header-nav-list-item"><a href="{{route('price.details')}}" class="header-nav-link w-nav-link" style="max-width: 1364px">Pricing</a></li>

                    @if(!auth()->user())
                    <li class="header-nav-list-item"> <a href="{{ route('user.login') }}" class="header-nav-link w-nav-link" style="max-width: 1364px">Log In /Sign up</a> </li>
                    @else
                    
                    <li class="header-nav-list-item nav-item has-sub user-dropdown">
                        <a href="javascript:void(0)" class="primary-menu__link p-0">
                            <span class="custom-dropdown__user">
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . auth()->user()->image, null, 'user') }}" alt="" class="custom-dropdown__user-img">
                            </span>
                            <span class="ps-3 d-lg-none">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</span>
                        </a>
                        <ul class="primary-menu__sub">
                            <li>
                                <a href="{{ route('user.home') }}" class="t-link primary-menu__sub-link d-flex gap-2">
                                    <span class="d-inline-block xl-text lh-1">
                                        <i class="las la-home"></i>
                                    </span>
                                    <span class="d-block flex-grow-1">
                                        @lang('Dashboard')
                                    </span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="{{ route('user.image.all') }}" class="t-link primary-menu__sub-link d-flex gap-2">
                                    <span class="d-inline-block xl-text lh-1">
                                        <i class="las la-image"></i>
                                    </span>
                                    <span class="d-block flex-grow-1">
                                        @lang('My Images')
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.collection.all') }}" class="t-link primary-menu__sub-link d-flex gap-2">
                                    <span class="d-inline-block xl-text lh-1">
                                        <i class="las la-folder-plus"></i>
                                    </span>
                                    <span class="d-block flex-grow-1">
                                        @lang('My Collections')
                                    </span>
                                </a>
                            </li>
                            <li>
                                @php
                                    $user = auth()->user();
                                @endphp
                                <a href="{{ route('member.images', $user->username) }}" class="t-link primary-menu__sub-link d-flex gap-2">
                                    <span class="d-inline-block xl-text lh-1">
                                        <i class="las la-user-circle"></i>
                                    </span>
                                    <span class="d-block flex-grow-1">
                                        @lang('My Profile')
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.logout') }}" class="t-link primary-menu__sub-link d-flex gap-2">
                                    <span class="d-inline-block xl-text lh-1">
                                        <i class="las la-sign-out-alt"></i>
                                    </span>
                                    <span class="d-block flex-grow-1">
                                        @lang('Logout')
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    
                    <li class="header-nav-list-item show-in-mbl header-button">
                        <a href="https://stocktemplate.webflow.io/apply-as-author"
                            class="btn-primary small width-100 w-button">Become an author</a>
                    </li>
                </ul>
            </nav>
            <div  class="w-commerce-commercecartwrapper cart-button-wrapper">
                <a href="#" data-node-type="commerce-cart-open-link"
                    class="w-commerce-commercecartopenlink cart-button w-inline-block" role="button"
                    aria-haspopup="dialog" aria-label="Open empty cart">
                    <div class="w-commerce-commercecartopenlinkcount cart-quantity">
                        0
                    </div>
                    <img src="{{ asset('assets/images/app_images/cart-icon-stock-x-webflow-template.svg') }}"
                        alt="Cart Icon - Stock X Webflow Template" class="cart-button-image" />
                </a>
                <div data-node-type="commerce-cart-container-wrapper" style="display: none"
                    class="w-commerce-commercecartcontainerwrapper w-commerce-commercecartcontainerwrapper--cartType-modal cart-wrapper">
                    <div data-node-type="commerce-cart-container" role="dialog"
                        class="w-commerce-commercecartcontainer cart-container">
                        <div class="w-commerce-commercecartheader cart-header">
                            <h4 class="w-commerce-commercecartheading">Your Cart</h4>
                            <a href="https://stocktemplate.webflow.io/home#"
                                data-node-type="commerce-cart-close-link"
                                class="w-commerce-commercecartcloselink cart-close-button w-inline-block"
                                role="button" aria-label="Close cart">
                                <div class="line-square-icon"></div>
                            </a>
                        </div>
                        <div class="w-commerce-commercecartformwrapper cart-form-wrapper">
                            <form data-node-type="commerce-cart-form" style="display: none" class="w-commerce-commercecartform">
                               <div class="w-commerce-commercecartlist cart-list"
                                    data-wf-collection="database.commerceOrder.userItems"
                                    data-wf-template-id="wf-template-3eb30cc8-f8c0-96b0-2736-77520990590c">
                                </div>
                                <div class="w-commerce-commercecartfooter cart-footer">
                                    <div aria-live="" aria-atomic="false"
                                        class="w-commerce-commercecartlineitem cart-line-item">
                                        <div class="cart-subtotal">Subtotal:</div>
                                        <div data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePrice%22%2C%22filter%22%3A%7B%22type%22%3A%22price%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.subtotal%22%7D%7D%5D"
                                            class="w-commerce-commercecartordervalue cart-subtotal-number">
                                        </div>
                                    </div>
                                    <div>
                                        <div data-node-type="commerce-cart-quick-checkout-actions" style="display: none">
                                            <a role="button" tabindex="0" aria-haspopup="dialog"  aria-label="Apple Pay"  data-node-type="commerce-cart-apple-pay-button"
                                                style="
                      background-image: -webkit-named-image(
                        apple-pay-logo-white
                      );
                      background-size: 100% 50%;
                      background-position: 50% 50%;
                      background-repeat: no-repeat;
                    "
                                                class="w-commerce-commercecartapplepaybutton pay-btn cart">
                                            </a><a role="button" tabindex="0" aria-haspopup="dialog"
                                                data-node-type="commerce-cart-quick-checkout-button"
                                                style="display: none"
                                                class="w-commerce-commercecartquickcheckoutbutton pay-btn cart"><svg
                                                    class="w-commerce-commercequickcheckoutgoogleicon"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="16" height="16" viewBox="0 0 16 16">
                                                    <defs>
                                                        <polygon id="google-mark-a"
                                                            points="0 .329 3.494 .329 3.494 7.649 0 7.649">
                                                        </polygon>
                                                        <polygon id="google-mark-c"
                                                            points=".894 0 13.169 0 13.169 6.443 .894 6.443">
                                                        </polygon>
                                                    </defs>
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path fill="#4285F4"
                                                            d="M10.5967,12.0469 L10.5967,14.0649 L13.1167,14.0649 C14.6047,12.6759 15.4577,10.6209 15.4577,8.1779 C15.4577,7.6339 15.4137,7.0889 15.3257,6.5559 L7.8887,6.5559 L7.8887,9.6329 L12.1507,9.6329 C11.9767,10.6119 11.4147,11.4899 10.5967,12.0469">
                                                        </path>
                                                        <path fill="#34A853"
                                                            d="M7.8887,16 C10.0137,16 11.8107,15.289 13.1147,14.067 C13.1147,14.066 13.1157,14.065 13.1167,14.064 L10.5967,12.047 C10.5877,12.053 10.5807,12.061 10.5727,12.067 C9.8607,12.556 8.9507,12.833 7.8887,12.833 C5.8577,12.833 4.1387,11.457 3.4937,9.605 L0.8747,9.605 L0.8747,11.648 C2.2197,14.319 4.9287,16 7.8887,16">
                                                        </path>
                                                        <g transform="translate(0 4)">
                                                            <mask id="google-mark-b" fill="#fff">
                                                                <use xlink:href="#google-mark-a"></use>
                                                            </mask>
                                                            <path fill="#FBBC04"
                                                                d="M3.4639,5.5337 C3.1369,4.5477 3.1359,3.4727 3.4609,2.4757 L3.4639,2.4777 C3.4679,2.4657 3.4749,2.4547 3.4789,2.4427 L3.4939,0.3287 L0.8939,0.3287 C0.8799,0.3577 0.8599,0.3827 0.8459,0.4117 C-0.2821,2.6667 -0.2821,5.3337 0.8459,7.5887 L0.8459,7.5997 C0.8549,7.6167 0.8659,7.6317 0.8749,7.6487 L3.4939,5.6057 C3.4849,5.5807 3.4729,5.5587 3.4639,5.5337"
                                                                mask="url(#google-mark-b)"></path>
                                                        </g>
                                                        <mask id="google-mark-d" fill="#fff">
                                                            <use xlink:href="#google-mark-c"></use>
                                                        </mask>
                                                        <path fill="#EA4335"
                                                            d="M0.894,4.3291 L3.478,6.4431 C4.113,4.5611 5.843,3.1671 7.889,3.1671 C9.018,3.1451 10.102,3.5781 10.912,4.3671 L13.169,2.0781 C11.733,0.7231 9.85,-0.0219 7.889,0.0001 C4.941,0.0001 2.245,1.6791 0.894,4.3291"
                                                            mask="url(#google-mark-d)"></path>
                                                    </g>
                                                </svg><svg
                                                    class="w-commerce-commercequickcheckoutmicrosofticon"
                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 16 16">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <polygon fill="#F05022" points="7 7 1 7 1 1 7 1">
                                                        </polygon>
                                                        <polygon fill="#7DB902"
                                                            points="15 7 9 7 9 1 15 1">
                                                        </polygon>
                                                        <polygon fill="#00A4EE"
                                                            points="7 15 1 15 1 9 7 9">
                                                        </polygon>
                                                        <polygon fill="#FFB700"
                                                            points="15 15 9 15 9 9 15 9">
                                                        </polygon>
                                                    </g>
                                                </svg>
                                                <div>Pay with browser.</div>
                                            </a>
                                        </div>
                                        <a href="https://stocktemplate.webflow.io/checkout"
                                            value="Continue to Checkout"
                                            data-node-type="cart-checkout-button"
                                            class="w-commerce-commercecartcheckoutbutton btn-primary"
                                            data-loading-text="Hang Tight...">Continue to Checkout</a>
                                    </div>
                                </div>
                            </form>
                            <div class="w-commerce-commercecartemptystate empty-state cart-empty">
                                <div class="mg-bottom-24px keep">No items found.</div>
                                <a href="https://stocktemplate.webflow.io/resources"
                                    class="btn-primary w-button">Browse resources</a>
                            </div>
                            <div aria-live="" style="display: none"
                                data-node-type="commerce-cart-error"
                                class="w-commerce-commercecarterrorstate error-message cart-error">
                                <div class="w-cart-error-msg"
                                    data-w-cart-quantity-error="Product is not available in this quantity."
                                    data-w-cart-general-error="Something went wrong when adding this item to the cart."
                                    data-w-cart-checkout-error="Checkout is disabled on this site."
                                    data-w-cart-cart_order_min-error="The order minimum was not met. Add more items to your cart to continue."
                                    data-w-cart-subscription_error-error="Before you purchase, please use your email invite to verify your address so we can send order updates.">
                                    Product is not available in this quantity.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <a href="https://stocktemplate.webflow.io/apply-as-author"
                class="btn-primary small header-btn-hidde-on-mb w-button">Become an author</a> --}}
            <div class="hamburger-menu-wrapper w-nav-button" style="-webkit-user-select: text"
                aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0"
                aria-haspopup="menu" aria-expanded="false">
                <div class="hamburger-menu-bar top"
                    style="
        transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1)
          rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
        transform-style: preserve-3d;
      ">
                </div>
                <div class="hamburger-menu-bar bottom"
                    style="
        transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1)
          rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
        transform-style: preserve-3d;
      ">
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <form action="{{ route('search') }}" method="GET" class="header-search-bar d-flex justify-content-center align-items-center" style="margin: 23px 0px 0px 0px;">
        <input name="type" type="hidden" value="image">
        <div id="desktop-search-bar">
            <div class="line-rounded-icon header-search-bar-icon desktop-search-icon" ></div>
            <label for="search-2" class="hidden-on-desktop">Search</label>
            <input type="text" class="input small search-header w-input" name="filter" placeholder="Search for resources…" id="header-search" required="" />
            {{-- <input type="submit" value="Search" class="hidden-on-desktop w-button" /> --}}
        </div>
    </form>
</div>
<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
</div>

@push('script')
    <script>
        (function($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "{{ route('home') }}/change/" + $(this).val();
            });
        })(jQuery);
    </script>
@endpush
