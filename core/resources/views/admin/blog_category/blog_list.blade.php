
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
                                    <th class="bg--green-new">@lang('Title')</th>
                                    <th class="bg--green-new">@lang('Author')</th>
                                    <th class="bg--green-new">@lang('Category')</th>
                                    <th class="bg--green-new">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <td>
                                            {{ $blogs->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            {{ __($blog->title) }}
                                        </td>
                                        <td>
                                            {{ __($blog->author) }}
                                        </td>
                                        <td>
                                            {{ __($blog->Category->blog_category) }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <a href="{{route('admin.blog.update.data',['id'=>$blog->id])}}" class="btn btn-outline--primary btn-sm" data-user-id="{{$blog->id}}" data-modal_title="@lang('Update Blog')" data-resource="{{ $blog }}">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </a>
                                                <a href="{{route('admin.blog.data.delete',['id'=>$blog->id])}}" class="btn btn-outline--primary btn-sm" data-modal_title="@lang('Delete Blog')" data-resource="{{ $blog }}">
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
                @if ($blogs->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($blogs) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form id="updateUserForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-confirmation-modal />
@endsection


@push('breadcrumb-plugins')
    <x-search-form />
    <a href="{{route('admin.blog.new.add')}}" class="btn btn-outline--primary h-45 bg--green-new" data-modal_title="@lang('Add Category')">
        <i class="las la-plus"></i>@lang('Add New')
    </a>
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