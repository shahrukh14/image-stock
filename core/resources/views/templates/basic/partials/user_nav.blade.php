@php
    $user = auth()->user();
@endphp
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar__nav-toggle">
        <span class="dashboard-sidebar__nav-toggle-text">@lang('My Account')</span>
        <button class="btn dashboard-sidebar__nav-toggle-btn" type="button">
            <i class="las la-bars"></i>
        </button>
    </div>
    <div class="dashboard-menu">
        <div class="dashboard-menu__head">
            <span class="dashboard-menu__head-text"> @lang('My Account') </span>
            <button class="btn dashboard-menu__head-close" type="button">
                <i class="las la-times"></i>
            </button>
        </div>
        <div class="dashboard-menu__body" data-simplebar>
            <div class="profile">
                <div class="profile__bg" id="profileCoverImage" style="background-image: url('{{ getImage(getFilePath('userProfile') . '/' . $user->cover_photo, null, 'cover-photo') }}');">
                </div>
                <div class="profile__user">
                    <img class="profile__img" id="showProfileImage" src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, null, 'user') }}" alt="@lang('image')">
                </div>
            </div>
            <ul class="list dashboard-menu__list">
                <li>
                    <a class="dashboard-menu__link {{ menuActive('user.home') }}" href="{{ route('user.home') }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-home"></i>
                        </span>
                        <span class="dashboard-menu__text"> @lang('Dashboard') </span>
                    </a>
                </li>

                <li>
                    <div class="accordion" id="helpDesk">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#account" type="button" aria-expanded="false">
                                    <span class="accordion-button__icon">
                                        <i class="las la-address-card"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        @lang('Account')
                                    </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="account" data-bs-parent="#helpDesk">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a class="dashboard-menu__inner-link" href="{{ route('member.images', $user->username) }}">
                                                @lang('Profile Settings')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.change.password') }}" href="{{ route('user.change.password') }}">
                                                @lang('Change Password')
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.twofactor') }}" href="{{ route('user.twofactor') }}">
                                                @lang('2FA Security')
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <a class="dashboard-menu__link {{ menuActive('user.collection.all') }}" href="{{ route('user.collection.all') }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-folder-plus"></i>
                        </span>
                        <span class="dashboard-menu__text"> @lang('Collections') </span>
                    </a>
                </li>

                <li>
                    <a class="dashboard-menu__link {{ menuActive('user.download.history') }}" href="{{ route('user.download.history') }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-cloud-download-alt"></i>
                        </span>
                        <span class="dashboard-menu__text"> @lang('My Downloads') </span>
                    </a>
                </li>
                <li>
                    <a class="dashboard-menu__link {{ menuActive('user.purchase.history') }}" href="{{ route('user.purchase.history') }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-history"></i>
                        </span>
                        <span class="dashboard-menu__text"> @lang('Purchase History') </span>
                    </a>
                </li>

                @if(auth()->user()->role == 1)
                <li>
                    <a class="dashboard-menu__link {{ menuActive('user.become.contributor.page') }}" href="{{ route('user.become.contributor.page') }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-cloud-upload-alt"></i>
                        </span>
                        <span class="dashboard-menu__text"> @lang('Become a contributor') </span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role == 2)
                <li>
                    <div class="accordion" id="images">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#imageCollapse" type="button" aria-expanded="false">
                                    <span class="accordion-button__icon">
                                        <i class="las la-image"></i>
                                    </span>
                                    <span class="accordion-button__text"> @lang('Manage Photos') </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="imageCollapse" data-bs-parent="#images">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.image.add') }}" href="{{ route('user.image.add') }}">
                                                @lang('Upload Photos')
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.image.pending') }}" href="{{ route('user.image.pending') }}">
                                                @lang('Pending Photos')
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.image.rejected') }}" href="{{ route('user.image.rejected') }}">
                                                @lang('Rejected Photos')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.image.approved') }}" href="{{ route('user.image.approved') }}">
                                                @lang('Approved Photos')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.image.all') }}" href="{{ route('user.image.all') }}">
                                                @lang('All Photos')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="accordion" id="vector">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vectorCollapse" type="button" aria-expanded="false">
                                    <span class="accordion-button__icon">
                                        <i class="las la-image"></i>
                                    </span>
                                    <span class="accordion-button__text"> @lang('Manage Vectors & Graphics') </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="vectorCollapse" data-bs-parent="#vector">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.vector.add') }}" href="{{ route('user.vector.add') }}">
                                                @lang('Upload Vector & Graphics')
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.vector.pending') }}" href="{{ route('user.vector.pending') }}">
                                                @lang('Pending vectors & Graphics')
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.vector.rejected') }}" href="{{ route('user.vector.rejected') }}">
                                                @lang('Rejected Vectors & Graphics')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.vector.approved') }}" href="{{ route('user.vector.approved') }}">
                                                @lang('Approved vectors & Graphics')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.vector.all') }}" href="{{ route('user.vector.all') }}">
                                                @lang('All Vectors & Graphics')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="accordion" id="video">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#videoCollapse" type="button" aria-expanded="false">
                                    <span class="accordion-button__icon">
                                        <i class="las la-image"></i>
                                    </span>
                                    <span class="accordion-button__text"> @lang('Manage Videos') </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="videoCollapse" data-bs-parent="#video">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.video.add') }}" href="{{ route('user.video.add') }}">
                                                @lang('Upload Videos')
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.video.pending') }}" href="{{ route('user.video.pending') }}">
                                                @lang('Pending Videos')
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.video.rejected') }}" href="{{ route('user.video.rejected') }}">
                                                @lang('Rejected Videos')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.video.approved') }}" href="{{ route('user.video.approved') }}">
                                                @lang('Approved Videos')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.video.all') }}" href="{{ route('user.video.all') }}">
                                                @lang('All Videos')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                <li>
                    <div class="accordion" id="finances">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#financeCollapse" type="button" aria-expanded="false">
                                    <span class="accordion-button__icon">
                                        <i class="las la-wallet"></i>
                                    </span>
                                    <span class="accordion-button__text"> @lang('Finances') </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="financeCollapse" data-bs-parent="#finances">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.deposit.index') }}" href="{{ route('user.deposit.index') }}">
                                                @lang('Deposit')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.deposit.history') }}" href="{{ route('user.deposit.history') }}">
                                                @lang('Deposit History')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.withdraw') }}" href="{{ route('user.withdraw') }}">
                                                @lang('Withdraw')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.withdraw.history') }}" href="{{ route('user.withdraw.history') }}">
                                                @lang('Withdraw History')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.transactions') }}" href="{{ route('user.transactions') }}">
                                                @lang('Transactions')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.earning.log') }}" href="{{ route('user.earning.log') }}">
                                                @lang('Earning Logs')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('user.donation.history') }}" href="{{ route('user.donation.history') }}">
                                                @lang('Donation Logs')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @if ($general->referral_system)
                    <li>
                        <div class="accordion" id="referrals">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#referral" type="button" aria-expanded="false">
                                        <span class="accordion-button__icon">
                                            <i class="las la-tree"></i>
                                        </span>
                                        <span class="accordion-button__text">
                                            @lang('Referrals')
                                        </span>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="referral" data-bs-parent="#referrals">
                                    <div class="accordion-body">
                                        <ul class="list dashboard-menu__inner">
                                            <li>
                                                <a class="dashboard-menu__inner-link {{ menuActive('user.referral.all') }}" href="{{ route('user.referral.all') }}">
                                                    @lang('Referrals')
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dashboard-menu__inner-link {{ menuActive('user.referral.log') }}" href="{{ route('user.referral.log') }}">
                                                    @lang('Referral Log')
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
                <li>
                    <div class="accordion" id="images">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#supportTicket" type="button" aria-expanded="false">
                                    <span class="accordion-button__icon">
                                        <i class="las la-headset"></i>
                                    </span>
                                    <span class="accordion-button__text"> @lang('Support Tickets') </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="supportTicket" data-bs-parent="#images">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive('ticket.open') }}" href="{{ route('ticket.open') }}">
                                                @lang('Create New')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dashboard-menu__inner-link {{ menuActive(['ticket.index', 'ticket.view']) }}" href="{{ route('ticket.index') }}">
                                                @lang('Ticket List')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
         
            </ul>

        </div>
    </div>
</div>
