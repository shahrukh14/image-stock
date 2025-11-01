@extends('admin.layouts.app')

@section('panel')
    @if (@json_decode($general->system_info)->version > systemDetails()['version'])
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-warning mb-3 text-white">
                    <div class="card-header">
                        <h3 class="card-title"> @lang('New Version Available') <button class="btn btn--dark float-end">@lang('Version') {{ json_decode($general->system_info)->version }}</button> </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">@lang('What is the Update?')</h5>
                        <p>
                            <pre class="f-size--24">{{ json_decode($general->system_info)->details }}</pre>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (@json_decode($general->system_info)->message)
        <div class="row">
            @foreach (json_decode($general->system_info)->message as $msg)
                <div class="col-md-12">
                    <div class="alert border--primary border" role="alert">
                        <div class="alert__icon bg--primary">
                            <i class="far fa-bell"></i>
                        </div>
                        <p class="alert__message">@php echo $msg; @endphp</p>
                        <button class="close" data-bs-dismiss="alert" type="button" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                    </div>
                </div>
        </div>
    @endforeach
    </div>
    @endif

    <div class="row gy-4">
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $widget['total_users'] }}" title="Total Users" link="{{ route('admin.users.all') }}" icon="las la-users f-size--56" bg="primary" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $widget['verified_users'] }}" title="Active Users" link="{{ route('admin.users.active') }}" icon="las la-user-check f-size--56" bg="success" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $widget['email_unverified_users'] }}" title="Email Unverified Users" link="{{ route('admin.users.email.unverified') }}" icon="lar la-envelope f-size--56" bg="danger" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $widget['mobile_unverified_users'] }}" title="Mobile Unverified Users" link="{{ route('admin.users.mobile.unverified') }}" icon="las la-comment-slash f-size--56" bg="red" />
        </div>
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $general->cur_sym }}{{ showAmount($deposit['total_deposit_amount']) }}" title="Total Deposited" style="2" link="{{ route('admin.deposit.list') }}" icon="las la-hand-holding-usd" icon_style="false" color="success" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $deposit['total_deposit_pending'] }}" title="Pending Deposits" style="2" link="{{ route('admin.deposit.pending') }}" icon="las la-spinner" icon_style="false" color="warning" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $deposit['total_deposit_rejected'] }}" title="Rejected Deposits" style="2" link="{{ route('admin.deposit.rejected') }}" icon="las la-ban" icon_style="false" color="danger" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $general->cur_sym }}{{ showAmount($deposit['total_deposit_charge']) }}" title="Deposited Charge" style="2" link="{{ route('admin.deposit.list') }}" icon="las la-percentage" icon_style="false" color="primary" />
        </div>
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $general->cur_sym }}{{ showAmount($withdrawals['total_withdraw_amount']) }}" title="Total Withdrawn" style="2" link="{{ route('admin.withdraw.log') }}" icon="lar la-credit-card" color="success" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ showAmount($withdrawals['total_withdraw_pending']) }}" title="Pending Withdrawals" style="2" link="{{ route('admin.withdraw.pending') }}" icon="las la-sync" color="warning" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ showAmount($withdrawals['total_withdraw_pending']) }}" title="Rejected Withdrawals" style="2" link="{{ route('admin.withdraw.rejected') }}" icon="las la-times-circle" color="danger" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $general->cur_sym }}{{ showAmount($withdrawals['total_withdraw_charge']) }}" title="Withdrawal Charge" style="2" link="{{ route('admin.withdraw.log') }}" icon="las la-percent" color="primary" />
        </div>
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['total']) }}" title="Total Images" style="3" link="{{ route('admin.images.all') }}" icon="las la-images" color="white" bg="15" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['pending']) }}" title="Pending Images" style="3" link="{{ route('admin.images.pending') }}" icon="las la-spinner" color="white" bg="warning" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['approved']) }}" title="Approved Images" style="3" link="{{ route('admin.images.approved') }}" icon="las la-check" color="white" bg="success" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['rejected']) }}" title="Rejected Images" style="3" link="{{ route('admin.images.rejected') }}" icon="las la-times" color="white" bg="red" />
        </div>
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['plan_purchased']) }}" title="Plan Purchased" style="3" link="{{ route('admin.report.plan.purchased') }}" icon="las la-list-ol" color="white" bg="dark" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['total_downloads']) }}" title="Total Downloads" style="3" link="{{ route('admin.report.download.log') }}" icon="las la-cloud-download-alt" color="white" bg="10" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $general->cur_sym . showAmount($resources['total_contributor_earnings']) }}" title="Contributor's Earning" style="3" link="{{ route('admin.report.contributor.earnings') }}" icon="las la-money-bill-wave-alt" color="white" bg="3" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ shortNumber($resources['total_collections']) }}" title="Total Collections" style="3" link="{{ route('admin.report.user.image.collections') }}" icon="las la-folder-plus" color="white" bg="1" />
        </div>
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ $general->cur_sym }}{{ showAmount($donations['total_donations_amount']) }}" title="Total Donation" style="2" link="{{ route('admin.donation.log') }}" icon="las la-dollar-sign" color="success" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ showAmount($donations['total_donations_paid']) }}" title="Paid Donations" style="2" link="{{ route('admin.donation.paid') }}" icon="las la-check-circle" color="warning" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ showAmount($donations['total_donations_pending']) }}" title="Pending Donations" style="2" link="{{ route('admin.donation.pending') }}" icon="las la-spinner" color="warning" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget
                      value="{{ showAmount($donations['total_donations_rejected']) }}" title="Rejected Donations" style="2" link="{{ route('admin.donation.reject') }}" icon="las la-times-circle" color="danger" />
        </div>

    </div><!-- row end-->

    <div class="row mb-none-30 mt-30">
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly Deposit & Withdraw Report') (@lang('Last 12 Month'))</h5>
                    <div id="apex-bar-chart"> </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Transactions Report') (@lang('Last 30 Days'))</h5>
                    <div id="apex-line"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-none-30 mt-5">
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Browser') (@lang('Last 30 days'))</h5>
                    <canvas id="userBrowserChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By OS') (@lang('Last 30 days'))</h5>
                    <canvas id="userOsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Country') (@lang('Last 30 days'))</h5>
                    <canvas id="userCountryChart"></canvas>
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


        var options = {
            series: [{
                name: 'Total Deposit',
                data: [
                    @foreach ($months as $month)
                        {{ getAmount(@$depositsMonth->where('months', $month)->first()->depositAmount) }},
                    @endforeach
                ]
            }, {
                name: 'Total Withdraw',
                data: [
                    @foreach ($months as $month)
                        {{ getAmount(@$withdrawalMonth->where('months', $month)->first()->withdrawAmount) }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 450,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($months),
            },
            yaxis: {
                title: {
                    text: "{{ __($general->cur_sym) }}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
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
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "{{ __($general->cur_sym) }}" + val + " "
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
        chart.render();



        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_browser_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_browser_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });



        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_os_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_os_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        // Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_country_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_country_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });

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
                },
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                    name: "Plus Transactions",
                    data: [
                        @foreach ($trxReport['date'] as $trxDate)
                            {{ @$plusTrx->where('date', $trxDate)->first()->amount ?? 0 }},
                        @endforeach
                    ]
                },
                {
                    name: "Minus Transactions",
                    data: [
                        @foreach ($trxReport['date'] as $trxDate)
                            {{ @$minusTrx->where('date', $trxDate)->first()->amount ?? 0 }},
                        @endforeach
                    ]
                }
            ],
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
                    @foreach ($trxReport['date'] as $trxDate)
                        "{{ $trxDate }}",
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
        };

        var chart = new ApexCharts(document.querySelector("#apex-line"), options);

        chart.render();
    </script>
@endpush
