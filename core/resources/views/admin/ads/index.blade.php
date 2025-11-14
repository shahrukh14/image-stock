@extends('admin.layouts.app')
@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th>@lang('S.N')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Ad For')</th>
                                    <th>@lang('Size')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Impressions')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ads as $ad)
                                    <tr>
                                        <td>
                                            {{ $ads->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            {{ __($ad->title) }}
                                        </td>
                                        <td>
                                            {{ __($ad->ad_for) }}
                                        </td>
                                        <td>
                                            {{ __($ad->size) }}
                                        </td>

                                        <td>
                                            {{ $ad->typeText }}
                                        </td>
                                        <td>
                                            {{ $ad->impressions }}
                                        </td>
                                        <td>
                                            <div class="button--group">
                                                <button class="btn btn-outline--primary cuModalBtn btn-sm" data-modal_title="@lang('Update Ads')" data-resource="{{ $ad }}">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </button>
                                                <button class="btn btn-outline--danger confirmationBtn btn-sm" data-question="@lang('Are you sure to delete this Ads?')" data-action="{{ route('admin.ads.delete', $ad->id) }}">
                                                    <i class="las la-trash-alt"></i>@lang('Delete')
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
                        </table>
                    </div>
                </div>
                @if ($ads->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($ads) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="cuModal" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <input class="form-control" name="title" type="text" required>
                        </div>

                        <div class="form-group">
                            <label>@lang('Ad For')</label>
                            <select class="form-control" name="ad_for" required>
                                <option>@lang('Select')</option>
                                <option value="photo">@lang('Photos Page')</option>
                                <option value="vector">@lang('Vector & Graphics Page')</option>
                                <option value="video">@lang('Videos Page')</option>
                                <option value="search">@lang('Search Page')</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('Ad Size')</label>
                            <select class="form-control" name="size">
                                <option value="">@lang('Select one')</option>
                                @foreach (adSizes() as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>@lang('Type')</label>
                            <select class="form-control" name="type">
                                <option value="0">@lang('Image')</option>
                                <option value="1">@lang('Script')</option>
                            </select>
                        </div>
                        <div class="form-group adsImage">
                            <label>@lang('Target Url')</label>
                            <input class="form-control" name="target_url" type="text" required>
                        </div>
                        <div class="form-group adsImage">
                            <label>@lang('Image')</label>
                            <div class="image-upload">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: url(imageUrl)">
                                            <button class="remove-image" type="button"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input class="profilePicUpload" id="profilePicUpload1" name="image" type="file" accept=".png, .jpg, .jpeg">
                                        <label class="bg--success" for="profilePicUpload1">@lang('Upload Image')</label>
                                        <small class="mt-2">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg'), @lang('png'), @lang('gif').</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group adsCode">
                            <label>@lang('Code')</label>
                            <textarea class="form-control" name="code"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <x-search-form />
    <button class="btn btn-outline--primary h-45 cuModalBtn" data-modal_title="@lang('Add Ads')">
        <i class="las la-plus"></i>@lang('Add New')
    </button>
@endpush

@push('style')
    <style>
        .modal-dialog {
            min-width: 600px !important;
        }
    </style>
@endpush

@push('script')
    <script>
        "use strict";
        (function($) {
            let modal = $('#cuModal');

            modal.find('[name="type"]').on('change ', function() {
                if ($(this).val() == 1) {
                    $('.adsCode').removeClass('d-none');
                    $('.adsImage').addClass('d-none');
                } else {
                    $('.adsImage').removeClass('d-none');
                    $('.adsCode').addClass('d-none');
                }
            }).change();
            modal.find('[name=size]').on('change ', function() {
                let placeholderImage = `{{ route('placeholder.image', '') }}/${$(this).val()}`;
                modal.find('.profilePicPreview').css('background-image', `url(${placeholderImage})`);
            }).change();

            $('.cuModalBtn').on('click', function() {
                modal.find('[name="type"]').change();
                let resource = $(this).data('resource');
                console.log(resource);
                if (resource) {
                    let imageName = resource?.image;
                    if (resource?.type == 0) {
                        let imageUrl = `{{ route('home') }}/{{ getFilePath('ads') }}/${imageName}`;
                        modal.find('.profilePicPreview').css('background-image', `url(${imageUrl})`);
                        $('.adsImage').removeClass('d-none');
                        $('.adsCode').addClass('d-none');
                    } else {
                        $('.adsCode').removeClass('d-none');
                        $('.adsImage').addClass('d-none');
                    }
                } else {
                    modal.find('[name=size]').val('');
                    modal.find('[name=size]').change();
                    modal.find('[name=type]').val(0);
                    modal.find('[name=type]').change();
                }
            });
        })(jQuery);
    </script>
@endpush
