<div id="paymentModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Confirmation Alert!')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            @auth
                <form action="" method="POST" id="paymentForm">
                    @csrf
                    <div class="modal-body">
                        <input name="license" type="hidden">
                        <input name="image_file" type="hidden">
                        <div class="row gy-3">
                            <p class="plan-info text-center">You do not have a plan to download, you can purchase a plan first or download by paying through using options below</p>
                            <div class="form-group payment-info">
                                <label class="form-label required" for="payment_type">@lang('Payment Type')</label>
                                <div class="form--select">
                                    <select class="form-select" id="payment_type" name="payment_type" required readonly>
                                        <option value="direct" selected>@lang('Credit Card or Paypal')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btnBtn closeButton" data-bs-dismiss="modal" type="button">@lang('Close')</button>
                        <button class="buyNowButton planSubmitConfirm" type="submit">@lang('Buy Now') </button>
                        <button class="buyPackage" type="button">@lang('Buy Package') </button>
                    </div>
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

        .buyNowButton {
            background: url("/core/public/assets/image/buttons/buy button black.png") no-repeat;
            background-size: 100% 100%;
            padding: 6px 20px;
            color: transparent;
        }

        .buyNowButton:hover {
            background: url("/core/public/assets/image/buttons/buy button green.png") no-repeat;
            background-size: 100% 100%;
            padding: 6px 20px;
            color: transparent;
        }

        .buyPackage {
            background: url("/core/public/assets/image/buttons/buy package black.png") no-repeat;
            background-size: 100% 100%;
            padding: 6px 20px;
            color: transparent;
        }

        .buyPackage:hover {
            background: url("/core/public/assets/image/buttons/buy package green.png") no-repeat;
            background-size: 100% 100%;
            padding: 6px 20px;
            color: transparent;
        }

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
        $(document).on('click','.downloadByPayment', function () {
            var modal   = $('#paymentModal');
            let data    = $(this).data();
            modal.find('.question').text(`${data.question}`);
            modal.find('form').attr('action', `${data.action}`);
            modal.find('#type').val( `${data.type}`);
            modal.find('[name=image_file]').val(data.file);
            modal.find('[name=license]').val(data.type);
            // modal.modal('show');
            $("#paymentForm").submit();
        });

       $('.buyPackage').on('click',function(){
            const planPage = `{{route('price.details')}}`;
            window.location.href = planPage;
       })

    })(jQuery);
</script>
@endpush
