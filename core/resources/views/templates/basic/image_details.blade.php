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
                    <div class="inner-container _896px _100---tablet">
                        <div style="opacity: 1;" class="position-relative">
                            @if($image->thumb_resource)
                                <div class="flexslider" id="slider">
                                    <ul class="slides">
                                        @foreach ($image->thumb_resource ?? [] as $thumb)
                                        <li>
                                            <img alt="{{$image->title}}"   src="{{ imageUrl(getFilePath('stockImage'), $thumb, null, true) }}" class="image background-image">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="flexslider" id="carousel">
                                    <ul class="slides">
                                        @foreach ($image->thumb_resource ?? [] as $thumb)
                                        <li>
                                            <img alt="{{$image->title}}"   src="{{ imageUrl(getFilePath('stockImage'), $thumb, null, true) }}" class="image background-image">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <div class="image-wrapper product-image">
                                    <img alt="{{$image->title}}"   src="{{ imageUrl(getFilePath('stockImage'), $image->image_name) }}" class="image background-image">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="product-page-main-content">
                        <div class="product-page-main-content---top">
                            <h1 class="display-3 mg-bottom-4px">{{ __($image->title) }}</h1>
                            <p class="mg-bottom-0" style="word-wrap: break-word;">@php echo $image->description; @endphp</p>
                        </div>
                        <div class="product-page-main-content---bottom">
                            <div class="mg-bottom-24px keep">
                                <div class="flex-horizontal start flex-wrap">

                                @foreach ($imageFiles as $key => $imageFile)
                                @php
                                    if(auth()->user()){
                                        $user = auth()->user()->load('purchasedPlan.plan', 'downloads');
                                        if($user->purchasedPlan){
                                            $availableDownload = $user->purchasedPlan->daily_limit - $user->downloads()->whereDate('created_at', now())->count();
                                        }else{
                                            $availableDownload=0;
                                        }
                                    }else{
                                        $user = [];
                                        $availableDownload = 0;
                                    }
 
                                    if (auth()->user() && $user->purchasedPlan && $imageFile->exclued_package == "no") {
                                        $downloadActionClass = 'downloadByPlan';
                                    }else{
                                        $downloadActionClass = 'downloadByPayment';
                                    }

                                    
                                @endphp

                                    @if($imageFile->price != 0  && $imageFile->ex_price != 0)
                                        @for($i=0; $i < 2; $i++)
                                        <div class="spanDiv">
                                            @if($i == 0)
                                                <span class="download-span">{{ showAmount($imageFile->price) }} {{ __($general->cur_text) }} </span>
                                            @else
                                                <span class="download-span">{{ showAmount($imageFile->ex_price) }} {{ __($general->cur_text) }} </span>
                                            @endif

                                            <span class="download-span">|<span>
                                            <span class="download-span">{{ $imageFile->resolution }}</span>
                                            <span class="download-span">|<span>

                                            @if($i == 0)
                                                <span class="download-span">Standard License<span>
                                            @else
                                                <span class="download-span">Extended License<span>
                                            @endif

                                            <span class="download-span">|<span>

                                            @if($i == 0)
                                                @if(auth()->user() && $user->purchasedPlan && $user->purchasedPlan->plan->plan_for == 'photo' && $imageFile->exclued_package == "no" && $availableDownload > 0)
                                                {{-- @if(auth()->user() && $user->alredyDownload($imageFile->id, "standard") == "yes") --}}
                                                    <a href="{{ route('user.image.download.file', ['id'=>$imageFile->id, 'type'=>'standard']) }}" class="download-span" style="text-decoration: none;">
                                                        Download
                                                    </a>
                                                @else
                                                    <span class="download-span {{ $downloadActionClass }}" data-type="standard" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')" style="cursor: pointer;">
                                                        Buy
                                                    </span>
                                                @endif
                                            @else
                                                <span class="download-span downloadByPayment" data-type="extended" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')" style="cursor: pointer;">
                                                    Buy
                                                </span>
                                                {{-- @if(auth()->user() && $user->purchasedPlan && $imageFile->exclued_package == "no" && $availableDownload > 0)
                                                @if(auth()->user() && $user->alredyDownload($imageFile->id, "extended") == "yes")
                                                    <a href="{{ route('user.image.download.file', ['id'=>$imageFile->id, 'type'=>'extended']) }}" class="download-span" style="text-decoration: none;">
                                                        Download
                                                    </a>
                                                @else
                                                    <span class="download-span {{ $downloadActionClass }}" data-type="extended" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')" style="cursor: pointer;">
                                                        Buy
                                                    </span>
                                                @endif --}}
                                            @endif

                                            @if($imageFile->exclued_package == "yes")
                                            <span style="color: red;">Note* : Can't download through package</span>
                                            @endif
                                        </div>
                                        @endfor

                                    @else
                                    <div class="spanDiv confirmationBtn">
                                        <span class="download-span">{{ showAmount($imageFile->price) }} {{ __($general->cur_text) }} </span>
                                        <span class="download-span">|<span>
                                        <span class="download-span">{{ $imageFile->resolution }}</span>
                                        <span class="download-span">|<span>
                                        <span class="download-span">Standard License<span>
                                        <span class="download-span">|<span>
                                        {{-- <span class="download-span {{ $downloadActionClass }}"  data-type="standard" data-action="{{ route('image.download', encrypt($imageFile->id)) }}" data-question="@lang('Are you sure to download of this file ?')"  style="cursor: pointer;">
                                            Download
                                        </span> --}}
                                        <a href="{{ route('user.image.download.file', $imageFile->id) }}" class="download-span" style="text-decoration: none;">
                                            Download
                                        </a>
                                        @if($imageFile->exclued_package == "yes")
                                        <span style="color: red;">Note* : Can't download through package</span>
                                        @endif
                                    </div>
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
                                    {{-- <div class="buttons-row add-cart-buttons">
                                        <input type="submit" value="Add to Cart" class="w-commerce-commerceaddtocartbutton btn-primary width-100">
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="inner-container _896px _100---tablet">
                        <div class="product-details-wrapper">
                            <div>
                                <div class="flex-horizontal start gap-12px flex-wrap">
                                    <div>
                                        <div class="heading-h6-size mg-bottom-2px">{{($image->user->fullname) }}</div>
                                        <div class="text-100 medium">{{date('M d, Y', strtotime($image->upload_date))}}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Resolution</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\resolution-icon-stock-x-webflow-template.svg') }}" alt="Resolution">
                                    @php
                                        $resolutions=[];
                                        foreach ($imageFiles as $key => $imageFile){
                                            array_push($resolutions, $imageFile->resolution);
                                        }
                                    @endphp
                                    <div class="text-100 medium color-neutral-700">{{ __(strtoupper(implode(' | ', $resolutions))) }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Category</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\_type-icon-stock-x-webflow-template.svg') }}" alt="Size">
                                     <div class="text-100 medium color-neutral-700">{{ (implode(' | ', $image->categoryName($image->category_id))) }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Type</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\_type-icon-stock-x-webflow-template.svg') }}" alt="Type">
                                    @if ($image->extensions)
                                        <div class="text-100 medium color-neutral-700">{{ __(strtoupper(implode(' | ', $image->extensions))) }}</div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">DPI</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\_type-icon-stock-x-webflow-template.svg') }}" alt="Type">
                                    @php
                                        $dpi=[];
                                        foreach ($imageFiles as $key => $imageFile){
                                            array_push($dpi, $imageFile->dpi);
                                        }
                                    @endphp
                                    <div class="text-100 medium color-neutral-700">{{ __(strtoupper(implode(' | ', $dpi))) }}</div>
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
    <x-image_download_by_plan_modal />
    <x-image_download_by_payment_modal />

    @include($activeTemplate . 'partials.collection_modal')
    @include($activeTemplate . 'partials.share_modal')
    @include($activeTemplate . 'partials.login_modal')
@endsection


@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css" />
@endpush

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

    .download-span{
        margin-right: 5px;
    }

    .downloadBtn{
        padding: 1px 10px;
        margin-bottom: 3px;
        border-radius: 20px;
        border: 2px solid #000 !important;
        text-decoration: none;
    }


    .spanDiv{
        padding: 10px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        border-radius: 10px;
        font-size: 14px;
    }

    .flexslider {
        margin: 0 0 0px !important;
    }

    .flexslider:hover .flex-direction-nav .flex-prev {
        opacity: 1 !important;
    }

    .flexslider:hover .flex-direction-nav .flex-next {
        opacity: 1 !important;
    }

  </style>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js" integrity="sha512-BmoWLYENsSaAfQfHszJM7cLiy9Ml4I0n1YtBQKfx8PaYpZ3SoTXfj3YiDNn0GAdveOCNbK8WqQQYaSb0CMjTHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
    });

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
