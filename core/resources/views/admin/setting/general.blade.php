@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body" id="generalCard">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Site Title')</label>
                                    <input class="form-control" name="site_name" type="text" value="{{ $general->site_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>@lang('Currency')</label>
                                    <input class="form-control" name="cur_text" type="text" value="{{ $general->cur_text }}" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>@lang('Currency Symbol')</label>
                                    <input class="form-control" name="cur_sym" type="text" value="{{ $general->cur_sym }}" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Timezone')</label>
                                    <select class="select2-basic" name="timezone">
                                        @foreach ($timezones as $timezone)
                                            <option value="'{{ @$timezone }}'">{{ __($timezone) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Site Base Color')</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 p-0">
                                            <input class="form-control colorPicker" type='text' value="{{ $general->base_color }}" />
                                        </span>
                                        <input class="form-control colorCode" name="base_color" type="text" value="{{ $general->base_color }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label data-bs-toggle="tooltip" title="@lang('Maximum price for image upload, while contributor uploading any resources, they can\'t cross this maximum price')">@lang('Image Maximum Price') <i
                                           class="las la-info-circle text--info"></i></label>
                                    <div class="input-group">
                                        <input class="form-control" name="image_maximum_price" type="number" value="{{ $general->image_maximum_price }}" min="0" required step="any">
                                        <span class="input-group-text">{{ __($general->cur_text) }}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label data-bs-toggle="tooltip" title="@lang('-1 for unlimited resources upload')"> @lang('Per day Resource Upload limit') <i
                                           class="las la-info-circle text--info"></i></label>
                                    <input class="form-control" name="upload_limit" type="number" value="{{ $general->upload_limit }}" required step="any">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label data-bs-toggle="tooltip" title="@lang('Contributor\'s commission in each premium resource download')"> @lang('Contributor\'s Commission') <i
                                           class="las la-info-circle text--info"></i></label>
                                    <div class="input-group">
                                        <input class="form-control" name="per_download" type="number" value="{{ $general->per_download }}" required step="any">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if ($general->referral_system)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label data-bs-toggle="tooltip" title="@lang('Referral Commission in each plan purchased')"> @lang('Referral Commission') <i
                                               class="las la-info-circle text--info"></i></label>
                                        <div class="input-group">
                                            <input class="form-control" name="referral_commission" type="number" value="{{ $general->referral_commission }}" required step="any">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12">

                                <div class="form-group">
                                    <label> @lang('Global Ad Script')</label>
                                    <textarea name="ads_script" name="ads_script">{{ $general->ads_script }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-none-30 justify-content-center mt-5">
        <div class="col-lg-6 col-md-12 mb-30">
            <div class="card">
                <div class="card-header">
                    <h5>@lang('Upload Instructions')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.instruction') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label> @lang('Heading') </label>
                            <input class="form-control" name="heading" type="text" value="{{ @$general->instruction->heading }}">
                        </div>
                        <div class="form-group">
                            <label> @lang('Instruction') </label>
                            <textarea class="form-control" name="instruction" rows="5">{{ @$general->instruction->instruction }}</textarea>
                        </div>

                        <div class="form-group">
                            <label> @lang('Instruction file') (@lang('Please insert any  .txt file')) </label>
                            <input class="form-control" name="txt" type="file" type="text" accept="text/plain">
                        </div>

                        <div class="form-group">
                            <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-30">
            <form action="{{ route('admin.watermark') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <div class="image-upload">
                        <div class="thumb">
                            <div class="avatar-preview">
                                <div class="profilePicPreview" style="background-image: url({{ getImage('assets/images/watermark.png') }})">
                                    <button class="remove-image" type="button"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="avatar-edit">
                                <input class="profilePicUpload" id="profilePicUpload1" name="watermark" type="file" accept=".png">
                                <label class="bg--success" for="profilePicUpload1">@lang('Upload Watermark') </label>
                                <small>@lang('Supported file ') <strong>@lang('.png')</strong> ,
                                    @lang('image will be resized into '){{ getFileSize('watermark') }}@lang('px')</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 mb-30">
                <form action="{{ route('admin.promo.one') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview" style="background-image: url({{ asset('core/public/assets/image/homepage_promo/'.gs()->homepage_promo_1)}})">
                                        <button class="remove-image" type="button"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input class="homepage_promo_1" id="homepage_promo_1" name="homepage_promo_1" type="file" style="display: none">
                                    <label class="bg--success  mt-2" for="homepage_promo_1" id="upload_homepage_prome_1">@lang('Upload Homepage Promo 1') </label>
                                    {{-- <small>@lang('Supported file ') <strong>@lang('.png')</strong> ,
                                        @lang('image will be resized into '){{ getFileSize('watermark') }}@lang('px')</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-12 mb-30">
                <form action="{{ route('admin.promo.two') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview" style="background-image: url({{ asset('core/public/assets/image/homepage_promo/'.gs()->homepage_promo_2)}})">
                                        <button class="remove-image" type="button"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input class="homepage_promo_2" id="homepage_promo_2" name="homepage_promo_2" type="file" style="display: none">
                                    <label class="bg--success mt-2" for="homepage_promo_2">@lang('Upload Homepage Promo 2') </label>
                                    {{-- <small>@lang('Supported file ') <strong>@lang('.png')</strong> ,
                                        @lang('image will be resized into '){{ getFileSize('watermark') }}@lang('px')</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .select2-container {
            z-index: 0 !important;
        }
    </style>
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin_reviewer/js/spectrum.js') }}"></script>
@endpush

@push('style-lib')
    <link href="{{ asset('assets/admin_reviewer/css/spectrum.css') }}" rel="stylesheet">
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function(color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function() {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('select[name=timezone]').val("'{{ config('app.timezone') }}'").select2();
            $('.select2-basic').select2({
                dropdownParent: $('#generalCard')
            });

        })(jQuery);
    </script>
@endpush

@push('style')
    <style>
        .tooltip {
            z-index: 9999999999;
        }
    </style>
@endpush
