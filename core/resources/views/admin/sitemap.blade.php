@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            @lang('A sitemap is a file where you provide information about the pages, videos, and other files on your site, and the relationships between them. Search engines like Google read this file to crawl your site more efficiently. A sitemap tells Google which pages and files you think are important in your site, and also provides valuable information about these files.')
                        </div>

                        <div class="form-group">
                            <label>@lang('XML File')</label>
                            <input type="file" class="form-control" name="sitemap" accept=".xml" required>
                        </div>
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .alert {
            padding: 15px;
        }
    </style>
@endpush
