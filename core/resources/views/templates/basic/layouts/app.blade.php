<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>
    @include('partials.seo')
    <link href="{{ asset('assets/global/css/master_style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/css/custom.css') }}" rel="stylesheet">
  
    @stack('style-lib')
    @stack('style')

    <link href="{{ asset($activeTemplateTrue . 'css/color.php') }}?color={{ $general->base_color }}" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">

    {{-- <div class="preloader">
        <div class="preloader__img">
            <img src="{{ getImage(getFilePath('logoIcon') . '/favicon.png') }}" alt="@lang('Preloader')">
        </div>
    </div> --}}

    <div class="back-to-top">
        <span class="back-top">
            <i class="las la-angle-double-up"></i>
        </span>
    </div>

    @yield('panel')

    <script src="{{ asset('assets/global/js/jquery.min.js') }}"></script>

    @stack('script-lib')

    @stack('script')

    @include('partials.plugins')

    @include('partials.notify')

    @if (!request()->routeIs('user*'))
        @php echo $general->ads_script @endphp
    @endif
 </div>
</body>

</html>
