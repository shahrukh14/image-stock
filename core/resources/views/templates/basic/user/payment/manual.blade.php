@extends($activeTemplate . $masterBlade)
@section('content')
@if ($masterBlade == 'layouts.frontend')
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-9">
@endif
    <div class="card custom--card">
        <h5 class="card-header">{{ __($pageTitle) }}</h5>
        <div class="card-body">

            @if(auth()->check())

                <form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{ route('donation.manual.update') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="text-center mt-2">@lang('You have requested') <b class="text--success">{{ showAmount($data['amount']) }} {{ __($general->cur_text) }}</b> , @lang('Please pay')
                            <b class="text--success">{{ showAmount($data['final_amo']) . ' ' . $data['method_currency'] }} </b> @lang('for successful payment')
                        </p>
                        <h4 class="text-center mb-4">@lang('Please follow the instruction below')</h4>

                        <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>

                    </div>

                    <x-viser-form identifier="id" identifierValue="{{ $gateway->form_id }}" />

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn--base btn--lg w-100">@lang('Pay Now')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($masterBlade == 'layouts.frontend')
</div> </div> </div> </div>
@endif
@endsection

@push('script')
    <script>
        "use strict";
        $('form').find('.row').addClass('gy-3');
    </script>
@endpush
