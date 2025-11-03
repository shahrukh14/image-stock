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
                    <li class="header-nav-list-item"><a href="#" class="header-nav-link w-nav-link"  style="max-width: 1364px">Search</a></li>
                    <li class="header-nav-list-item"><a href="{{ route('search')}}?type=image" class="header-nav-link w-nav-link" style="max-width: 1364px">Photos</a></li>
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
                                <a href=" " class="t-link primary-menu__sub-link d-flex gap-2">
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

                    
                    
                    {{-- <li class="header-nav-list-item">
                        <div data-hover="true" data-delay="0"
                            data-w-id="0f04fa47-b280-a98d-cbb1-756575b03618"
                            class="dropdown-wrapper w-dropdown" style="max-width: 1364px">
                            <div class="dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-0"
                                aria-controls="w-dropdown-list-0" aria-haspopup="menu"
                                aria-expanded="false" role="button" tabindex="0">
                                <div>Pages</div>
                                <div class="line-square-icon dropdown-arrow"
                                    style="
                transform: translate3d(0px, 0px, 0px)
                  scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg)
                  rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              ">
                                    
                                </div>
                            </div>
                            <nav class="dropdown-column-wrapper w-dropdown-list"
                                style="
              display: none;
              height: 0px;
              opacity: 0;
              transform: translate3d(-50%, 10px, 0px)
                scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg)
                rotateZ(0deg) skew(0deg, 0deg);
              transform-style: preserve-3d;
            "
                                id="w-dropdown-list-0" aria-labelledby="w-dropdown-toggle-0">
                                <div class="dropdown-pd">
                                    <div class="w-layout-grid grid-2-columns dropdown-nav-grid">
                                        <div>
                                            <div class="text-300 bold menu-title hidden-on-tablet">
                                                Pages
                                            </div>
                                            <div
                                                class="w-layout-grid grid-2-columns pages-columns-wrapper">
                                                <ul role="list" class="pages-list-wrapper">
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/"
                                                            class="pages-menu-link" tabindex="0">Home
                                                            (sales)</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/home"
                                                            aria-current="page"
                                                            class="pages-menu-link w--current"
                                                            tabindex="0">Home</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/about"
                                                            class="pages-menu-link"
                                                            tabindex="0">About</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/blog"
                                                            class="pages-menu-link"
                                                            tabindex="0">Blog</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/blog-category/resources"
                                                            class="pages-menu-link" tabindex="0">Blog
                                                            category</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/blog/76-free-lightroom-presets-you-can-download-to-save-time-on-photo-edit"
                                                            class="pages-menu-link" tabindex="0">Blog
                                                            post</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/upload-a-resource"
                                                            class="pages-menu-link" tabindex="0">Upload
                                                            resources</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/resources"
                                                            class="pages-menu-link"
                                                            tabindex="0">Resources</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/category/photography"
                                                            class="pages-menu-link"
                                                            tabindex="0">Resource
                                                            category</a>
                                                    </li>
                                                </ul>
                                                <ul role="list" class="pages-list-wrapper">
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/product/3d-render-of-beautiful-black-waves-background"
                                                            class="pages-menu-link"
                                                            tabindex="0">Resource
                                                            single</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/authors"
                                                            class="pages-menu-link"
                                                            tabindex="0">Authors</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/author/john-carter"
                                                            class="pages-menu-link" tabindex="0">Author
                                                            single</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/apply-as-author"
                                                            class="pages-menu-link" tabindex="0">Apply
                                                            as
                                                            author</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/contact"
                                                            class="pages-menu-link"
                                                            tabindex="0">Contact</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://stocktemplate.webflow.io/coming-soon"
                                                            class="pages-menu-link" tabindex="0">Coming
                                                            soon</a>
                                                    </li>
                                                    <li class="footer-list-item">
                                                        <a href="https://brixtemplates.com/more-webflow-templates"
                                                            target="_blank"
                                                            class="pages-menu-link featured"
                                                            tabindex="0">More Webflow Templates</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-300 bold menu-title hidden-on-tablet">
                                                Utility pages
                                            </div>
                                            <ul role="list" class="pages-list-wrapper">
                                                <li class="footer-list-item">
                                                    <a href="https://stocktemplate.webflow.io/template-pages/start-here"
                                                        class="pages-menu-link" tabindex="0">Start
                                                        here</a>
                                                </li>
                                                <li class="footer-list-item">
                                                    <a href="https://stocktemplate.webflow.io/template-pages/style-guide"
                                                        class="pages-menu-link" tabindex="0">Style
                                                        guide</a>
                                                </li>
                                                <li class="footer-list-item">
                                                    <a href="https://stocktemplate.webflow.io/404"
                                                        class="pages-menu-link" tabindex="0">404 not
                                                        found</a>
                                                </li>
                                                <li class="footer-list-item">
                                                    <a href="https://stocktemplate.webflow.io/401"
                                                        class="pages-menu-link" tabindex="0">Password
                                                        protected</a>
                                                </li>
                                                <li class="footer-list-item">
                                                    <a href="https://stocktemplate.webflow.io/template-pages/licenses"
                                                        class="pages-menu-link"
                                                        tabindex="0">Licenses</a>
                                                </li>
                                                <li class="footer-list-item">
                                                    <a href="https://stocktemplate.webflow.io/template-pages/changelog"
                                                        class="pages-menu-link"
                                                        tabindex="0">Changelog</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </li> --}}
                    <li class="header-nav-list-item show-in-mbl header-button">
                        <a href="https://stocktemplate.webflow.io/apply-as-author"
                            class="btn-primary small width-100 w-button">Become an author</a>
                    </li>
                </ul>
            </nav>
            <div data-node-type="commerce-cart-wrapper" data-open-product="" data-wf-cart-type="modal"
                data-wf-cart-query="query Dynamo2 {
database {
id
commerceOrder {
comment
extraItems {
name
pluginId
pluginName
price {
value
unit
decimalValue
string
}
}
id
startedOn
statusFlags {
hasDownloads
hasSubscription
isFreeOrder
requiresShipping
}
subtotal {
value
unit
decimalValue
string
}
total {
value
unit
decimalValue
string
}
updatedOn
userItems {
count
id
price {
value
unit
decimalValue
string
}
product {
id
cmsLocaleId
f__draft_0ht
f__archived_0ht
f_ec_product_type_2dr10dr {
id
name
}
f_name_
f_sku_properties_3dr {
id
name
enum {
  id
  name
  slug
}
}
fullSlug
}
rowTotal {
value
unit
decimalValue
string
}
sku {
cmsLocaleId
f__draft_0ht
f__archived_0ht
f_main_image_4dr {
url
file {
  size
  origFileName
  createdOn
  updatedOn
  mimeType
  width
  height
  variants {
    origFileName
    quality
    height
    width
    s3Url
    error
    size
  }
}
alt
}
f_sku_values_3dr {
property {
  id
}
value {
  id
}
}
id
}
subscriptionFrequency
subscriptionInterval
subscriptionTrial
}
userItemsCount
}
}
site {
id
commerce {
businessAddress {
country
}
defaultCountry
defaultCurrency
quickCheckoutEnabled
}
}
}
"
                data-wf-page-link-href-prefix=""
                class="w-commerce-commercecartwrapper cart-button-wrapper">
                <a href="#" data-node-type="commerce-cart-open-link"
                    class="w-commerce-commercecartopenlink cart-button w-inline-block" role="button"
                    aria-haspopup="dialog" aria-label="Open empty cart">
                    <div data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22Number%22%2C%22filter%22%3A%7B%22type%22%3A%22numberPrecision%22%2C%22params%22%3A%5B%220%22%2C%22numberPrecision%22%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItemsCount%22%7D%7D%5D"
                        class="w-commerce-commercecartopenlinkcount cart-quantity">
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
                            <form data-node-type="commerce-cart-form" style="display: none"
                                class="w-commerce-commercecartform">
                                <script
              type="text/x-wf-template"
              id="wf-template-3eb30cc8-f8c0-96b0-2736-77520990590c">
              %3Cdiv%20class%3D%22w-commerce-commercecartitem%20cart-item-wrapper%22%3E%3Cdiv%20class%3D%22cart-item-content---main%22%3E%3Ca%20data-wf-bindings%3D%22%255B%257B%2522dataWHref%2522%253A%257B%2522type%2522%253A%2522FullSlug%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.fullSlug%2522%257D%257D%255D%22%20href%3D%22%23%22%20class%3D%22cart-item-image-link%20w-inline-block%22%3E%3Cimg%20data-wf-bindings%3D%22%255B%257B%2522src%2522%253A%257B%2522type%2522%253A%2522ImageRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_main_image_4dr%2522%257D%257D%255D%22%20src%3D%22%22%20alt%3D%22%22%20class%3D%22w-commerce-commercecartitemimage%20image%20fit-cover%20w-dyn-bind-empty%22%2F%3E%3C%2Fa%3E%3Cdiv%20class%3D%22w-commerce-commercecartiteminfo%20cart-item-content%22%3E%3Ca%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_name_%2522%257D%257D%252C%257B%2522dataWHref%2522%253A%257B%2522type%2522%253A%2522FullSlug%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.fullSlug%2522%257D%257D%255D%22%20href%3D%22%23%22%20class%3D%22cart-list-title%20w-dyn-bind-empty%22%3E%3C%2Fa%3E%3Cdiv%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePrice%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522price%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.price%2522%257D%257D%255D%22%20class%3D%22cart-item-price%22%3E%24%C2%A00.00%C2%A0USD%3C%2Fdiv%3E%3Cscript%20type%3D%22text%2Fx-wf-template%22%20id%3D%22wf-template-3eb30cc8-f8c0-96b0-2736-775209905912%22%3E%253Cli%2520class%253D%2522cart-option-item%2522%253E%253Cspan%2520data-wf-bindings%253D%2522%25255B%25257B%252522innerHTML%252522%25253A%25257B%252522type%252522%25253A%252522PlainText%252522%25252C%252522filter%252522%25253A%25257B%252522type%252522%25253A%252522identity%252522%25252C%252522params%252522%25253A%25255B%25255D%25257D%25252C%252522dataPath%252522%25253A%252522database.commerceOrder.userItems%25255B%25255D.product.f_sku_properties_3dr%25255B%25255D.name%252522%25257D%25257D%25255D%2522%2520class%253D%2522w-dyn-bind-empty%2522%253E%253C%252Fspan%253E%253Cspan%253E%253A%2520%253C%252Fspan%253E%253Cspan%2520data-wf-bindings%253D%2522%25255B%25257B%252522innerHTML%252522%25253A%25257B%252522type%252522%25253A%252522CommercePropValues%252522%25252C%252522filter%252522%25253A%25257B%252522type%252522%25253A%252522identity%252522%25252C%252522params%252522%25253A%25255B%25255D%25257D%25252C%252522dataPath%252522%25253A%252522database.commerceOrder.userItems%25255B%25255D.product.f_sku_properties_3dr%25255B%25255D%252522%25257D%25257D%25255D%2522%2520class%253D%2522cart-item-result%2520w-dyn-bind-empty%2522%253E%253C%252Fspan%253E%253C%252Fli%253E%3C%2Fscript%3E%3Cul%20data-wf-bindings%3D%22%255B%257B%2522optionSets%2522%253A%257B%2522type%2522%253A%2522CommercePropTable%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%5B%5D%2522%257D%257D%252C%257B%2522optionValues%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_sku_values_3dr%2522%257D%257D%255D%22%20class%3D%22w-commerce-commercecartoptionlist%22%20data-wf-collection%3D%22database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%22%20data-wf-template-id%3D%22wf-template-3eb30cc8-f8c0-96b0-2736-775209905912%22%3E%3Cli%20class%3D%22cart-option-item%22%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D.name%2522%257D%257D%255D%22%20class%3D%22w-dyn-bind-empty%22%3E%3C%2Fspan%3E%3Cspan%3E%3A%20%3C%2Fspan%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D%2522%257D%257D%255D%22%20class%3D%22cart-item-result%20w-dyn-bind-empty%22%3E%3C%2Fspan%3E%3C%2Fli%3E%3C%2Ful%3E%3Ca%20href%3D%22%23%22%20role%3D%22%22%20data-wf-bindings%3D%22%255B%257B%2522data-commerce-sku-id%2522%253A%257B%2522type%2522%253A%2522ItemRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.id%2522%257D%257D%255D%22%20class%3D%22text-link%20w-inline-block%22%20data-wf-cart-action%3D%22remove-item%22%20data-commerce-sku-id%3D%22%22%20aria-label%3D%22Remove%20item%20from%20cart%22%3E%3Cdiv%20class%3D%22cart-remove-link%22%3ERemove%3C%2Fdiv%3E%3C%2Fa%3E%3C%2Fdiv%3E%3C%2Fdiv%3E%3Cinput%20type%3D%22number%22%20data-wf-bindings%3D%22%255B%257B%2522value%2522%253A%257B%2522type%2522%253A%2522Number%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522numberPrecision%2522%252C%2522params%2522%253A%255B%25220%2522%252C%2522numberPrecision%2522%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.count%2522%257D%257D%252C%257B%2522data-commerce-sku-id%2522%253A%257B%2522type%2522%253A%2522ItemRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.id%2522%257D%257D%255D%22%20data-wf-conditions%3D%22%257B%2522condition%2522%253A%257B%2522fields%2522%253A%257B%2522product%253Aec-product-type%2522%253A%257B%2522ne%2522%253A%2522e348fd487d0102946c9179d2a94bb613%2522%252C%2522type%2522%253A%2522Option%2522%257D%257D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D%2522%257D%22%20class%3D%22w-commerce-commercecartquantity%20input%20cart-quantity-input%22%20required%3D%22%22%20pattern%3D%22%5E%5B0-9%5D%2B%24%22%20inputMode%3D%22numeric%22%20name%3D%22quantity%22%20autoComplete%3D%22off%22%20data-wf-cart-action%3D%22update-item-quantity%22%20data-commerce-sku-id%3D%22%22%20value%3D%221%22%2F%3E%3C%2Fdiv%3E
            </script>
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
                                        <div data-node-type="commerce-cart-quick-checkout-actions"
                                            style="display: none">
                                            <a role="button" tabindex="0" aria-haspopup="dialog"
                                                aria-label="Apple Pay"
                                                data-node-type="commerce-cart-apple-pay-button"
                                                style="
                      background-image: -webkit-named-image(
                        apple-pay-logo-white
                      );
                      background-size: 100% 50%;
                      background-position: 50% 50%;
                      background-repeat: no-repeat;
                    "
                                                class="w-commerce-commercecartapplepaybutton pay-btn cart">
                                                <div></div>
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
    <form action="javascript:void(0)" class="header-search-bar d-flex justify-content-center align-items-center" style="margin: 23px 0px 0px 0px;">
        <div id="desktop-search-bar">
        <div class="line-rounded-icon header-search-bar-icon desktop-search-icon" ></div>
        <label for="search-2" class="hidden-on-desktop">Search</label><input type="search"
            class="input small search-header w-input" maxlength="256" name="query"
            placeholder="Search for resources…" id="header-search" required="" />
            <input type="submit" value="Search" class="hidden-on-desktop w-button" />
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
