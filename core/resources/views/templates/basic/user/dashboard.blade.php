@extends($activeTemplate . 'layouts.master')
@section('content')
    @if ($general->kv && auth()->user()->kv != 1)
        @php
            $kycInstruction = getContent('kyc_instruction.content', true);
        @endphp
        <div class="row mb-3">
            <div class="container">
                <div class="row">
                    @if (auth()->user()->kv == 0)
                        <div class="col-12">
                            <div class="alert alert-info mb-0" role="alert">
                                <h5 class="alert-heading m-0">@lang('KYC Verification Required')</h5>
                                <hr>
                                <p class="mb-0"> {{ __($kycInstruction->data_values->verification_instruction) }} <a href="{{ route('user.kyc.form') }}">@lang('Click Here to Verify')</a></p>
                            </div>
                        </div>
                    @elseif(auth()->user()->kv == 2)
                        <div class="col-12">
                            <div class="alert alert-warning mb-0" role="alert">
                                <h5 class="alert-heading m-0">@lang('KYC Verification pending')</h5>
                                <hr>
                                <p class="mb-0"> {{ __($kycInstruction->data_values->pending_instruction) }} <a href="{{ route('user.kyc.data') }}">@lang('See KYC Data')</a></p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="row g-4 g-lg-3 g-xxl-4">
        <div class="col-sm-6 col-md-4">
            <div class="dashboard-widget">
                <div class="dashboard-widget__icon">
                    <i class="las la-wallet"></i>
                </div>
                <div class="dashboard-widget__content">
                    <span class="dashboard-widget__title">
                        @lang('Balance')
                    </span>
                    <h4 class="dashboard-widget__amount">
                        {{ $general->cur_sym . showAmount($user->balance) }}
                    </h4>
                </div>
                <span class="dashboard-widget__overlay-icon">
                    <i class="las la-wallet"></i>
                </span>
            </div>
        </div>

        {{-- <div class="col-sm-6 col-md-4">
            <div class="dashboard-widget">
                <div class="dashboard-widget__icon">
                    <i class="las la-file-invoice-dollar"></i>
                </div>
                <div class="dashboard-widget__content">
                    <span class="dashboard-widget__title">
                        @lang('Deposit')
                    </span>
                    <h4 class="dashboard-widget__amount">
                        {{ $general->cur_sym . showAmount($user->deposits->where('status', Status::PAYMENT_SUCCESS)->sum('amount')) }}
                    </h4>
                </div>
                <span class="dashboard-widget__overlay-icon">
                    <i class="las la-file-invoice-dollar"></i>
                </span>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-4">
            <div class="dashboard-widget">
                <div class="dashboard-widget__icon">
                    <i class="las la-credit-card"></i>
                </div>
                <div class="dashboard-widget__content">
                    <span class="dashboard-widget__title">
                        @lang('Withdraw')
                    </span>
                    <h4 class="dashboard-widget__amount">
                        {{ $general->cur_sym . showAmount($user->withdrawals->where('status', Status::PAYMENT_SUCCESS)->sum('amount')) }}
                    </h4>
                </div>
                <span class="dashboard-widget__overlay-icon">
                    <i class="las la-credit-card"></i>
                </span>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="dashboard-widget">
                <div class="dashboard-widget__icon">
                    <i class="las la-credit-card"></i>
                </div>
                <div class="dashboard-widget__content">
                    <span class="dashboard-widget__title">
                        @lang('Referral Bonus')
                    </span>
                    <h4 class="dashboard-widget__amount">
                        {{ $general->cur_sym . showAmount($user->referralLogs->sum('amount')) }}
                    </h4>
                </div>
                <span class="dashboard-widget__overlay-icon">
                    <i class="las la-credit-card"></i>
                </span>
            </div>
        </div> --}}

        <div class="col-sm-6 col-md-4">
            <div class="dashboard-widget">
                <div class="dashboard-widget__icon">
                    <i class="las la-money-bill-wave-alt"></i>
                </div>
                <div class="dashboard-widget__content">
                    <span class="dashboard-widget__title">
                        @lang('Earnings')
                    </span>
                    <h4 class="dashboard-widget__amount">
                        {{ $general->cur_sym . showAmount($user->earningLogs->sum('amount')) }}
                    </h4>
                </div>
                <span class="dashboard-widget__overlay-icon">
                    <i class="las la-money-bill-wave-alt"></i>
                </span>
            </div>
        </div>
        
        {{-- <div class="col-sm-6 col-md-4">
            <div class="dashboard-widget">
                <div class="dashboard-widget__icon">
                    <i class="las la-images"></i>
                </div>
                <div class="dashboard-widget__content">
                    <span class="dashboard-widget__title">
                        @lang('Resources')
                    </span>
                    <h4 class="dashboard-widget__amount">
                        {{ shortNumber($user->allImages->count()) }}
                    </h4>
                </div>
                <span class="dashboard-widget__overlay-icon">
                    <i class="las la-images"></i>
                </span>
            </div>
        </div> --}}

        @if ($user->purchasedPlan)
            <h5 class="mb-0">@lang('Purchased Plan Details')</h5>
            <div class="col-sm-6 col-md-4">
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="las la-box"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <span class="dashboard-widget__title">
                            {{ __(@$user->purchasedPlan->plan->name) }} @lang('Plan')
                        </span>
                        <p class="dashboard-widget__amount">
                            @lang('Expiry date : ') {{ showDateTime($user->purchasedPlan->expired_at, 'd M, Y') }}
                        </p>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                        <i class="las la-box"></i>
                    </span>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="las la-download"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <span class="dashboard-widget__title">
                            @lang('Downloads Available')
                        </span>
                        <h4 class="dashboard-widget__amount">
                            {{-- <span data-bs-toggle="tooltip" data-bs-title="@lang('Today\'s download')">{{ @$user->downloads()->whereDate('created_at', now())->count() }}</span> / <span data-bs-toggle="tooltip" data-bs-title="@lang('Daily download limit')">{{ $user->purchasedPlan->daily_limit }}</span> --}}
                            <span data-bs-toggle="tooltip" data-bs-title="@lang('Downloads Available')">{{ $user->purchasedPlan->daily_limit - $user->downloads()->whereDate('created_at', now())->count() }}</span>
                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                        <i class="las la-download"></i>
                    </span>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-4">
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="las la-download"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <span class="dashboard-widget__title">
                            @lang('Monthly Download Limit')
                        </span>
                        <h4 class="dashboard-widget__amount">
                            <span data-bs-toggle="tooltip" data-bs-title="@lang('This month\'s download')"> {{ shortNumber(@$user->downloads()->whereDate('created_at', '>=', now())->count()) }}</span> / <span data-bs-toggle="tooltip" data-bs-title="@lang('Monthly download limit')">{{ shortNumber($user->purchasedPlan->monthly_limit) }}</span>
                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                        <i class="las la-download"></i>
                    </span>
                </div>
            </div> --}}
        @endif

        <h5 class="mb-0">@lang('Earning Last 30 Days')</h5>
        <div class="col-12">
            <div class="card custom--card">
                <div class="card-body p-0">
                    <div id="earningLogChart"> </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('assets/admin_reviewer/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin_reviewer/js/vendor/chart.js.2.8.0.js') }}"></script>

    <script>
        "use strict";

        // apex-line chart
        var options = {
            chart: {
                height: 450,
                type: "area",
                toolbar: {
                    show: false
                },
                dropShadow: {
                    enabled: true,
                    enabledSeries: [0],
                    top: -2,
                    left: 0,
                    blur: 10,
                    opacity: 0.08
                },
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                }

            },
            dataLabels: {
                enabled: false
            },
            colors: ['#{{ $general->base_color }}'],
            series: [{
                name: "Earnings",
                data: [
                    @foreach ($report['date'] as $earningDate)
                        {{ @$earningMonth->where('date', $earningDate)->first()->totalAmount ?? 0 }},
                    @endforeach
                ]
            }],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: [
                    @foreach ($report['date'] as $earningDate)
                        "{{ $earningDate }}",
                    @endforeach
                ]
            },
            grid: {
                padding: {
                    left: 5,
                    right: 5
                },
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                colors: ['#{{ $general->base_color }}']
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "{{ __($general->cur_sym) }}" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#earningLogChart"), options);
        chart.render();
    </script>
@endpush
