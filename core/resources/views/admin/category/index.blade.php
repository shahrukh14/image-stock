@php
    $categoryImage = getImage(getFilePath('category'), getFileSize('category'));
@endphp
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
                                    <th>@lang('S.N')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Slug')</th>
                                    <th>@lang('Image')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Show on Homepage')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $categories->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            {{ __($category->name) }}
                                        </td>

                                        <td>
                                            {{ $category->slug }}
                                        </td>
                                        <td>
                                            <img class="table-image" src="{{ getImage(getFilePath('category') . '/' . $category->image, getFileSize('category')) }}" alt="@lang('Category')">
                                        </td>
                                        <td>
                                            @php echo $category->statusBadge; @endphp
                                        </td>
                                        @php
                                            $category->image_with_path = getImage(getFilePath('category') . '/' . $category->image, getFileSize('category'));
                                        @endphp
                                        <td>
                                            @if ($category->show_on_homepage == 'yes')
                                                <button class="btn btn-outline--danger btn-sm confirmationBtn" data-question="@lang('Are you sure to hide this category from homepage ?')" data-action="{{ route('admin.category.homepage', $category->id) }}">
                                                    <i class="las la-eye-slash"></i>@lang('Hide')
                                                </button>
                                            @else
                                                <button class="btn btn-outline--success confirmationBtn btn-sm" data-question="@lang('Are you sure to show this category on homepage?')" data-action="{{ route('admin.category.homepage', $category->id) }}">
                                                    <i class="las la-eye"></i>@lang('Show')
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <button class="btn btn-outline--primary cuModalBtn btn-sm" data-modal_title="@lang('Update Category')" data-resource="{{ $category }}">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </button>
                                                @if ($category->status == Status::ENABLE)
                                                    <button class="btn btn-outline--danger btn-sm confirmationBtn" data-question="@lang('Are you sure to disable this category?')" data-action="{{ route('admin.category.status', $category->id) }}">
                                                        <i class="las la-eye-slash"></i>@lang('Disable')
                                                    </button>
                                                @else
                                                    <button class="btn btn-outline--success confirmationBtn btn-sm" data-question="@lang('Are you sure to enable this category?')" data-action="{{ route('admin.category.status', $category->id) }}">
                                                        <i class="las la-eye"></i>@lang('Enable')
                                                    </button>
                                                @endif
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
                @if ($categories->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($categories) }}
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
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="image-upload">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: url({{ $categoryImage }})">
                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" class="profilePicUpload" name="image" id="profilePicUpload" accept=".png, .jpg, .jpeg">
                                        <label for="profilePicUpload" class="bg--success">@lang('Upload Image')</label>
                                        <small class="mt-2  ">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg'), @lang('png').</b> </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Slug')</label>
                            <input type="text" class="form-control" name="slug" required>
                        </div>

                        <div class="form-group">
                            <label>@lang('Heading')</label>
                            <input type="text" class="form-control" name="heading" required>
                        </div>

                        <div class="form-group">
                            <label>@lang('Meta Title')</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="form-group">
                            <label>@lang('Meta Description')</label>
                            <textarea name="meta_description" rows="3" class="form-control"> </textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('Keywords')</label>
                            <input type="text" class="form-control" name="meta_keywords">
                            <small class="ms-2 mt-2 ">@lang('Separate multiple keywords by') <code>,</code>(@lang('comma')) @lang(',do not add space between them') </small>
                        </div>
                        {{-- <div class="form-group select2-parent position-relative">
                            <label>@lang('Keywords')</label>
                            <small class="ms-2 mt-2 ">@lang('Separate multiple keywords by') <code>,</code>(@lang('comma')) @lang('or') <code>@lang('enter')</code> @lang('key')</small>
                            <select name="meta_keywords[]" class="form-control select2-auto-tokenize"  multiple="multiple">
                                
                            </select>
                        </div> --}}
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
    <button class="btn btn-outline--primary h-45 cuModalBtn" data-modal_title="@lang('Add Category')">
        <i class="las la-plus"></i>@lang('Add New')
    </button>
@endpush

@push('script')
    <script>
        (function($) {
            $('#cuModal').on('hidden.bs.modal', function() {
                $(this).find('.profilePicPreview').css('background-image', `url('{{ $categoryImage }}')`)
            })
        })(jQuery);
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
