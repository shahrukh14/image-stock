<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a class="sidebar__main-logo" href="{{ route('reviewer.dashboard') }}"><img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="@lang('image')"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{ menuActive('reviewer.dashboard') }}">
                    <a class="nav-link" href="{{ route('reviewer.dashboard') }}">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('reviewer.images.pending') }}">
                    <a class="nav-link" href="{{ route('reviewer.images.pending') }}">
                        <i class="menu-icon las la-spinner"></i>
                        <span class="menu-title">@lang('Pending Images')</span>
                        @if ($pendingPhoto)
                            <span class="menu-badge pill bg--danger ms-auto">{{ $pendingPhoto }}</span>
                        @endif
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('reviewer.images.approved') }}">
                    <a class="nav-link" href="{{ route('reviewer.images.approved') }}">
                        <i class="menu-icon las la-check-circle"></i>
                        <span class="menu-title">@lang('Approved Images')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{ menuActive('reviewer.images.rejected') }}">
                    <a class="nav-link" href="{{ route('reviewer.images.rejected') }}">
                        <i class="menu-icon las la-times-circle"></i>
                        <span class="menu-title">@lang('Rejected Images')</span>
                    </a>
                </li>
            </ul>
            <div class="text-uppercase mb-3 text-center">
                <span class="text--primary">{{ __(systemDetails()['name']) }}</span>
                <span class="text--success">@lang('V'){{ systemDetails()['version'] }} </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
    <script>
        if ($('li').hasClass('active')) {
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            }, 500);
        }
    </script>
@endpush
