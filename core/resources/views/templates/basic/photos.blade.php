@extends($activeTemplate . 'layouts.frontend')
@section('content')
<div class="page-wrapper">
    <section class="section aside-section">
      <div class="container-default w-container">
        <div class="w-layout-grid grid-2-columns aside-left">
          <div id="w-node-ad5e1ca4-4b39-0db6-83c4-ea1be7337629-32b2f9c1" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"  class="aside-content-left h-300vh">
            <div class="inner-container _222px _100---tablet" style="height: 100%">
              <div id="accordion">
                <h3>Type</h3>
                <div>
                  <div role="list"  class="grid-1-column gap-row-24px w-dyn-items">
                    <div id="w-node-ad5e1ca4-4b39-0db6-83c4-ea1be7337636-32b2f9c1" role="listitem"  class="collection-item w-dyn-item">
                      <a href="{{ route('photos') }}"  aria-current="page" class="category-dropdown-link w-inline-block w--current"  tabindex="0">
                        <div class="flex-horizontal start gap-8px">
                          <img src="{{ asset('assets\images\app_images\camera.svg') }}"  alt="Photography" class="image category-dropdown-link---icon" />
                          <div  class="text-100 medium color-neutral-700">
                            Photos
                          </div>
                        </div>
                      </a>
                    </div>
                    <div id="{{ route('vectors') }}" role="listitem" class="collection-item w-dyn-item">
                      <a href="{{ route('vectors') }}" class="category-dropdown-link w-inline-block" tabindex="0">
                        <div class="flex-horizontal start gap-8px">
                          <img src="{{ asset('assets\images\app_images\vector.svg') }}" alt="Vectors &amp; graphics" class="image category-dropdown-link---icon" />
                          <div class="text-100 medium color-neutral-700">
                            Vectors &amp; graphics
                          </div>
                        </div>
                      </a>
                    </div>
                    <div id="w-node-ad5e1ca4-4b39-0db6-83c4-ea1be7337636-32b2f9c1"  role="listitem" class="collection-item w-dyn-item">
                      <a href="{{ route('videos') }}" class="category-dropdown-link w-inline-block" tabindex="0">
                        <div class="flex-horizontal start gap-8px">
                          <img src="{{ asset('assets\images\app_images\video.svg') }}" alt="Videos" class="image category-dropdown-link---icon" />
                          <div class="text-100 medium color-neutral-700">
                            Videos
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <h3 style="margin-top: 10px;">Category</h3>
                <div>
                  @if ($categories->count())
                    <div>
                      @foreach ($categories as $category)
                      <div class="categoryFilter">
                        {{-- <span class="color-badge color-selector search-param" ></span> --}}
                        <a href="{{ route('photos', ['category' => $category->slug]) }}" style="text-decoration:none;">{{ $category->name }}</a>
                      </div>
                      @endforeach
                    </div>
                  @endif
                </div>
              </div>

            @php
             echo getAds('300x1050', 'photo', 1);
             echo getAds('250x250', 'photo', 1);
             echo getAds('160x600', 'photo', 1);
            @endphp

            </div>
          </div>
          <div class="aside-content-rigth">
            @php
                $photos_setting = json_decode(gs()->photos_setting);
                if($photos_setting){
                    $photos_setting_image = $photos_setting->image;
                }else{
                    $photos_setting_image = "photos_default_banner.jpg";
                }
            @endphp
            <div class="inner-container _981px width-100">
              <div class="mg-bottom-80px">
                <div style=" background-image: url({{ asset('core/public/assets/image/photos_setting/'.$photos_setting_image)}});  transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1;  transform-style: preserve-3d; " class="category-banner">
                  <div class="inner-container _635px center">
                    <div class="text-center">
                      <h1 class="display-3 color-neutral-100 mg-bottom-12px">
                       @if($photos_setting) {{$photos_setting->heading}} @else Photos @endif
                      </h1>
                      <p class="color-neutral-200 mg-bottom-0">
                        @if($photos_setting) {{$photos_setting->sub_heading}}  @endif
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              @php
                  $defaultImageContent = getContent('default_images.content', true);
                  $defaultImage = getImage('assets/images/frontend/default_images/' . @$defaultImageContent->data_values->loading_image);
              @endphp

              <div class="grid">
                <div class="grid-sizer"></div>
                @foreach($images as $image)
                    @php
                        $imageUrl = imageUrl(getFilePath('stockImage'), $image->thumb);
                    @endphp
                    <div class="grid-item1 {{ $image->imageOrientation }}">
                      <a  href="{{ route('image.detail', [slug($image->title), $image->id]) }}" class="resource-card-wrapper w-inline-block">
                        <img src="{{ $imageUrl }}">
                        <div class="resource-card---video-button w-condition-invisible">
                          <img src="./Photography - Stock X - Webflow Ecommerce website template_files/64347e458126ad558f064a5e_play-button-small-icon-stock-x-webflow-template.svg" alt="Play Button - Stock X Webflow Template" class="play-button" />
                        </div>
                        <div class="resource-card-content v2">
                          <div class="text-200 color-neutral-100 mg-bottom-24px">
                            #{{$image->track_id}}
                          </div>
                          <div class="mg-top-auto">
                            <div class="flex-horizontal space-between gap-16px">
                              <div  class="flex-horizontal start gap-12px flex-wrap">
                                <div class="avatar-circle _02">
                                  <img src="{{ getImage(getFilePath('userProfile') . '/' . $image->user->image, null, 'user') }}" alt="{{$image->user->firstname}}" />
                                </div>
                                <div>
                                  <div class="heading-h6-size color-neutral-100">
                                    {{$image->user->firstname}}
                                  </div>
                                  <div class="text-50 color-neutral-300">
                                    {{date('d-M-Y', strtotime($image->upload_date))}}
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

              {{-- <div style="opacity: 1"  class="grid">
                <div class="grid-sizer"></div>
                  @foreach($images as $image)
                  @php
                      $imageUrl = imageUrl(getFilePath('stockImage'), $image->thumb);
                  @endphp
                  <div role="listitem" class="grid-item1">
                    <a  href="{{ route('image.detail', [slug($image->title), $image->id]) }}" class="resource-card-wrapper w-inline-block">
                      <div class="image-wrapper">
                        <img alt="Image"  class="gallery__img lazy-loading-img" data-image_src="{{ $imageUrl }}" src="{{ $defaultImage }}" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg)  rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; " />
                      </div>
                      <div class="resource-card---video-button w-condition-invisible">
                        <img src="./Photography - Stock X - Webflow Ecommerce website template_files/64347e458126ad558f064a5e_play-button-small-icon-stock-x-webflow-template.svg" alt="Play Button - Stock X Webflow Template" class="play-button" />
                      </div>
                      <div class="resource-card-content v2">
                        <div class="text-200 color-neutral-100 mg-bottom-24px">
                          #{{$image->track_id}}
                        </div>
                        <div class="mg-top-auto">
                          <div class="flex-horizontal space-between gap-16px">
                            <div  class="flex-horizontal start gap-12px flex-wrap">
                              <div class="avatar-circle _02">
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . $image->user->image, null, 'user') }}" alt="{{$image->user->firstname}}" />
                              </div>
                              <div>
                                <div class="heading-h6-size color-neutral-100">
                                  {{$image->user->firstname}}
                                </div>
                                <div class="text-50 color-neutral-300">
                                  {{date('d-M-Y', strtotime($image->upload_date))}}
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
             
                <div role="navigation"  aria-label="List" class="w-pagination-wrapper pagination-wrapper"></div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      @if (count($images) > 0)
      <div style="margin-top: 30px;">
        {{ $images->links('pagination::bootstrap-4') }}
      </div>
      @endif

    </section>
  </div>
@endsection

<style>
 .categoryFilter{
    margin-left: 5px;
 } 
 .categoryFilter :hover{
   margin-left: 10px;
   color: #689F38 !important;
   font-size: 110%;
 } 
.ui-accordion-content.ui-corner-bottom {
    height: auto !important;
}

nav.d-flex.justify-items-center.justify-content-between .d-flex.justify-content-between.flex-fill.d-sm-none:nth-child(1) {
  visibility: hidden;
}


.btn-btn{
  text-decoration: none;
  background-color: #689F38;
  color: #fff !important;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  border: 1px solid transparent;
  padding: 0.75rem 2rem;
  font-size: 1rem;
  line-height: 4.5;
  border-radius: 0.25rem;
  margin-left: 5px;
}

.gallery__img {
    width: 100%;
    height: 180px;
    border-radius: 2px;
    object-fit: contain;
    vertical-align: bottom;
    transition: all 0.3s ease;
    transform-origin: center;
    position: relative;
    z-index: -1;
}


@media only screen and (max-width:450px) {
  .gallery__img {
    height: 100%;
  }
}

.activearrow {
  float: right;
  display: none;
}
.inactivearrow {
  float: right;
  display: block;
}
.ui-state-active .activearrow {
  display: block;
}
.ui-state-active .inactivearrow {
  display: none;
}
#accordion h3 {
    margin-bottom: 15px;
    cursor: pointer;
}

.grid {
    margin: 0 auto;
    width: 100%;
}

.grid-item1 {
    float: left;
    margin-bottom: 5px;
}

.grid-sizer,.grid-item1 {
    width: 30%;
}


</style>

@push('script')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>

<script>
  $(window).on('load', function(){
    $('.grid').masonry({
        itemSelector: '.grid-item1',
        columnWidth: '.grid-sizer',
        gutter: 10
    });
  });

  $('#price-link').click(function (event) {
        event.preventDefault(); // Prevent the default behavior of the anchor tag

        var url = new URL(window.location.href);
        var params = new URLSearchParams(url.search);

        // Set the "price" parameter to the desired value (e.g., 20)
        params.set('page', '2');

        // Update the URL with the modified search parameters
        url.search = params.toString();

        // Redirect to the updated URL
        window.location.href = url.toString();
    });

// $( function() {
//   $( "#accordion" ).accordion();
// });

// document.addEventListener('DOMContentLoaded', function() {
//   document.querySelector('.header-search-bar').style.display="none";
// });

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

  //clear all parameter wihout specefic field
  $('.clear-all').on('click', function() {
      let url = new URL($(location).attr("href"));
      let params = new URLSearchParams(url.search);
      let searchParams = [];
      for (const key of params.keys()) {
          if (key != 'type' && key != 'category') {
              searchParams.push(key);
          }
      }

      searchParams.forEach(element => {
          params.delete(element);
      });

      const newUrl = new URL(`${url.origin}${url.pathname}?${params}`);
      window.location.href = newUrl;
  });

  // page on load active searched field
  $.each($('.search-param'), function(index, element) {
      let url = new URL($(location).attr("href"));
      let params = new URLSearchParams(url.search);

      params.forEach((value, key) => {
          if ($(element).data('param') == key && $(element).data('param_value') == value) {
              $(element).addClass('active');
          }
      });
  });


  // on click search field
  $(document).on('click', '.search-param', function() {
      let searchItem = $(this);
      let link = new URL($(location).attr('href'));
      let param = $(this).data('param');
      let paramValue = $(this).data('param_value');
      let searchType = $(this).data('search_type') ?? null;
      link = removeParam(link, 'page');
      if (searchType == 'single') {
          let sameTypeSearchField = $(`[data-param='${param}']`).not(this);

          $.each(sameTypeSearchField, function(index, element) {
              let params = new URLSearchParams(link.search);
              let param = $(element).data('param');
              let paramValue = $(element).data('param_value');

              params.forEach((value, key) => {
                  if (param == key && paramValue == value) {
                      link = removeParam(link, param, paramValue, searchType);
                  }
              });
              $(element).removeClass('active');
          });
      }

      if (searchItem.hasClass('active')) {
          searchItem.removeClass('active');
          link = removeParam(link, param, paramValue, searchType);
      } else {
          searchItem.addClass('active');
          link = appendParam(link, param, paramValue);
      }
      window.location.href = link;
  })

  // append parameter to the current route
  function appendParam(currentUrl, param = null, paramValue = null) {
      let url = new URL(currentUrl);
      const addParam = {
          [param]: paramValue
      }
      const newParams = new URLSearchParams([
          ...Array.from(url.searchParams.entries()),
          ...Object.entries(addParam)
      ]);
      const newUrl = new URL(`${url.origin}${url.pathname}?${newParams}`);
      return newUrl;
  }

  //remove parameter from the current route
  function removeParam(currentUrl, param = null, paramValue = null, searchType = 'single') {
      let url = new URL(currentUrl);
      let params = new URLSearchParams(url.search);
      if (searchType == 'multiple') {
          const multipleParams = params.getAll(param).filter(param => param != paramValue);
          params.delete(param);
          for (const value of multipleParams) {
              params.append(param, value);
          }

      } else {
          params.delete(param);
      }
      const newUrl = new URL(`${url.origin}${url.pathname}?${params}`);
      return newUrl;
  }

  //clear individual parameter
  $('.clear-param').on('click', function() {
      let url = new URL($(location).attr("href"));
      let param = $(this).data('param');
      // console.log(param);
      url = removeParam(url, param);
      $(`span[data-param='${param}']`).removeClass('active');
      window.location.href = url;
  });
</script>
    {{-- <script>
        "use strict";

        let likeRoutes = {
            updateLike: "{{ route('user.image.like.update') }}"

        };
        let likeParams = {
            loggedStatus: @json(Auth::check()),
            csrfToken: "{{ csrf_token() }}"
        }
    </script>
    <script src="{{ asset($activeTemplateTrue . 'js/like.js') }}"></script> --}}
@endpush
