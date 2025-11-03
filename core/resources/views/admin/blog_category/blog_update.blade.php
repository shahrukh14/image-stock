@extends('admin.layouts.app')
@section('panel')
<div class="col-md-12">
    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('admin.blog.update.data.new',['id'=> $blog->id ]) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('Title') </label>
                            <input type="text" class="form-control " placeholder="@lang('Title')" name="title" value="{{ $blog->title }}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('Author') </label>
                            <input type="text" class="form-control " placeholder="@lang('Author')" name="author" value="{{ $blog->author }}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('category') </label>
                            <div class="form--select">
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">@lang('Select One')</option>
                                    @foreach ($categories as $item)
                                      <option value="{{$item->id}}" @if($item->id==$blog->category) @selected(true) @endif>@lang($item->blog_category)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('Date') </label>
                            <input type="date" class="form-control " placeholder="@lang('Date')" name="date" value="{{ $blog->date }}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('Feature Image') </label>
                            <input class="form-control" type="file" placeholder="@lang('Feature Image')" id="file" value="" name="file"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('Blog Body') </label>
                            <textarea name="blog_body" rows="10" class="form-control  nicEdit" placeholder="@lang('Your email template')">{{ $blog->blog_body }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn w-100 bg--green h-45">@lang('Submit')</button>
            </form>
        </div>
    </div><!-- card end -->
</div>

@endsection