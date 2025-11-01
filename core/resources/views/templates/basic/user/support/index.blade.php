@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="custom--table-container table-responsive--md">
                <table class="custom--table table">
                    <thead>
                        <tr>
                            <th>@lang('Subject')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Last Reply')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($supports as $support)
                            <tr>
                                <td> <a class="fw-bold text--base" href="{{ route('ticket.view', $support->ticket) }}"> [@lang('Ticket')#{{ $support->ticket }}] {{ __($support->subject) }} </a></td>
                                <td>
                                    @php echo $support->statusBadge; @endphp
                                </td>
                                <td>
                                    @if ($support->priority == Status::PRIORITY_LOW)
                                        <span class="badge badge--dark">@lang('Low')</span>
                                    @elseif($support->priority == Status::PRIORITY_MEDIUM)
                                        <span class="badge badge--warning">@lang('Medium')</span>
                                    @elseif($support->priority == Status::PRIORITY_HIGH)
                                        <span class="badge badge--danger">@lang('High')</span>
                                    @endif
                                </td>
                                <td>{{ diffForHumans($support->last_reply) }} </td>

                                <td>
                                    <a class="btn btn--base btn-sm" href="{{ route('ticket.view', $support->ticket) }}">
                                        <i class="las la-desktop"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="sm-text text-center" colspan="5">{{ __($emptyMessage) }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (@$supports->hasPages())
                <div class="d-flex justify-content-center my-3">
                    {{ paginateLinks($supports) }}
                </div>
            @endif

        </div>
    </div>
@endsection
