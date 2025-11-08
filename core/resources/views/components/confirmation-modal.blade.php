<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Confirmation Alert!')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="question"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btnBtn" data-bs-dismiss="modal">@lang('No')</button>
                    <button type="submit" class="btnBtn" data-bs-dismiss="modal">@lang('Yes')</button>
                </div>
            </form>
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
    </style>
@endpush

@push('script')
<script src="http://localhost/viserstock/assets/global/js/bootstrap.bundle.min.js"></script>
<script>
    (function ($) {
        "use strict";
        $(document).on('click','.confirmationBtn', function () {
            var modal   = $('#confirmationModal');
            let data    = $(this).data();
            modal.find('.question').text(`${data.question}`);
            modal.find('form').attr('action', `${data.action}`);
            modal.modal('show');
        });
    })(jQuery);
</script>
@endpush
