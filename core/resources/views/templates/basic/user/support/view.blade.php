@php
    $user = auth()->user();
@endphp
@extends($activeTemplate . 'layouts.' . $layout)
@section('content')
    @if (!$user)
        <div class="container custom--container section--xl">
            <div class="container">
    @endif
    <div class="row justify-content-center">
        <div class="@if (!$user) col-md-8 col-xl-8 col-xxl-10 @else col-12 @endif">
            <div class="col-md-12">
                <div class="card custom--card support-ticket">
                    <div class="card-header justify-content-between flex-wrap">
                        <h5 class="m-0">
                            @php echo $myTicket->statusBadge; @endphp
                            [@lang('Ticket')#{{ $myTicket->ticket }}] {{ $myTicket->subject }}
                        </h5>
                        @if ($myTicket->status != Status::TICKET_CLOSE && $myTicket->user)
                            <button class="btn btn--danger close-button btn-sm confirmationBtn" type="button" data-question="@lang('Are you sure to close this ticket?')" data-action="{{ route('ticket.close', $myTicket->id) }}"><i class="fa fa-lg fa-times-circle"></i>
                            </button>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('ticket.reply', $myTicket->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-between gy-3">
                                <div class="col-md-12">
                                    <label class="form-label">@lang('Message')</label>
                                    <textarea name="message" class="form-control form--control" rows="6" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-md-12 text-end">
                                    <button type="button" class="btn btn--base btn-sm addFile"><i class="las la-plus"></i> @lang('Add More')</button>
                                </div>
                                <div class="col-12">
                                    <div class="file-upload">
                                        <label class="form-label d-flex justify-content-between flex-wrap">
                                            <span>@lang('Attachments')</span>
                                            <small class="text--danger">@lang('Max 5 files can be uploaded'). @lang('Maximum upload size is') {{ ini_get('upload_max_filesize') }}</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="file" class="form-control form--control" name="attachments[]" id="inputAttachments" />
                                        </div>
                                        <div id="fileUploadsContainer" class="list"></div>
                                        <code class="xsm-text text-muted"><i class="fas fa-info-circle"></i> @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'), .@lang('png'), .@lang('pdf'), .@lang('doc'), .@lang('docx')</code>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn--base" type="submit">
                                        <i class="fas fa-reply"></i>
                                        @lang('Reply')
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <ul class="list support-list">
                            @foreach ($messages as $message)
                                <li>
                                    <div class="support-card">
                                        <div class="support-card__head">
                                            <h5 class="support-card__title">
                                                @if ($message->admin_id)
                                                    {{ $message->admin->name }}
                                                @else
                                                    {{ $message->ticket->name }}
                                                @endif
                                            </h5>
                                            <span class="support-card__date">
                                                <code class="xsm-text text-muted"><i class="far fa-calendar-alt"></i> @lang('Posted on'), {{ $message->created_at->format('l, dS F Y @ H:i') }}</code>
                                            </span>
                                        </div>
                                        <div class="support-card__body">
                                            <p class="support-card__body-text text-center text-md-start mb-0">
                                                {{ $message->message }}
                                            </p>
                                            @if ($message->attachments->count() > 0)
                                                <ul class="list list--row flex-wrap support-card__list justify-content-center justify-content-md-start">

                                                    @foreach ($message->attachments as $k => $image)
                                                        <li>
                                                            <a href="{{ route('ticket.download', encrypt($image->id)) }}" class="support-card__file">
                                                                <span class="support-card__file-icon">
                                                                    <i class="far fa-file-alt"></i>
                                                                </span>

                                                                <span class="support-card__file-text">
                                                                    @lang('Attachment') {{ ++$k }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$user)
        </div>
        </div>
    @endif
    <x-confirmation-modal />
@endsection
