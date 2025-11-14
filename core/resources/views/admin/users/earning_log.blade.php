@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Contributor')</th>
                                    {{-- <th>@lang('Image Title')</th> --}}
                                    <th>@lang('Remark')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                    <tr>
                                        <td>
                                            <span class="fw-bold d-block">{{ __(@$log->contributor->fullname) }}</span>
                                            <a href="{{ route('admin.users.detail', @$log->contributor_id) }}"><span>@</span>{{ @$log->contributor->username }}</a>
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('admin.images.details', $log->imageFile->image_id) }}">
                                                {{ __(@$log->imageFile->image->title) }}
                                            </a>
                                        </td> --}}
                                        <td>
                                            {{ __(@$log->remark) }}
                                        </td>
                                        <td>
                                            {{ showDateTime($log->earning_date, 'd M,Y') }}
                                        </td>
                                        <td>
                                            <span class="fw-bold">
                                                {{ __(showAmount($log->amount)) }} {{ $general->cur_text }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-2">
                                                <button class="btn btn-outline--danger btn-sm confirmationBtn" data-question="@lang('Are you sure to Delete this earning log ?')" data-action="{{ route('admin.report.contributor.earing.log.delete', $log->id) }}">
                                                    <i class="las la-trash"></i>@lang('Delete')
                                                </button>
                                            </div>
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
                @if ($logs->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($logs) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
    <x-confirmation-modal />

@endsection
