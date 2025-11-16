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
                            <input type="date" class="form-control" placeholder="@lang('Date')" name="date" value="{{ $blog->date }}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('Slug') </label>
                            @php
                                $withSpaces = str_replace('-', ' ', $blog->slug);
                                $lowercaseStr = strtolower($withSpaces);
                                $slug = ucwords($lowercaseStr);
                            @endphp
                            <input type="text" class="form-control " placeholder="@lang('Slug')" name="slug" value="{{ $slug }}" required/>
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
                            <textarea name="blog_body" id="blog_body" rows="10" class="form-control">{{ $blog->blog_body }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <h5 class="form-group">SEO Section</h5>
                    </div>
                    @php
                        $seo_data = json_decode($blog->seo_data);
                    @endphp
                    <input type="hidden" name="seo_data[seo_image]" value=" ">
                    <div class="col-md-12">
                        <div class="form-group select2-parent position-relative">
                            <label>@lang('Meta Keywords')</label>
                            <small class="ms-2 mt-2  ">@lang('Separate multiple keywords by') <code>,</code>(@lang('comma')) @lang('or') <code>@lang('enter')</code> @lang('key')</small>
                            <select name="seo_data[keywords][]" class="form-control select2-auto-tokenize"  multiple="multiple" required>
                                @if($seo_data != null && $seo_data->keywords)
                                    @foreach($seo_data->keywords as $option)
                                        <option value="{{ $option }}" selected>{{ __($option) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <label>@lang('Meta Description')</label>
                        <textarea name="seo_data[description]" rows="3" class="form-control" required>@if($seo_data){{ $seo_data->description}} @endif</textarea>
                    </div>

                    <div class="col-md-12">
                        <label>@lang('Social Title')</label>
                        <input type="text" class="form-control" name="seo_data[social_title]" value="@if($seo_data) {{ $seo_data->social_title}}  @endif" required/>
                    </div>
                    <div class="col-md-12">
                        <label>@lang('Social Description')</label>
                        <textarea name="seo_data[social_description]" rows="3" class="form-control" required>@if($seo_data){{ $seo_data->social_description}} @endif</textarea>
                    </div>
                    <input type="hidden" name="seo_data[image]" value=" ">
                </div>
                <button type="submit" class="btn w-100 bg--green h-45 mt-3">@lang('Submit')</button>
                    
                </div>
            </form>
        </div>
    </div><!-- card end -->
</div>

@endsection

@push('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('blog_body');
</script>
@endpush