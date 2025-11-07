@extends($activeTemplate . 'layouts.app')
@section('panel')
    @include($activeTemplate . 'partials.header')
    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset($activeTemplateTrue . 'css/main.css') }}" rel="stylesheet">
    <link href="{{ asset($activeTemplateTrue . 'css/custom.css') }}" rel="stylesheet">
    <div class="dashboard-section">
        <div class="section">
            <div class="container">
                <div class="row g-4 gy-lg-0">
                    <div class="col-lg-4 col-xl-3">
                        @include($activeTemplate . 'partials.user_nav')
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('modal')
    @include($activeTemplate . 'partials.footer')

@endsection
@push('script')
<script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset($activeTemplateTrue . 'js/slick.js') }}"></script>
<script src="{{ asset($activeTemplateTrue . 'js/app.js') }}"></script>
@endpush
