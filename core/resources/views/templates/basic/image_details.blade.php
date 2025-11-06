@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <div class="page-wrapper">
        <section class="section top">
            <div class="container-default w-container">
                <div class="mg-bottom-32px keep">
                    <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="flex-horizontal start breadcrumbs">
                        <a href="{{ route('home') }}" class="text-link text-200 medium" style="text-decoration: none;">Home</a>
                        <div class="anchor-link-divider">
                            <div class="line-square-icon"></div>
                        </div>
                        <div>
                            <div class="w-dyn-list">
                                <div role="list" class="w-dyn-items">
                                    <div role="listitem" class="w-dyn-item">
                                        <a href="{{ route('photos') }}" class="text-link text-200 medium" style="text-decoration: none;">Photos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="anchor-link-divider">
                            <div class="line-square-icon"></div>
                        </div>
                        <div>
                            <div class="w-dyn-list">
                                <div role="list" class="w-dyn-items">
                                    <div role="listitem" class="w-dyn-item">
                                        <a href="{{ route('photos', 'category='.$image->Category->name ) }}" class="text-link text-200 medium" style="text-decoration: none;">{{$image->Category->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="anchor-link-divider">
                            <div class="line-square-icon"></div>
                        </div>
                        <div class="text-200 medium">{{$image->title}}</div>
                    </div>
                </div>
                <div class="w-layout-grid grid-2-columns product-page">
                    <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"  class="inner-container _896px _100---tablet">
                        <div style="opacity: 1;" class="position-relative">
                            <div class="image-wrapper product-image"><img alt="{{$image->title}}" 
                                    src="{{ imageUrl(getFilePath('stockImage'), $image->image_name) }}"
                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1.1, 1.1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;" sizes="(max-width: 479px) 92vw, (max-width: 991px) 94vw, (max-width: 1439px) 66vw, 895.9896240234375px"
                                    class="image background-image">
                            </div>
                            <a href="https://stocktemplate.webflow.io/product/3d-render-of-beautiful-black-waves-background#" class="media-ligthbox w-inline-block w-lightbox" aria-label="open lightbox"  aria-haspopup="dialog"></a>
                            <a href="https://stocktemplate.webflow.io/product/3d-render-of-beautiful-black-waves-background#" class="video-ligthbox-wrapper w-inline-block w-condition-invisible w-dyn-bind-empty w-lightbox" aria-label="open lightbox" aria-haspopup="dialog">
                                <img src="./3D render of beautiful black waves background - Stock X - Webflow Ecommerce website template_files/6434d7296fe32077080d737b_play-button-large-icon-stock-x-webflow-template.svg" alt="Play Button - Stock X Webflow Template">
                            </a>
                        </div>
                    </div>
                    <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="product-page-main-content">
                        <div class="product-page-main-content---top">
                            <h1 class="display-3 mg-bottom-4px">{{ __($image->title) }}</h1>
                            <p class="mg-bottom-0">{{ __($image->description) }}</p>
                        </div>
                        <div class="product-page-main-content---bottom">
                            <div class="mg-bottom-24px keep">
                                <div class="flex-horizontal start flex-wrap">
                                @foreach ($imageFiles as $key => $imageFile)
                                @if ($imageFile->is_free == Status::PREMIUM)
                                    <div class="heading-h2-size mg-right-22px">{{ showAmount($imageFile->price) }} {{ __($general->cur_text) }}</div>
                                    <div class="heading-h2-size compare-at-price">{{ showAmount($imageFile->price + 5) }} {{ __($general->cur_text) }}</div>
                                @else
                                    <div class="heading-h2-size" style="margin-left:155px">FREE</div>
                                @endif
                                    
                                @endforeach
                                </div>
                            </div>
                            <div class="add-cart">
                                <form class="w-commerce-commerceaddtocartform mg-bottom-0">
                                    <div class="mg-bottom-24px">
                                        <div class="flex-horizontal">
                                            <div class="width-100">
                                                <div>
                                                    <label class="hidden-on-desktop">license</label>
                                                </div>
                                            </div>
                                            <div class="hidden-on-desktop">
                                                <label>Quantity</label>
                                                <input type="number" pattern="^[0-9]+$" name="cart_quantity" min="1" class="w-commerce-commerceaddtocartquantityinput input quntity" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons-row add-cart-buttons"><input type="submit" value="Add to Cart" class="w-commerce-commerceaddtocartbutton btn-primary width-100">
                                        <a style="display:none"  class="w-commerce-commercebuynowbutton btn-secondary width-100 mg-top-0px w-dyn-hide" href="https://stocktemplate.webflow.io/checkout">Buy now</a>
                                    </div>
                                </form>
                                <div style="display:none" class="w-commerce-commerceaddtocartoutofstock" tabindex="0">
                                    <div>This product is out of stock.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inner-container _896px _100---tablet">
                        <div class="product-details-wrapper">
                            <div>
                                <a href="https://stocktemplate.webflow.io/author/graham-hills"  class="content-link w-inline-block">
                                    <div class="flex-horizontal start gap-12px flex-wrap">
                                        <div>
                                            <div class="heading-h6-size mg-bottom-2px">{{($image->user->fullname) }}</div>
                                            <div class="text-100 medium">{{date('M d, Y', strtotime($image->upload_date))}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Resolution</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\resolution-icon-stock-x-webflow-template.svg') }}" alt="Resolution">
                                    @foreach ($imageFiles as $key => $imageFile)
                                        <div class="text-100 medium color-neutral-700">{{ $imageFile->resolution }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Category</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\_type-icon-stock-x-webflow-template.svg') }}" alt="Size">
                                    <div class="text-100 medium color-neutral-700">{{ $image->Category->name}}</div>
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Type</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\_type-icon-stock-x-webflow-template.svg') }}" alt="Type">
                                    @if ($image->extensions)
                                        <div class="text-100 medium color-neutral-700">{{ __(strtoupper(implode(', ', $image->extensions))) }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section padding-top-20">
            <div class="container-default w-container">
                <div style=" transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1)  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="mg-bottom-32px keep">
                    <div class="w-layout-grid grid-2-columns title-and-buttons">
                        <h2 class="display-3 mg-bottom-0">Related Photos</h2>
                        <div class="buttons-row">
                            <a href="{{ route('photos') }}" class="btn-secondary w-button">Browse all Photos</a>
                        </div>
                    </div>
                </div>
                <div class="w-dyn-list">
                    <div role="list" class="grid-3-columns _1-col-tablet gap-row-48px w-dyn-items">
                        @foreach ($relatedImages as $related_image)
                        @php
                            $imageUrl = imageUrl(getFilePath('stockImage'), $related_image->thumb);
                            $defaultImage = getImage('assets/images/frontend/default_images/' . @$defaultImageContent->data_values->loading_image);
                        @endphp
                       <div role="listitem" class="w-dyn-item">
                        <a  href="{{ route('image.detail', [slug($related_image->title), $related_image->id]) }}" class="resource-card-wrapper w-inline-block">
                          <div class="image-wrapper">
                            <img alt="Image" class="gallery__img lazy-loading-img" data-image_src="{{ $imageUrl }}" src="{{ $defaultImage }}"/>
                          </div>
                          <div class="resource-card-content v2">
                            <div class="text-200 color-neutral-100 mg-bottom-24px">
                              #{{$related_image->track_id}}
                            </div>
                            <div class="mg-top-auto">
                              <div class="flex-horizontal space-between gap-16px">
                                <div  class="flex-horizontal start gap-12px flex-wrap">
                                  <div class="avatar-circle _02">
                                    <img src="{{ getImage(getFilePath('userProfile') . '/' . $related_image->user->image, null, 'user') }}" alt="{{$related_image->user->firstname}}" />
                                  </div>
                                  <div>
                                    <div class="heading-h6-size color-neutral-100">
                                      {{$related_image->user->firstname}}
                                    </div>
                                    <div class="text-50 color-neutral-300">
                                      {{date('d-M-Y', strtotime($related_image->upload_date))}}
                                    </div>
                                  </div>
                                </div>
                                <div class="resource-card-arrow">
                                  <div class="line-square-icon"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<style>
    .gallery__img {
        width: 100%;
        height: 100%;
        border-radius: 2px;
        object-fit: cover;
        vertical-align: bottom;
        transition: all 0.3s ease;
        transform-origin: center;
        position: relative;
        z-index: -1;
    }
  </style>
@push('script')
<script>
        //lazy loading image
	let images = document.querySelectorAll(".lazy-loading-img");
	function preloadImage(image) {
		const src = image.getAttribute("data-image_src");
		image.src = src;
	}

	let imageOptions = {
		threshold: 1,
	};

	const imageObserver = new IntersectionObserver((entries, imageObserver) => {
		entries.forEach((entry) => {
			if (!entry.isIntersecting) {
				return;
			} else {
				preloadImage(entry.target);
				imageObserver.unobserve(entry.target);
			}
		});
	}, imageOptions);

	images.forEach((image) => {
		imageObserver.observe(image);
	});
	//lazy loading image end
</script>
@endpush