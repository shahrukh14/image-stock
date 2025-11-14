@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('admin.videos.update', $video->id) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    {{-- <img src="{{ imageUrl(getFilePath('stockImage'), $video->image_name) }}" alt="@lang('Video')"> --}}
                                    <object data="{{$video_url}}" id="ojectTag" width="400" height="300"></object>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    @if (@$video->user)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Uploaded By')</label>
                                                <input class="form-control" type="text" value="{{ __($video->user->fullname) }}" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Category')</label>
                                            <select class="form-control select2-tokenize" name="category[]"  multiple="multiple" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected($video->category_id && in_array($category->id, $video->category_id))>{{ __($category->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Title')</label>
                                            <input class="form-control" name="title" type="text" value="{{ $video->title }}" required>
                                        </div>
                                    </div>

                                    {{-- @if ($colors)
                                        <div class="col-md-6">
                                            <div class="form-group" id="extension">
                                                <label>@lang('Colors')</label>
                                                <select class="form-control select2-tokenize" name="colors[]" multiple="multiple" required>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->color_code }}" @selected($video->colors && in_array($color->color_code, $video->colors))>{{ __($color->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif --}}
                                    @if ($extensions)
                                        <div class="col-md-12">
                                            <div class="form-group" id="extension">
                                                <label>@lang('Extensions')</label>
                                                <select class="form-control select2-tokenize" name="extensions[]" multiple="multiple" required>
                                                    @foreach ($extensions as $option)
                                                        <option value="{{ $option }}" @selected($video->extensions && in_array($option, $video->extensions))>{{ __(strtoupper($option)) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="form-group" id="tag">
                                            <label>@lang('Tags')</label>
                                            <select class="form-control select2-auto-tokenize" name="tags[]" multiple="multiple" required>
                                                @if (@$video->tags)
                                                    @foreach ($video->tags as $option)
                                                        <option value="{{ $option }}" selected>{{ __($option) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('Total Views')</label>
                                    <input class="form-control" type="text" value="{{ $video->total_view }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('Total Likes')</label>
                                    <input class="form-control" type="text" value="{{ $video->total_like }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('Total Downloads')</label>
                                    <input class="form-control" type="number" value="{{ $video->totalDownloads }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Attribution')</label>
                                    <input name="attribution" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="35" data-on="@lang('Enable')" data-off="@lang('Disable')" type="checkbox" @if ($video->attribution) checked @endif>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Status')</label>
                                    <select class="form-control status" name="status" required>
                                        <option value="" selected>@lang('Select One')</option>
                                        @if ($video->status == 0)
                                            <option value="0" @selected($video->status == 0)>@lang('Pending')</option>
                                        @endif
                                        <option value="3" @selected($video->status == 3)>@lang('Rejected')</option>
                                        <option value="1" @selected($video->status == 1)>@lang('Approved')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="list-group my-3">
                                    <li class="list-group-item bg--primary border--primary text-center">
                                        <span class="fw-bold text--white">@lang('Files')</span>
                                    </li>
                                    @foreach ($video->files as $value)
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <div class="col-12 extraPriceElement">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label>@lang('Resolution')</label>
                                                            </div>
                                                            <div class="input-group">
                                                                <input class="form-control" name="resolution[]" type="text" value="{{ $value->resolution }}" required>
                                                                <input name="file_id[]" type="hidden" value="{{ $value->id }}">
                                                                <a class="input-group-text" href="{{ route('admin.videos.file.download', $value->id) }}">
                                                                    <i class="las la-download"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>@lang('Status')</label>

                                                            <select class="form-control" name="statusFile[]" required>
                                                                <option value="">@lang('Select One')</option>
                                                                <option value="1" @selected($value->status == Status::ENABLE)>@lang('Enable')</option>
                                                                <option value="0" @selected($value->status == Status::DISABLE)>@lang('Disable')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>@lang('Premium/Free')</label>
                                                            <select class="form-control is_free_select" name="is_free[]" required>
                                                                <option value="">@lang('Select One')</option>
                                                                <option value="0" @selected($value->is_free == Status::PREMIUM)>@lang('Premium')</option>
                                                                <option value="1" @selected($value->is_free == Status::FREE)>@lang('Free')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 price {{ $value->is_free == Status::FREE ? 'd-none' : '' }}">
                                                        <div class="form-group">
                                                            <label>@lang('Standard Price')</label>
                                                            <div class="input-group">
                                                                <input class="form-control" name="price[]" type="number" value="{{ @$value->price ? showAmount(@$value->price) : '' }}" step="any" @if (!$value->is_free) required @endif>
                                                                <span class="input-group-text">{{ __($general->cur_text) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 price {{ $value->is_free == Status::FREE ? 'd-none' : '' }}">
                                                        <div class="form-group">
                                                            <label>@lang('Extended Price')</label>
                                                            <div class="input-group">
                                                                <input class="form-control" name="ex_price[]" type="number" value="{{ @$value->ex_price ? showAmount(@$value->ex_price) : '' }}" step="any" @if (!$value->is_free) required @endif>
                                                                <span class="input-group-text">{{ __($general->cur_text) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>@lang('Excluded Package')</label>
                                                            <select class="form-control" name="exclued_package[]" required>
                                                                <option value="">@lang('Select One')</option>
                                                                <option value="no" @selected($value->exclued_package == "no")>@lang('No')</option>
                                                                <option value="yes" @selected($value->exclued_package == "yes")>@lang('Yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- <div class="col-12">
                                <ul class="list-group my-3">
                                    <li class="list-group-item bg--primary border--primary text-center">
                                        <span class="fw-bold text--white">@lang('Thumb videos')</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                                        <div class="col-12 extraPriceElement">
                                            <div class="row align-items-center">
                                                @foreach ($video->thumb_resource ?? [] as $thumb)
                                                <div class="col-md-2">
                                                    <img alt="{{$video->title}}" src="{{ imageUrl(getFilePath('stockImage'), $thumb, null, true) }}" class="image background-image">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Description')</label>
                                    <textarea class="form-control nicEdit" name="description" rows="5" required>{{ $video->description }}</textarea>
                                </div>
                            </div>

                            <div class="row reason">
                                <div class="border-bottom my-3 text-center">
                                    <h5 class="py-2">@lang('Rejection Reason')</h5>
                                    @if ($video->admin_id || $video->reviewer_id)
                                        <h6 class="mb-2">@lang('Previously Reviewed By') {{ $video->admin_id ? $video->admin->name : $video->reviewer->name }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form- group">
                                        <label>@lang('Predefined Reason')</label>
                                        <select class="form-control predefined-reason">
                                            <option value="" disabled selected>@lang('Select One')</option>
                                            @foreach ($reasons as $reason)
                                                <option value="{{ $reason->description }}">{{ __($reason->title) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('Reason')</label>
                                        <textarea class="form-control" name="reason" rows="6" @if ($video->status == 3) required @endif>{{ $video->reason }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-confirmation-modal />
@endsection

@push('style')
    <style>
        #tag,
        #extension {
            position: relative;
        }

        .reason-title {
            background-color: #dddddd21;
        }
    </style>
@endpush

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.videos.all') }}" />
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            if ($('.status option:selected').val() != 3) {
                $('.reason').hide();
            }

            $('.select2-auto-tokenize').select2({
                dropdownParent: $('#tag'),
                tags: true,
                tokenSeparators: [',']
            });

            $('.select2-tokenize').select2({
                dropdownParent: $('#extension'),
                tags: false,
                tokenSeparators: [',']
            });

            $('[name=is_free]').on('change', function() {
                if (!$(this).is(':checked')) {
                    $('.price').removeClass('d-none');
                    $('.price label').addClass('required');
                    $('[name=price]').attr('required', true);
                } else {
                    $('.price').addClass('d-none');
                    $('.price label').removeClass('required');
                    $('[name=price]').attr('required', false);
                }
            })

            $('.status').on('change', function() {
                if ($(this).val() == 3) {
                    $('[name=reason]').attr('required', true);
                    $('.reason').show('slow');
                } else {
                    $('[name=reason]').attr('required', false);
                    $('.reason').hide('slow');
                }
            });

            $('.predefined-reason').on('change', function() {
                $('[name=reason]').val($(this).val());
            });



            $(document).on('change', '.is_free_select', function() {
                if ($(this).val() == 1) {
                    $(this).closest('.extraPriceElement').find('.price').addClass('d-none');
                } else {
                    $(this).closest('.extraPriceElement').find('.price').removeClass('d-none');
                }
            })





        })(jQuery);
    </script>
@endpush
