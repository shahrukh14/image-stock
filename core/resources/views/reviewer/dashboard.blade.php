@extends('reviewer.layouts.app')

@section('panel')
    <div class="row gy-4">
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--primary has-link overflow-hidden box--shadow2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-photo-video f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text-white text--small">@lang('Total Image')</span>
                            <h2 class="text-white">{{ $widget['total'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--warning has-link box--shadow2">
                <a href="{{ route('reviewer.images.pending') }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-spinner f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text-white text--small">@lang('Pending Image')</span>
                            <h2 class="text-white">{{ $widget['pending'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--success has-link box--shadow2">
                <a href="{{ route('reviewer.images.approved') }}?search={{ auth('reviewer')->user()->name }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="lar la-check-circle f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text-white text--small">@lang('Approved By Me')</span>
                            <h2 class="text-white">{{ $widget['approved_by_me'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--red has-link box--shadow2">
                <a href="{{ route('reviewer.images.rejected') }}?search={{ auth('reviewer')->user()->name }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-times-circle f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text-white text--small">@lang('Rejected By Me')</span>
                            <h2 class="text-white">{{ $widget['rejected_by_me'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
    </div><!-- row end-->

    <div class="row mb-none-30 mt-30">
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly Approved Images By Me') (@lang('Last 12 Month'))</h5>
                    <div id="apex-bar-chart-approved"> </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly Rejected Images By Me') (@lang('Last 12 Month'))</h5>
                    <div id="apex-bar-chart-reject"></div>
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
                name: 'Total Approved',
                data: @json($report['approved']->flatten())
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
                    text: "pc's",
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
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart-approved"), options);
        chart.render();

        var options = {
            series: [{
                name: 'Total Rejected',
                data: @json($report['rejected']->flatten())
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
                }
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
                    text: "pc's",
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
                opacity: 1,
                colors: ['#F44336']
            },
            colors: ["#F44336"]
        };

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart-reject"), options);
        chart.render();
    </script>
@endpush
