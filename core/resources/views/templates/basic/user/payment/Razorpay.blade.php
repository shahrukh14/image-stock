@extends($activeTemplate . $masterBlade)

@section('content')
    @if ($masterBlade == 'layouts.frontend')
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-9">
    @endif
    <div class="card custom--card">
        <h5 class="card-header">@lang('Razorpay')</h5>
        <div class="card-body">
            <ul class="list-group text-center">
                <li class="list-group-item d-flex flex-wrap justify-content-between">
                    @lang('You have to pay '):
                    <strong>{{ showAmount($deposit->final_amo) }} {{ __($deposit->method_currency) }}</strong>
                </li>
                <li class="list-group-item d-flex flex-wrap justify-content-between">
                    @lang('You will get '):
                    <strong>{{ showAmount($deposit->amount) }} {{ __($general->cur_text) }}</strong>
                </li>
            </ul>
            <form action="{{ $data->url }}" method="{{ $data->method }}">
                <input name="hidden" type="hidden" custom="{{ $data->custom }}">
                <script src="{{ $data->checkout_js }}" @foreach ($data->val as $key => $value)
                    data-{{ $key }}="{{ $value }}" @endforeach></script>
            </form>
        </div>
    </div>
    @if ($masterBlade == 'layouts.frontend')
        </div>
        </div>
        </div>
        </div>
    @endif
@endsection


@push('script')
    <script>
        (function($) {
            "use strict";
            $('input[type="submit"]').addClass("mt-4 btn btn--base btn--lg w-100");
        })(jQuery);
    </script>
@endpush
