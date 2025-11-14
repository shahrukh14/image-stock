@extends($activeTemplate . 'layouts.master')
@section('content')
    <form action="{{ route('user.deposit.insert.image') }}" method="POST">
        @csrf
        @if (@$imageFile)
            <input name="image_file" type="hidden" value="{{ $imageFile->id }}">
            <input name="license" type="hidden" value="{{ $license }}">
            <input name="type" type="hidden" value="payment">
            <input name="final_amt" type="hidden" value="">
        @endif
        <input name="currency" type="hidden">
        <div class="card custom--card">
            <h5 class="card-header">
                @lang('Payment')
            </h5>
            <div class="card-body">
                @if (@$imageFile)
                    <p class="text-center">@lang('By purchasing this image you will be charged') @if($license == "standard")<span class="fw-bold">{{ $imageFile->price }}</span>@else <span class="fw-bold">{{ $imageFile->ex_price }}</span> @endif
                @endif
                <div class="form-group mb-3">
                    <label class="form-label required">@lang('Select Gateway')</label>
                    <div class="form--select">
                        <select class="form-select" name="gateway" required>
                            <option value="">@lang('Select One')</option>
                            @foreach ($gatewayCurrency as $data)
                                <option data-gateway="{{ $data }}" value="{{ $data->method_code }}" @selected(old('gateway') == $data->method_code)>
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">@lang('Amount')</label>
                    <div class="input-group input--group">
                        @php
                            $price = $license . '_price';
                        @endphp
                        <input class="form-control form--control" name="amount" type="number" @if($license == "standard") value="{{ getAmount($imageFile->price) }}" @else  value="{{ getAmount($imageFile->ex_price) }}" @endif step="any" readonly="true" required>
                     
                        <span class="input-group-text">{{ __($general->cur_text) }}</span>
                    </div>
                </div>
                <div class="mt-3 preview-details d-none">
                    <label class="form-label">@lang('Coupon Code')</label>
                    <div class="input-group input--group">
                        <input class="form-control form--control" name="coupon" type="text">
                        {{-- <span class="input-group-text">{{ __($general->cur_text) }}</span> --}}
                        <button class="btn btn--base" type="button" id="couponApply">Apply</button>
                    </div>
                    <span class="text-danger mx-1 d-none" id="errMsg">Invalid Code</span>
                    <ul class="list-group list-group-flush">
                        {{-- <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <span>@lang('Limit')</span>
                            <span><span class="min fw-bold">0</span> {{ __($general->cur_text) }} - <span class="max fw-bold">0</span> {{ __($general->cur_text) }}</span>
                        </li> --}}
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <span>@lang('Discount')</span>
                            <span><span class="fw-bold" id="discount">0</span> {{ __($general->cur_text) }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <span>@lang('Sales Tax')</span>
                            <span><span class="charge fw-bold">0</span> {{ __($general->cur_text) }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-wrap justify-content-between">
                            <span>@lang('Total')</span> <span><span class="payable fw-bold"> 0</span> {{ __($general->cur_text) }}</span>
                        </li>
                        <li class="list-group-item justify-content-between d-none rate-element">

                        </li>
                        <li class="list-group-item justify-content-between d-none in-site-cur">
                            <span>@lang('In') <span class="base-currency"></span></span>
                            <span class="final_amo fw-bold">0</span>
                        </li>
                        <li class="list-group-item justify-content-center crypto_currency d-none">
                            <span>@lang('Conversion with') <span class="method_currency"></span> @lang('and final value will Show on next step')</span>
                        </li>
                    </ul>
                </div>
                <button class="btn btn--base w-100 btn--lg mt-3" type="submit">@lang('Submit')</button>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('select[name=gateway]').change(function() {
                if (!$('select[name=gateway]').val()) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('select[name=gateway] option:selected').data('gateway');
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                if (resource.method.crypto == 1) {
                    var toFixedDigit = 8;
                    $('.crypto_currency').removeClass('d-none');
                } else {
                    var toFixedDigit = 2;
                    $('.crypto_currency').addClass('d-none');
                }
                $('.min').text(parseFloat(resource.min_amount).toFixed(2));
                $('.max').text(parseFloat(resource.max_amount).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }
                if (amount <= 0) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                $('.preview-details').removeClass('d-none');
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                if (resource.currency != '{{ $general->cur_text }}') {
                    var rateElement = `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{ __($general->cur_text) }} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                } else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input', function() {
                $('select[name=gateway]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });

            //Coupon Code Apply
            $('#couponApply').on('click', function(){
                var couponCode = $('input[name=coupon]').val();

                let data = {
                    coupon_code: couponCode,
                    coupon_for: 'photo',
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('user.coupon.apply') }}",
                    data: data,
                    success: function(response) {
                        if(response.status == 201){
                            $('#errMsg').removeClass('d-none')
                        }

                        if(response.coupon.type == 'amount'){
                            var currAmt = $('input[name=amount]').val();
                            var discount = response.coupon.discount;
                            var newAmt = currAmt - discount;
                            var discountText = parseFloat(discount).toFixed(2);
                            var resource = $('select[name=gateway] option:selected').data('gateway');
                            var fixed_charge = parseFloat(resource.fixed_charge);
                            var percent_charge = parseFloat(resource.percent_charge);
                            $('input[name=final_amt]').val(newAmt);
                            $('#discount').text(discountText);

                            var amount = parseFloat($('input[name=final_amt]').val());
                            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                            $('.charge').text(charge);
                            var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                            $('.payable').text(payable);

                        }else if(response.coupon.type == 'percent'){

                            var currAmt = $('input[name=amount]').val();
                            var discount = parseFloat(currAmt * response.coupon.discount / 100).toFixed(2);
                            var newAmt = currAmt - discount;
                            var discountText = parseFloat(discount).toFixed(2);
                            var resource = $('select[name=gateway] option:selected').data('gateway');
                            var fixed_charge = parseFloat(resource.fixed_charge);
                            var percent_charge = parseFloat(resource.percent_charge);
                            $('input[name=final_amt]').val(newAmt);
                            $('#discount').text(discountText);

                            var amount = parseFloat($('input[name=final_amt]').val());
                            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                            $('.charge').text(charge);
                            var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                            $('.payable').text(payable);

                        }
                    }
                });
            });

            $('input[name=coupon]').on('keyup', function(){
                $('#errMsg').addClass('d-none');
            });

            $('input[name=final_amt]').val($('input[name=amount]').val());
        })(jQuery);
    </script>
@endpush
