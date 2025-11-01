@extends($activeTemplate . $masterBlade)
@section('content')
@if ($masterBlade == 'layouts.frontend')
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-9">
@endif
<div class="card custom--card">
        <h5 class="card-header">@lang('Paystack')</h5>
    <div class="card-body">
        <form action="{{ route('ipn.'.$deposit->gateway->alias) }}" method="POST" class="text-center">
            @csrf
            <ul class="list-group text-center">
                <li class="list-group-item d-flex flex-wrap justify-content-between">
                    @lang('You have to pay '):
                    <strong>{{showAmount($deposit->final_amo)}} {{__($deposit->method_currency)}}</strong>
                </li>
                <li class="list-group-item d-flex flex-wrap justify-content-between">
                    @lang('You will get '):
                    <strong>{{showAmount($deposit->amount)}}  {{__($general->cur_text)}}</strong>
                </li>
            </ul>
            <button type="button" class="btn btn--base w-100 mt-3" id="btn-confirm">@lang('Pay Now')</button>
            <script
                src="//js.paystack.co/v1/inline.js"
                data-key="{{ $data->key }}"
                data-email="{{ $data->email }}"
                data-amount="{{ round($data->amount) }}"
                data-currency="{{$data->currency}}"
                data-ref="{{ $data->ref }}"
                data-custom-button="btn-confirm"
            >
            </script>
        </form>
    </div>
</div>
@if ($masterBlade == 'layouts.frontend')
</div> </div> </div> </div>
@endif
@endsection
