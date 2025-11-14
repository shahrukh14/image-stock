<section class="section">
  <div class="container-default w-container">
      <div class="inner-container">
          <div data-w-id="a2f41da5-72b1-5177-4a31-2a5411ba9526"
              style="
      transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1)
        rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
      opacity: 1;
      transform-style: preserve-3d;
    "
              class="inner-container _752px center">
              <div class="text-center mg-bottom-40px">
                  <h2 class="display-3 mg-bottom-6px">Resource collection</h2>
                  <p class="mg-bottom-0">
                    Quick to use. Convenient. Instantly download stock photos, vectors and videos.
                  </p>
              </div>
          </div>
          <div class="w-dyn-list">
              <div role="list" class="grid-3-columns categories-grid-v1 w-dyn-items">
                  <div class="blur-sibling-item w-dyn-item" style="opacity: 1">
                      <a href="{{ route('photos') }}" class="w-inline-block">
                          <div class="resouce-collection photos">

                          </div>
                      </a>
                  </div>
                  <div class="blur-sibling-item w-dyn-item">
                      <a href="{{ route('vectors') }}" class="w-inline-block">
                        <div class="resouce-collection vectors">

                        </div>
                      </a>
                  </div>
                  <div id="w-node-_2dce5fa7-96ca-5fa7-4a4c-73970b369a72-d1b2f9b3" role="listitem"
                      class="blur-sibling-item w-dyn-item" style="opacity: 1">
                      <a href="{{ route('videos') }}"  class="w-inline-block">
                        <div class="resouce-collection videos">

                        </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<section class="section _0px">
  <div class="container-default w-container">
    @php
        $homepage_promo_1 = json_decode(gs()->homepage_promo_1);
        if($homepage_promo_1 != null){
            $homepage_promo_1_url = $homepage_promo_1->url;
            $homepage_promo_1_image = $homepage_promo_1->image;
        }else{
            $homepage_promo_1_url = "javascript:void(0)";
            $homepage_promo_1_image = '';
        }
    @endphp
    <div class="image-wrapper block-space---194px">
        <a href="{{$homepage_promo_1_url}}">
            <img src="{{ asset('core/public/assets/image/homepage_promo/'.$homepage_promo_1_image)}}" alt="Promo Code Banner" class="image fit-cover block-space" />
        </a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container-default w-container">
      <div style=" transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1;  transform-style: preserve-3d; "
           class="title-left---content-rigth mg-bottom-32px keep">
          <div>
              <h2 class="display-3 mg-bottom-6px">Browse Categories</h2>
          </div>
          <div class="categories-filter-wrapper">
              {{-- <div class="heading-h5-size no-wrap">Filter by:</div> --}}
              <div class="w-dyn-list">
                  <div role="list" class="categories-badges-wrapper w-dyn-items">
                      <div role="listitem" class="categories-badges-item-wrapper w-dyn-item">
                          <a href="{{ route('photos') }}" class="category-badges w-inline-block">
                            <div class="category-badges photos"></div>
                          </a>
                      </div>
                      <div role="listitem" class="categories-badges-item-wrapper w-dyn-item">
                          <a href="{{ route('vectors') }}"  class="category-badges w-inline-block">
                            <div class="category-badges vectors"></div>
                          </a>
                      </div>
                      <div role="listitem" class="categories-badges-item-wrapper w-dyn-item">
                          <a href="{{ route('videos') }}" class="category-badges w-inline-block">
                            <div class="category-badges videos"></div>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1)n rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1;  transform-style: preserve-3d; " class="w-dyn-list">
            @php
                $defaultImageContent = getContent('default_images.content', true);
                $defaultImage = getImage('assets/images/frontend/default_images/' . @$defaultImageContent->data_values->loading_image);
            @endphp
          <div role="list" class="grid-3-columns gap-38px latest-resources-grid w-dyn-items">
            @forelse ($categories as $category)
            @php
                // $imageUrl = imageUrl(getFilePath('stockImage'), $category->latestImage($category->id)->thumb);
                $imageUrl = getImage(getFilePath('category') . '/' . $category->image, getFileSize('category'));
            @endphp
             <div role="listitem" class="w-dyn-item">
              <b style="margin-left: 17%">{{ $category->name }}</b>
                <a  href="{{ route('search', ['type' => 'image', 'category' => $category->slug]) }}" class="resource-card-wrapper w-inline-block">
                  <div class="image-wrapper">
                    <img alt="Image" class="gallery__img lazy-loading-img" data-image_src="{{ $imageUrl }}" src="{{ $defaultImage }}" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg)  rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; " />
                  </div>
                  {{-- <div class="resource-card-content v2">
                    <div class="text-200 color-neutral-100 mg-bottom-24px">
                      {{$category->slug}}
                      #{{$category->latestImage($category->id)->track_id}}
                    </div>
                    <div class="mg-top-auto">
                      <div class="flex-horizontal space-between gap-16px">
                        <div  class="flex-horizontal start gap-12px flex-wrap">
                          <div class="avatar-circle _02">
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $category->latestImage($category->id)->user->image, null, 'user') }}" alt="{{$category->latestImage($category->id)->user->firstname}}" />
                          </div>
                          <div>
                            <div class="heading-h6-size color-neutral-100">
                              {{$category->latestImage($category->id)->user->firstname}}
                            </div>
                            <div class="text-50 color-neutral-300">
                              {{date('d-M-Y', strtotime($category->latestImage($category->id)->upload_date))}}
                            </div>
                          </div>
                        </div>
                        <div class="resource-card-arrow">
                          <div class="line-square-icon"></div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                </a>
              </div>
            @empty

            @endforelse

          </div>
      </div>
  </div>
</section>
<section class="section _0px">
  <div class="container-default w-container">
    @php
        $homepage_promo_2 = json_decode(gs()->homepage_promo_2);
        if($homepage_promo_1 != null){
            $homepage_promo_1_url = $homepage_promo_2->url;
            $homepage_promo_2_image = $homepage_promo_2->image;
        }else{
            $homepage_promo_2_url = "javascript:void(0)";
            $homepage_promo_2_image = '';
        }
    @endphp
      <div class="image-wrapper block-space---194px">
        <a href="{{$homepage_promo_1_url}}">
          <img src="{{ asset('core/public/assets/image/homepage_promo/'.$homepage_promo_2_image)}}" alt="Promo Banner" class="image fit-cover block-space" />
        </a>
      </div>
  </div>
</section>

@php
    if(gs()->hero_banner_2 != null){
        $hero_banner_2 = json_decode(gs()->hero_banner_2);
        $hero_banner_image_2 = $hero_banner_2->image;
    }else{
        $hero_banner_image_2 = "default_banner.jpg";
        $hero_banner_2 = null;
    }
@endphp
<section class="section section-hero---x" style="background-image: url({{ asset('core/public/assets/image/hero_banner/'.$hero_banner_image_2)}}); margin-top:82px;">
  <div class="container-default width-100 w-container">
      <div style=" transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d; " class="inner-container _640px center">
          <div class="inner-container _550px---mbl center">
              <div class="text-center">
                  <h1 class="display-1 nutral-black mg-bottom-16px">
                    @if($hero_banner_2){{ $hero_banner_2->heading }}@endif
                  </h1>
                  <p class="nutral-black mg-bottom-32px keep">
                    @if($hero_banner_2){{ $hero_banner_2->sub_heading }}@endif
                  </p>
                  <div class="buttons-row center">
                    <a href="@if($hero_banner_2){{ $hero_banner_2->button_url }}@else javascript:void(0) @endif" class="btn-primary white button-row w-button">@if($hero_banner_2){{ $hero_banner_2->button_text }}@else Browse @endif</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<section class="section pd-120px">
    <div class="container-default w-container">
        <div class="mg-bottom-32px keep">
            <div class="w-layout-grid grid-2-columns title-and-buttons">
                <div>
                    <h2 class="display-3 mg-bottom-6px">
                        Blog & Articles
                    </h2>
                    <p class="mg-bottom-0">
                       Extensive collections of articles covering a wide range of issues and offering helpful advice.
                    </p>
                </div>
                <div class="buttons-row">
                    <a href="{{ route('blog.all')}}" class="btn-secondary w-button">Browse all articles</a>
                </div>
            </div>
        </div>
        <div class="w-dyn-list">
            <div role="list" class="grid-3-columns _1-col-tablet gap-row-48px w-dyn-items">
                @forelse ($blogs as $blog)
                <div role="listitem" class="blur-sibling-item w-dyn-item">
                    <a href="{{ route('blog.details', $blog->slug )}}" class="blog-card _3-posts---item w-inline-block" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
                        <div class="image-wrapper blog-card-image _3-posts---item">
                            <img src="{{ asset('core/public/assets/image/blog_image/'.$blog->feature_image)}}" class="image fit-cover" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"/>
                        </div>
                        <div class="blog-card-content _3-posts---item">
                            <div class="mg-bottom-16px">
                                <div class="flex-horizontal start flex-wrap">
                                    <div class="text-200 medium color-neutral-600">
                                        {{$blog->Category->blog_category}}
                                    </div>
                                    <div class="dot-divider"></div>
                                    <div class="text-200 medium color-neutral-600">
                                        {{date('d-M-Y', strtotime($blog->date))}}
                                    </div>
                                </div>
                            </div>
                            <h3 class="display-4 mg-bottom-0 title">
                                {{$blog->title}}
                            </h3>
                        </div>
                    </a>
                </div>
                @empty
                    <div>
                        <h1>No Blog Found</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@push('style')

<style>
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
</style>

@endpush

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
