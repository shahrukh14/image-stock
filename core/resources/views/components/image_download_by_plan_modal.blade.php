
<div id="downloadModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Confirmation Alert!')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            @auth
                @php
                    $user = auth()->user();
                @endphp
                <form action="" method="POST">
                    @csrf
                    @if($user->purchasedPlan && ($user->purchasedPlan->daily_limit - $user->downloads()->whereDate('created_at', now())->count()) == 0)
                        <div class="modal-body">
                            <h4> You have already used your download limit </h4>
                            <p>Please purchase another package</p>
                        </div>
                        <div class="modal-footer">
                           <button class="buyPackage" type="button">@lang('Buy Package') </button>
                        </div>
                    @else
                        <div class="modal-body">
                            <h4> Download by your current Plan </h4>
                            {{-- <p class="question"></p> --}}
                        </div>
                        <input type="hidden" id="type" name="type" value="">
                        <div class="modal-footer">
                            <button type="button" class="btnBtn" data-bs-dismiss="modal">@lang('No')</button>
                            <button type="submit" class="btnBtn" data-bs-dismiss="modal">@lang('Yes')</button>
                        </div>
                    @endif
                </form>
            @else
                <div class="modal-body">
                    <h4 style="text-align: center">@lang('Please login to download')</h4>
                </div>
                <div class="modal-footer">
                    <a class="btnBtn" href="{{ route('user.login') }}">Login</a>
                </div>
            @endauth
        </div>
    </div>
</div>

@push('style')
    <style>
        .btnBtn{
            padding: 2px 10px;
            border-radius: 20px;
            border: 2px solid #000 !important;
            text-decoration: none;
        }
        .form--select .form-select {
            height: 45px;
            border-radius: 3px;
            padding-right: 46px;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid;
            background: hsl(var(--light)/0.3);
            color: hsl(var(--heading));
        }
        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
@endpush

@push('script')
<script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
<script>
    (function ($) {
        "use strict";
        $(document).on('click','.downloadByPlan', function () {
            var modal   = $('#downloadModal');
            let data    = $(this).data();
            modal.find('.question').text(`${data.question}`);
            modal.find('form').attr('action', `${data.action}`);
            modal.find('#type').val( `${data.type}`);
            modal.find('[name=image_file]').val(data.file);
            modal.find('[name=license]').val(data.type);
            modal.modal('show');
        });
    })(jQuery);
</script>
@endpush
