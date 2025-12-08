@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="show-filter mb-3 text-end">
        <button type="button" class="btn btn--base showFilterBtn btn--sm"><i class="las la-filter"></i> @lang('Filter')</button>
    </div>
    {{-- <div class="card custom--card responsive-filter-card mb-4">
        <div class="card-body">
            <form action="">
                <div class="d-flex flex-wrap gap-4">
                    <div class="flex-grow-1">
                        <label>@lang('Transaction Number')</label>
                        <input type="text" name="search" value="{{ request()->search }}" class="form-control form--control">
                    </div>
                    <div class="flex-grow-1">
                        <label>@lang('Type')</label>
                        <div class="form--select">
                            <select name="trx_type" class="form-select">
                                <option value="">@lang('All')</option>
                                <option value="+" @selected(request()->trx_type == '+')>@lang('Plus')</option>
                                <option value="-" @selected(request()->trx_type == '-')>@lang('Minus')</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <label>@lang('Remark')</label>
                        <div class="form--select">
                            <select class="form-select" name="remark">
                                <option value="">@lang('Any')</option>
                                @foreach ($remarks as $remark)
                                    <option value="{{ $remark->remark }}" @selected(request()->remark == $remark->remark)>{{ __(keyToTitle($remark->remark)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-end">
                        <button class="btn btn--base h-45 w-100" type="submit"><i class="las la-filter"></i> @lang('Filter')</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="custom--table-container table-responsive--md">
        <table class="table custom--table">
            <thead>
                <tr>
                    <th class="sm-text">@lang('Trx')</th>
                    <th class="sm-text">@lang('Amount')</th>
                    {{-- <th class="sm-text">@lang('Post Balance')</th> --}}
                    <th class="sm-text">@lang('Detail')</th>
                    <th class="sm-text">@lang('Status')</th>
                    <th class="sm-text">@lang('Transacted')</th>
                    <th class="sm-text">@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $trx)
                    <tr>
                        <td class="sm-text">
                            <strong>{{ $trx->trx }}</strong>
                        </td>

                        <td class="budget sm-text">
                            <span class="fw-bold @if ($trx->trx_type == '+') text--success @else text--danger @endif">
                                {{ $trx->trx_type }} {{ showAmount($trx->amount) }} {{ __($general->cur_text) }}
                            </span>
                        </td>

                        {{-- <td class="budget sm-text">
                            <span class="fw-bold">
                                {{ showAmount($trx->post_balance) }} {{ __($general->cur_text) }}
                            </span>
                        </td> --}}

                        <td>{{ __($trx->details) }}</td>
                        <td>
                            @if($trx->deposit)
                               {!! $trx->deposit->statusBadge !!}
                            @endif
                        </td>

                        <td class="sm-text">
                            {{ showDateTime($trx->created_at) }}<br>{{ diffForHumans($trx->created_at) }}
                        </td>
                        <td>
                            @if($trx->deposit && $trx->deposit->download && $trx->deposit->download->imageFile)
                                <a href="{{ route('user.image.download.file', ['id'=>$trx->deposit->download->imageFile->id]) }}" class="btn btn--base btn-sm">
                                    <i class="las la-download"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center sm-text" colspan="5">{{ __($emptyMessage) }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if ($transactions->hasPages())
        <div class="card-footer">
            {{ paginateLinks($transactions) }}
        </div>
    @endif
@endsection
