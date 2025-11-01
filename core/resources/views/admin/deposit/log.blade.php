@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        @if (request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.method') || request()->routeIs('admin.users.deposits') || request()->routeIs('admin.users.deposits.method'))
            <div class="col-xxl-3 col-sm-6 mb-30">
                <x-widget
                          value="{{ __($general->cur_sym) }}{{ showAmount($successful) }}" title="Successful Deposit" style="4" link="{{ route('admin.deposit.successful') }}" bg="success" />
            </div>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <x-widget
                          value="{{ __($general->cur_sym) }}{{ showAmount($pending) }}" title="Pending Deposit" style="4" link="{{ route('admin.deposit.pending') }}" bg="6" />
            </div>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <x-widget
                          value="{{ __($general->cur_sym) }}{{ showAmount($rejected) }}" title="Rejected Deposit" style="4" link="{{ route('admin.deposit.rejected') }}" bg="pink" />
            </div>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <x-widget
                          value="{{ __($general->cur_sym) }}{{ showAmount($initiated) }}" title="Initiated Deposit" style="4" link="{{ route('admin.deposit.initiated') }}" bg="dark" />
            </div>
        @endif

        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Gateway | Transaction')</th>
                                    <th>@lang('Initiated')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Conversion')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($deposits as $deposit)
                                    @php
                                        $details = $deposit->detail ? json_encode($deposit->detail) : null;
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="fw-bold"> <a href="{{ appendQuery('method', @$deposit->gateway->alias) }}">{{ __(@$deposit->gateway->name) }}</a> </span>
                                            <br>
                                            <small> {{ $deposit->trx }} </small>
                                        </td>

                                        <td>
                                            {{ showDateTime($deposit->created_at) }}<br>{{ diffForHumans($deposit->created_at) }}
                                        </td>
                                        <td>
                                            @if ($deposit->donation_id)
                                                {{ @$deposit->donation->sender->name }}<br>
                                                <a href="{{ appendQuery('search', @$deposit->donation->sender->name) }}"><span>@</span>      
                                                    @lang('Donation')
                                                </a>
                                            @else
                                                <span class="fw-bold">{{ $deposit->user->fullname }}</span>
                                                <br>
                                                <span class="small">
                                                    <a href="{{ appendQuery('search', @$deposit->user->username) }}"><span>@</span>{{ $deposit->user->username }}</a>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ __($general->cur_sym) }}{{ showAmount($deposit->amount) }} + <span class="text-danger" title="@lang('charge')">{{ showAmount($deposit->charge) }} </span>
                                            <br>
                                            <strong title="@lang('Amount with charge')">
                                                {{ showAmount($deposit->amount + $deposit->charge) }} {{ __($general->cur_text) }}
                                            </strong>
                                        </td>
                                        <td>
                                            1 {{ __($general->cur_text) }} = {{ showAmount($deposit->rate) }} {{ __($deposit->method_currency) }}
                                            <br>
                                            <strong>{{ showAmount($deposit->final_amo) }} {{ __($deposit->method_currency) }}</strong>
                                        </td>
                                        <td>
                                            @php echo $deposit->statusBadge @endphp
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline--primary ms-1" href="{{ route('admin.deposit.details', $deposit->id) }}">
                                                <i class="la la-desktop"></i>@lang('Details')
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($deposits->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($deposits) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    @if (!request()->routeIs('admin.users.deposits') && !request()->routeIs('admin.users.deposits.method'))
        <x-search-form dateSearch='yes' />
    @endif
@endpush
