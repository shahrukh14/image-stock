@php
    $content = getContent('footer.content', true);
    $socialIcons = getContent('social_icon.element', false, 4, true);
    $policies = getContent('policy_pages.element', false, 5, true);
    $categories = App\Models\Category::active()
        ->limit(5)
        ->get();
@endphp
{{-- @include($activeTemplate . 'partials.cookie') --}}

{{-- @if (!request()->routeIs(['search', 'user*']))
    <section>
        <div class="custom--container container">
            @php echo getAds('728x90', 2);@endphp
        </div>
    </section>
@endif --}}

<footer class="footer-wrapper" style="opacity: 1">
    <div class="container-default w-container">
        <div class="footer-top">
            <div class="w-layout-grid grid-footer-v1---3-columns">
                <div id="w-node-_3f6661a9-88e7-47bc-76df-590fa2612b6b-a2612b67"
                    class="inner-container _400px---tablet">
                    <div class="mg-bottom-24px">
                        <a href="#" class="footer-logo-wrapper w-inline-block">
                            <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="Logo - Stock X Webflow Template" class="footer-logo" />
                        </a>
                    </div>
                    <div class="w-layout-grid social-media-grid-top">
                        <a href="https://facebook.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="facebook social"></div>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="twitter social"></div>
                        </a>
                        <a href="https://instagram.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="instagram social"></div>
                        </a>
                        <a href="https://pinterest.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="pinterest social"></div>
                        </a>
                        <a href="https://linkedin.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="linkedIn social"></div>
                        </a>
                        <a href="https://youtube.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="youtube social"></div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="">
                        <ul role="list" class="pages-list-wrapper">
                            <li class="footer-list-item">
                                <a href="{{route('about')}}" class="pages-menu-link">About</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="{{route('contact')}}" class="pages-menu-link">Contact</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="{{route('blog.all')}}" class="pages-menu-link">Blog </a>
                            </li>
                            <li class="footer-list-item">
                                <a href="{{route('user.become.contributor.page')}}" class="pages-menu-link">Become a contributor</a>
                            </li>
                            {{-- <li class="footer-list-item">
                                <a href="{{route('upload.files')}}" class="pages-menu-link">Upload files</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div>
                    <ul role="list" class="pages-list-wrapper">
                        <li class="footer-list-item">
                            <a href="{{route('terms.and.condition')}}" class="pages-menu-link">Terms & Conditions</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="{{route('privacy.policy')}}" class="pages-menu-link">Privacy Policy</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="{{route('cookie.policy')}}" class="pages-menu-link">Cookie Policy</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="{{route('do.not.sell.personal.information')}}" class="pages-menu-link">Do not sell my personal information</a>
                        </li>
                    </ul>
                </div>
                <div id="w-node-_3f6661a9-88e7-47bc-76df-590fa2612bc6-a2612b67" class="inner-container _330px">
                    <div id="w-node-eef7d2cc-ec5c-4153-25c3-b25f1d762b8b-a2612b67"
                        class="inner-container _300px---mbl">
                        <div class="text-300 bold menu-title">Collections</div>
                        <div class="w-layout-grid grid-1-column gap-row-16px">
                            <a href="{{ route('photos') }}" class="blur-sibling-item text-decoration-none w-inline-block" style="opacity: 1">
                                <div class="flex-horizontal space-between gap-16px">
                                    <div class="image-wrapper footer-collection-icon photos">
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('photos') }}" class="blur-sibling-item text-decoration-none w-inline-block" style="opacity: 1">
                                <div class="flex-horizontal space-between gap-16px">
                                    <div class="image-wrapper footer-collection-icon vectors">
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('photos') }}" class="blur-sibling-item text-decoration-none w-inline-block" style="opacity: 1">
                                <div class="flex-horizontal space-between gap-16px">
                                    <div class="image-wrapper footer-collection-icon videos">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle footer-cta">
            <div class="w-layout-grid grid-footer-2-column---form---icon">
                <div class="flex-horizontal start flex-vertical---mbp">
                    <div class="footer-cta-icon">
                        <img src="{{ asset('assets\images\app_images\newsletter-icon-stock-x-webflow-template.svg') }}"
                            alt="Subscribe To Our Newsletter Icon - Stock X Webflow Template" /> 
                    </div>
                    <div>
                        <div class="heading-h4-size color-neutral-100 mg-bottom-8px">
                            Subscribe to get discount
                            <span class="text-no-wrap">and free images</span>
                        </div>
                    </div>
                </div>
                <div id="w-node-_1f3473f7-34d2-25ec-9f4e-99c81a58b3ea-a2612b67"
                    class="inner-container _484px width-100 _100---tablet">
                    <div class="input-and-button---form-block">
                        <form id="Footer-Form" name="wf-form-Footer-Form" action="{{route('user.subscribe')}}" data-name="Footer Form" method="post" data-wf-page-id="642ee44a50f54319d1b2f9b3" data-wf-element-id="3f6661a9-88e7-47bc-76df-590fa2612bfc" aria-label="Footer Form">
                            @csrf
                            <div class="position-relative">
                                <input type="email" class="input button-inside w-input" maxlength="256" name="email" data-name="Email" placeholder="Enter your email..." id="Footer-Email" required="" />
                                <input type="submit" value="Subscribe now" data-wait="Please wait..." id="w-node-_3f6661a9-88e7-47bc-76df-590fa2612bff-a2612b67" class="btn-primary inside-input default white-mb w-button" />
                            </div>
                        </form>
                        <div class="success-message color-neutral-100 w-form-done" tabindex="-1"
                            role="region" aria-label="Footer Form success">
                            <div class="flex-horizontal start">
                                <div class="line-rounded-icon success-message-check left">
                                    
                                </div>
                                <div>Thanks for joining our newsletter.</div>
                            </div>
                        </div>
                        <div class="error-message w-form-fail" tabindex="-1" role="region"
                            aria-label="Footer Form failure">
                            <div>Oops! Something went wrong.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="mg-bottom-0">
                Copyright © 2023. 
                <a href="#" target="_blank" class="text-link text-decoration-none">All Rights reserved .</a>
                <a href="{{ route('home') }}" target="_blank" class="text-link text-decoration-none">Greenstockpro.com</a>
            </p>
        </div>
    </div>
</footer>

      
