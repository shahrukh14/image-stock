@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="card custom--card">
                <h5 class="card-header">
                    {{ __($pageTitle) }}
                </h5>

                <div class="card-body">
                    <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-3">

                            <div class="col-md-6">
                                <label class="form-label">@lang('Subject')</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control form--control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">@lang('Priority')</label>
                                <div class="form--select">
                                    <select name="priority" class="form-select" required>
                                        <option value="3">@lang('High')</option>
                                        <option value="2">@lang('Medium')</option>
                                        <option value="1">@lang('Low')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">@lang('Message')</label>
                                <textarea name="message" id="inputMessage" rows="6" class="form-control form--control" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn--base addFile"><i class="fas fa-plus"></i> @lang('Add More')</button>
                            </div>
                            <div class="col-md-12">
                                <div class="file-upload">
                                    <label class="form-label d-flex justify-content-between flex-wrap">
                                        <span>@lang('Attachments')</span>
                                        <small class="text--danger">@lang('Max 5 files can be uploaded'). @lang('Maximum upload size is') {{ ini_get('upload_max_filesize') }}</small>
                                    </label>
                                    <div class="iCol-md-12">
                                        <input type="file" class="form-control form--control" name="attachments[]" id="inputAttachments">
                                    </div>
                                    <div id="fileUploadsContainer" class="list"></div>
                                    <code class="xsm-text text-muted"><i class="fas fa-info-circle"></i> @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'), .@lang('png'), .@lang('pdf'), .@lang('doc'), .@lang('docx')</code>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn--base btn--lg w-100 fw-bold" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;@lang('Submit')</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
