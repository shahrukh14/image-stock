@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30 justify-content-center mt-5">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-header">
                <h5>@lang('Vector Banner')</h5>
            </div>
            @php
                $vector_setting = json_decode(gs()->vector_setting);
            @endphp
            <div class="card-body">
                <form action="{{ route('admin.vector.page.update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> @lang('Heading') </label>
                        <input class="form-control" name="vector_setting[heading]" type="text" value="@if($vector_setting){{ $vector_setting->heading }} @endif">
                    </div>
                    <div class="form-group">
                        <label> @lang('Sub - Heading') </label>
                        <input class="form-control" name="vector_setting[sub_heading]" type="text" value="@if($vector_setting) {{  $vector_setting->sub_heading }}@endif">
                    </div>

                    <div class="form-group">
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="hero-banner-1-preview">
                                    @php
                                    if($vector_setting){
                                        $vector_setting_image = $vector_setting->image;
                                    }else{
                                        $vector_setting_image = "photos_default_banner.jpg";
                                    }
                                    @endphp
                                    <div class="profilePicPreview" style="background-image: url({{ asset('core/public/assets/image/vector_setting/'.$vector_setting_image)}})">
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input class="vector_setting" id="vector_setting" name="vector_setting[image]" type="file" style="display: none">
                                    <label class="bg--success mt-2" for="vector_setting">@lang('Upload Banner') </label>
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
</div>
@endsection