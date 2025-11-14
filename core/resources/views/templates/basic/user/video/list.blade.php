@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row g-3">
        @forelse ($videos as $video)
            @php
                $url = $video->video_url;
                $firstParam = '';
                if (strpos($url, 'youtu.be') !== false) {
                    // For 'youtu.be' URLs
                    $parts = explode('/', $url);
                    $firstParam = end($parts);
                } else if (strpos($url, 'youtube.com') !== false) {
                    // For 'youtube.com' URLs
                    $query = parse_url($url, PHP_URL_QUERY);
                    parse_str($query, $queryParams);
                    $firstParam = isset($queryParams['v']) ? $queryParams['v'] : '';
                }
                $video_url = "https://www.youtube.com/embed/".$firstParam;
            @endphp
            <div class="col-md-6 col-xl-4">
                <div class="card custom--card image-information-card">
                    <div class="card-body">
                        <div class="image-information">

                            <div class="action-btns">
                                <div class="btn-group">

                                    <a class="btn btn-sm btn--primary" data-bs-toggle="tooltip" href="{{ route('user.video.edit', $video->id) }}" title="Edit">
                                        <i class="las la-pen"></i>
                                    </a>
                                </div>
                            </div>

                            <a class="t-link image-information__img" href="{{ route('video.detail', [slug($video->title), $video->id]) }}">
                                {{-- <img class="image-information__img-is" src="{{ imageUrl(getFilePath('stockImage'), @$video->thumb) }}" alt="video"> --}}
                                <object data="{{$video_url}}" height="200"></object>
                                @if (!$video->is_free)
                                    <span class="gallery__premium">
                                        <i class="fas fa-crown"></i>
                                    </span>
                                @endif
                            </a>

                            <div class="image-information__content">
                                <h5 class="image-information__title"><a class="text--base" href="{{ route('video.detail', [slug($video->title), $video->id]) }}">{{ __($video->title) }}</a></h5>
                                <ul class="list" style="--gap: 0;">
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Category :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{-- {{ __($image->category->name) }} --}}
                                                {{ (implode(' | ', $video->categoryName($video->category_id))) }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Total Likes :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{ shortNumber($video->total_like) }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Total Views :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{ shortNumber($video->total_view) }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Total Downloads :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{ shortNumber($video->total_downloads) }}
                                            </div>
                                        </div>
                                    </li>
                                    
                                   
                                    @if (request()->routeIs('user.video.all'))
                                        <li>
                                            <div class="image-information__item">
                                                <div class="image-information__item-left">
                                                    @lang(' Status :')
                                                </div>
                                                <div class="image-information__item-right">
                                                    @php echo $video->statusBadge; @endphp
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <img src="{{ getImage('assets/images/empty_message.png') }}" alt="@lang('video')">
            </div>
        @endforelse

        @if ($videos->hasPages())
            <div class="d-flex justify-content-end">
                {{ paginateLinks($videos) }}
            </div>
        @endif



    </div>

    <x-confirmation-modal />
@endsection
