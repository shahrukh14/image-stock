@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row g-3">
        @forelse ($vectors as $vector)
            <div class="col-md-6 col-xl-4">
                <div class="card custom--card image-information-card">
                    <div class="card-body">
                        <div class="image-information">

                            <div class="action-btns">
                                <div class="btn-group">

                                    <a class="btn btn-sm btn--primary" data-bs-toggle="tooltip" href="{{ route('user.vector.edit', $vector->id) }}" title="Edit">
                                        <i class="las la-pen"></i>
                                    </a>
                                </div>
                            </div>

                            <a class="t-link image-information__img" href="{{ route('vector.detail', [slug($vector->title), $vector->id]) }}">
                                <img class="image-information__img-is" src="{{ imageUrl(getFilePath('stockImage'), @$vector->thumb) }}" alt="vector">
                                @if (!$vector->is_free)
                                    <span class="gallery__premium">
                                        <i class="fas fa-crown"></i>
                                    </span>
                                @endif
                            </a>

                            <div class="image-information__content">
                                <h5 class="image-information__title"><a class="text--base" href="{{ route('vector.detail', [slug($vector->title), $vector->id]) }}">{{ __($vector->title) }}</a></h5>
                                <ul class="list" style="--gap: 0;">
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Category :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{-- {{ __($image->category->name) }} --}}
                                                {{ (implode(' | ', $vector->categoryName($vector->category_id))) }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Total Likes :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{ shortNumber($vector->total_like) }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Total Views :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{ shortNumber($vector->total_view) }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image-information__item">
                                            <div class="image-information__item-left">
                                                @lang('Total Downloads :')
                                            </div>
                                            <div class="image-information__item-right">
                                                {{ shortNumber($vector->total_downloads) }}
                                            </div>
                                        </div>
                                    </li>
                                    
                                   
                                    @if (request()->routeIs('user.vector.all'))
                                        <li>
                                            <div class="image-information__item">
                                                <div class="image-information__item-left">
                                                    @lang(' Status :')
                                                </div>
                                                <div class="image-information__item-right">
                                                    @php echo $vector->statusBadge; @endphp
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
                <img src="{{ getImage('assets/images/empty_message.png') }}" alt="@lang('vector')">
            </div>
        @endforelse

        @if ($vectors->hasPages())
            <div class="d-flex justify-content-end">
                {{ paginateLinks($vectors) }}
            </div>
        @endif



    </div>

    <x-confirmation-modal />
@endsection
