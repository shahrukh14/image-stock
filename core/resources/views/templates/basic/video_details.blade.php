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
                                        <a href="{{ route('videos') }}" class="text-link text-200 medium" style="text-decoration: none;">Videos</a>
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
                                        <a href="{{ route('videos', 'category='.$video->Category->name ) }}" class="text-link text-200 medium" style="text-decoration: none;">{{$video->Category->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="anchor-link-divider">
                            <div class="line-square-icon"></div>
                        </div>
                        <div class="text-200 medium">{{$video->title}}</div>
                    </div>
                </div>
                <div class="w-layout-grid grid-2-columns product-page">
                    <div class="inner-container _896px _100---tablet">
                        <div style="opacity: 1;" class="position-relative">
                            <div class="image-wrapper product-image">
                                <object data="{{$video_url}}" height="500" width="900"></object>
                            </div>
                        </div>
                    </div>
                    <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="product-page-main-content">
                        <div class="product-page-main-content---top">
                            <h1 class="display-3 mg-bottom-4px">{{ __($video->title) }}</h1>
                            <p class="mg-bottom-0" style="word-wrap: break-word;">@php echo $video->description; @endphp</p>
                            <div style="margin-bottom:10px;">
                                <span style="color:blue; text-decoration:underline; cursor:pointer;" id="checkPricingBtn">Check Pricing</span>
                                <p class="mg-bottom-0" style="word-wrap: break-word;">Buy individual, Package plan or One-time Buy-out with copyright.</p>
                            </div>
                        </div>
                        <div class="product-page-main-content---bottom">
                            <div class="mg-bottom-24px keep">
                                <div class="flex-horizontal center flex-wrap">

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
                                        <div class="priceDetailsDiv" style="display:flex; align-items: center;">
                                            <div class="form-group" style="margin-right:8px;">
                                                @if($i == 0)
                                                    @if(auth()->user() && $user->purchasedPlan && $user->purchasedPlan->plan->plan_for == 'photo' && $imageFile->exclued_package == "no" && $availableDownload > 0)
                                                        <a href="{{ route('user.image.download.file', ['id'=>$imageFile->id, 'type'=>'standard']) }}" class="download-span" style="text-decoration: none;">
                                                            Download 
                                                        </a>
                                                    @else
                                                        <input type="radio" class="form-check-input radioCheck" name="type" value="{{$i}}" data-class="{{ $downloadActionClass }}" data-type="standard" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')">
                                                    @endif
                                                @else
                                                    <input type="radio" class="form-check-input radioCheck" name="type" value="{{$i}}" data-class="downloadByPayment" data-type="extended" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')">
                                                @endif
                                            </div>
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

                                                {{-- <span class="download-span">|<span> --}}
                                                {{-- @if($i == 0)
                                                    @if(auth()->user() && $user->purchasedPlan && $user->purchasedPlan->plan->plan_for == 'video' && $imageFile->exclued_package == "no" && $availableDownload > 0)
                                                        <a href="{{ route('user.image.download.file', ['id'=>$imageFile->id, 'type'=>'standard']) }}" class="download-span" style="text-decoration: none;">
                                                            Download
                                                        </a>
                                                    @else
                                                        <span class="buyBtn download-span {{ $downloadActionClass }}" data-type="standard" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')" style="cursor: pointer;">
                                                            Buy
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="buyBtn download-span downloadByPayment" data-type="extended" data-file="{{$imageFile->id}}" @if($user != [] && $user->purchasedPlan && $imageFile->exclued_package == "no") data-action="{{ route('image.download', encrypt($imageFile->id)) }}" @else data-action="{{ route('user.purchase.image') }}" @endif data-question="@lang('Are you sure to download of this file ?')" style="cursor: pointer;">
                                                        Buy
                                                    </span>
                                                @endif --}}

                                                @if($imageFile->exclued_package == "yes")
                                                <span style="color: red;">Note* : Can't download through package</span>
                                                @endif
                                            </div>
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
                                        <a href="{{ route('user.image.download.file', ['id'=>$imageFile->id, 'type'=>'standard']) }}" class="download-span" style="text-decoration: none;">
                                            Download
                                        </a>
                                        @if($imageFile->exclued_package == "yes")
                                        <span style="color: red;">Note* : Can't download through package</span>
                                        @endif
                                    </div>
                                    @endif
                                @endforeach
                                <span class="buyBtn download-span singleBuyButton" style="cursor: pointer;"> Buy </span>
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
                                        <div class="heading-h6-size mg-bottom-2px">{{($video->user->fullname) }}</div>
                                        <div class="text-100 medium">{{date('M d, Y', strtotime($video->upload_date))}}</div>
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
                                     <div class="text-100 medium color-neutral-700">{{ (implode(' | ', $video->categoryName($video->category_id))) }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-8px">
                                    <div class="text-100 bold color-neutral-800">Type</div>
                                </div>
                                <div class="flex-horizontal start gap-6px">
                                    <img src="{{ asset('assets\images\app_images\_type-icon-stock-x-webflow-template.svg') }}" alt="Type">
                                    @if ($video->extensions)
                                        <div class="text-100 medium color-neutral-700">{{ __(strtoupper(implode(' | ', $video->extensions))) }}</div>
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
                        <h2 class="display-3 mg-bottom-0">Related Videos</h2>
                        <div class="buttons-row">
                            <a href="{{ route('videos') }}" class="browseAllVideos"> </a>
                        </div>
                    </div>
                </div>
                <div class="w-dyn-list">
                    <div role="list" class="grid-3-columns _1-col-tablet gap-row-48px w-dyn-items">
                        @foreach ($relatedVideos as $relatedVideo)
                        @php
                            $vid_url = $relatedVideo->video_url;
                            $firstPar = '';
                            if (strpos($vid_url, 'youtu.be') !== false) {
                                // For 'youtu.be' URLs
                                $part = explode('/', $vid_url);
                                $firstPar = end($part);
                            } else if (strpos($vid_url, 'youtube.com') !== false) {
                                // For 'youtube.com' URLs
                                $quer = parse_url($vid_url, PHP_URL_QUERY);
                                parse_str($quer, $queryPar);
                                $firstPar = isset($queryPar['v']) ? $queryPar['v'] : '';
                            }
                            $related_video_url = "https://www.youtube.com/embed/".$firstPar;
                        @endphp
                       <div role="listitem" class="w-dyn-item">
                        <a  href="{{ route('video.detail', [slug($relatedVideo->title), $relatedVideo->id]) }}" class="resource-card-wrapper w-inline-block">
                          <div class="image-wrapper">
                            {{-- <img alt="Image" class="gallery__img lazy-loading-img" data-image_src="{{ $videoUrl }}" src="{{ $defaultImage }}"/> --}}
                            <object data="{{$related_video_url}}" height="200"></object>
                          </div>
                          <div class="resource-card-content v2">
                            <div class="text-200 color-neutral-100 mg-bottom-24px">
                              #{{$relatedVideo->track_id}}
                            </div>
                            <div class="mg-top-auto">
                              <div class="flex-horizontal space-between gap-16px">
                                <div  class="flex-horizontal start gap-12px flex-wrap">
                                  <div class="avatar-circle _02">
                                    <img src="{{ getImage(getFilePath('userProfile') . '/' . $relatedVideo->user->image, null, 'user') }}" alt="{{$relatedVideo->user->firstname}}" />
                                  </div>
                                  <div>
                                    <div class="heading-h6-size color-neutral-100">
                                      {{$relatedVideo->user->firstname}}
                                    </div>
                                    <div class="text-50 color-neutral-300">
                                      {{date('d-M-Y', strtotime($relatedVideo->upload_date))}}
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
    @include($activeTemplate . 'partials.pricing_modal')
@endsection

@push('modal')
    <!--  Purchase Modal  -->
    <div class="modal custom--modal fade" id="purchaseModal" aria-hidden="true" aria-labelledby="title" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">@lang('Purchase Plan')</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"><b>X</b></button>
                </div>
                @auth
                    <form action="{{ route('user.plan.purchase') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input name="period" type="hidden">
                            <input name="plan" type="hidden">
                            <div class="row gy-3">

                                <h6 class="text-danger already_purchased text-center">
                                    @lang('You already purchased this plan')
                                </h6>

                                <p class="plan-info text-center">@lang('By purchasing') <span class="fw-bold plan_name"></span> @lang(' plan, you will get') <span class="daily_limit fw-bold"></span> <span class="fw-bold plan_type"> </span>@lang('. No limit per day download. You can download all one day or at different times.')</p>
                                {{-- <input type="hidden" name="payment_type" value="direct"> --}}
                                <div class="form-group payment-info">
                                    <label class="form-label required" for="payment_type">@lang('Payment Type')</label>
                                    <div class="form--select">
                                        <select class="form-select" id="payment_type" name="payment_type" required readonly>
                                            <option value="direct" selected>@lang('Credit Card Or Paypal')</option>
                                            {{-- <option value="wallet">@lang('From Wallet')</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="buyNowButton planSubmitConfirm" type="submit">@lang('Buy Now') <span class="plan_id"></span> </button>
                            <button class="loginBtn closeButton" data-bs-dismiss="modal" type="button">@lang('Close')</button>

                        </div>
                    </form>
                @else
                    <div class="modal-body">
                        <h4 style="text-align: center">@lang('Please login first to buy a plan')</h4>
                    </div>
                    <div class="modal-footer">
                        <a class="loginBtn" href="{{ route('user.login') }}">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endpush


@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css" />
@endpush

<style>

    .browseAllVideos {
        background: url("/core/public/assets/image/buttons/browse videos black.png") no-repeat;
        background-size: 100% 100%;
        padding: 23px 90px;
        color: transparent;
    }

    .browseAllVideos:hover {
        background: url("/core/public/assets/image/buttons/browse videos green.png") no-repeat;
        background-size: 100% 100%;
        padding: 23px 90px;
        color: transparent;
    }

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

    .buyBtn{
        padding: 5px 15px;
        margin-bottom: 3px;
        border-radius: 20px;
        border: 1px solid #000 !important;
        text-decoration: none;
        color: #000;
    }

    .buyBtn:hover {
        color: #fff;
        background-color: #62a444;
        border: 1px solid #fff !important;
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
    $(document).ready(function(){
        $('#checkPricingBtn').on('click', function(){
           let modal = new bootstrap.Modal(document.getElementById('pricingModal'));
           modal.show();
        });

        $('.radioCheck').on('click', function(){
            let data        = $(this).data();
            let action      = data.action;
            let className   = data.class;
            let file        = data.file;
            let question    = data.question;
            let type        = data.type;
            
            //set data attribues on button 
            let button  = $('.singleBuyButton');
            button.addClass(className);
            button.data('action', action);
            button.data('file', file);
            button.data('question', question);
            button.data('type', type);
        });
    });

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

@push('style')
    <style>

        .buyButton {
            background: url("/core/public/assets/image/buttons/buy button black.png") no-repeat;
            background-size: 100% 100%;
            padding: 12px 70px;
            color: transparent;
        }

        .buyButton:hover {
            background: url("/core/public/assets/image/buttons/buy button green.png") no-repeat;
            background-size: 100% 100%;
            padding: 12px 70px;
            color: transparent;
        }

        .buyNowButton {
            background: url("/core/public/assets/image/buttons/buy package black.png") no-repeat;
            background-size: 100% 100%;
            padding: 8px 40px;
            color: transparent;
        }

        .buyNowButton:hover {
            background: url("/core/public/assets/image/buttons/buy package green.png") no-repeat;
            background-size: 100% 100%;
            padding: 8px 40px;
            color: transparent;
        }

        .loginBtn{
            padding: 2px 12px;
            border-radius: 20px;
            border: 2px solid;
            text-decoration: none;
        }

        .form--select .form-select {
            height: 45px;
            border-radius: 3px;
            padding-right: 46px;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid;
            background: hsl(var(--light)/0.3);
            color: hsl(var(--heading));
        }
        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
@endpush

@push('script')
<script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            $(document).on('click', '.purchase-btn',function() {
                //hide pricing modal
                let pricingModal = bootstrap.Modal.getInstance(document.getElementById('pricingModal'));
                pricingModal.hide();
                
                let plan = $(this).data();
                let plan_id = plan.id;
                // let period = $('[name=plan_period]').val();
                let period = 'yearly';
                let modal = $('#purchaseModal');

                modal.find('[name=plan]').val(plan.id);
                modal.find('[name=period]').val(period);

                modal.find('.plan_name').text(plan.plan_name);
                modal.find('.plan_type').text(plan.plan_type);
                modal.find('.daily_limit').text(plan.daily_limit);
                modal.find('.monthly_limit').text(plan.monthly_limit);


                $('.already_purchased, .closeButton').css({ 'display': 'none', });
                $('.payment-info,.plan-info,.planSubmitConfirm').css({ 'display': '', });

                let isCurrent = $(this).data('current');
                if (isCurrent) {
                    $('.already_purchased,.closeButton').css({ 'display': '', });
                    $('.payment-info,.plan-info, .planSubmitConfirm').css({ 'display': 'none', });
                }
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush
