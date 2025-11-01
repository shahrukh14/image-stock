@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.setting.default.image.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{ getImage(getFilePath('defaultImage') . '/' . @$general->default_cover_photo) }})">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="default_cover_photo" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Cover Photo')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{ getImage(getFilePath('defaultImage') . '/' . @$general->default_loading_image) }})">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="default_loading_image" id="profilePicUpload4" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload4" class="bg--success">@lang('Upload Loading Image')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary h-45 w-100 mt-4">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
