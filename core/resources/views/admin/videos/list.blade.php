@extends('admin.layouts.app')
@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Video Title')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Likes')</th>
                                    <th>@lang('Views')</th>
                                    <th>@lang('Downloads')</th>
                                    <th>@lang('Featured')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($videos as $video)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.videos.details', $video->id) }}">
                                                <div class="user gap-2">
                                                    {{-- <div class="thumb">
                                                        <img src="{{ imageUrl(getFilePath('stockImage') , $video->image_name) }}" alt="@lang('video')">
                                                    </div> --}}
                                                    <div>
                                                        {{ __($video->title) }}
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                        <td>
                                            <span class="fw-bold">
                                                {{ (implode(' | ', $video->categoryName($video->category_id))) }}
                                            </span>
                                            
                                        </td>
                                        <td>
                                            <span class="d-block">{{ __(@$video->user->fullname) }}</span>
                                            <small>
                                                <a href="{{ route('admin.users.detail', $video->user->id) }}"><span>@</span>{{ $video->user->username }}</a>
                                            </small>
                                        </td>
                                        <td>
                                            {{ shortNumber($video->total_like) }}
                                        </td>
                                        <td>
                                            {{ shortNumber($video->total_view) }}
                                        </td>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.videos.download.log', $video->id) }}">
                                                {{ shortNumber($video->total_downloads) }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($video->is_featured)
                                                <span class="badge badge--success">@lang('Featured')</span>
                                            @else
                                                <span class="badge badge--dark">@lang('Unfeatured')</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                echo $video->statusBadge;
                                            @endphp
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-1 flex-wrap">
                                                <a href="{{ route('admin.videos.details', $video->id) }}" class="btn btn-sm btn-outline--primary">
                                                    <i class="la la-desktop"></i>@lang('Details')
                                                </a>

                                                @if ($video->is_featured)
                                                    <button data-action="{{ route('admin.videos.feature.update', $video->id) }}" data-question="@lang('Are you sure to unfeature this video?')" class="btn btn-sm btn-outline--dark confirmationBtn" @if($video->status != Status::IMAGE_APPROVED) disabled @endif>
                                                        <i class="la la-times"></i>@lang('Unfeature')
                                                    </button>
                                                @else
                                                    <button data-action="{{ route('admin.videos.feature.update', $video->id) }}" data-question="@lang('Are you sure to featured this video?')" class="btn btn-sm btn-outline--success confirmationBtn" @if($video->status != Status::IMAGE_APPROVED) disabled @endif>
                                                        <i class="la la-ribbon"></i>@lang('Feature')
                                                    </button>
                                                @endif
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
                @if ($videos->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($videos) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <x-search-form placeholder="Search by User/video/Category" />
@endpush

@push('style')
    <style>
        .breadcrumb-plugins .input-group {
            width: 330px !important;
        }
    </style>
@endpush
