
@extends('admin.layouts.app')
@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th class="bg--green-new">@lang('S.N')</th>
                                    <th class="bg--green-new">@lang('Email')</th>
                                    <th class="bg--green-new">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subscribers as $blog)
                                    <tr>
                                        <td>
                                            {{ $subscribers->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            {{ __($blog->email) }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <a href="{{route('admin.users.subscriber.delete',['id'=>$blog->id])}}" class="btn btn-outline--primary btn-sm" data-modal_title="@lang('Delete Subscriber')" data-resource="{{ $blog }}">
                                                    <i class="las la-trash"></i>@lang('Delete')
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody> 
                        </table>
                    </div>
                </div>
                @if ($subscribers->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($subscribers) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-search-form />
@endpush

@push('script')
    <script>
        $(document).on("click", ".cuModalBtn", function(e) {
            // var form = $(this).find("form");
            // var userId = $(this).attr("data-user-id");
        });
    </script>
@endpush

@push('style')
    <style>
        .table-image {
            height: 30px;
            width: 50px;
        }

        .modal-dialog {
            min-width: 600px !important;
        }
    </style>
@endpush