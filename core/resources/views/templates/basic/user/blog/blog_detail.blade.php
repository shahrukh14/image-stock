@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v5">
        <div class="container-default w-container mg-bottom-20px">
            <div data-w-id="d62d8075-6063-7d61-160d-fc386fb1dff4"
                style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                class="mg-bottom-20px">
                <div class="flex-horizontal start">
                    <a data-w-id="a002a217-de25-06e3-f32f-5766f09e48c0" href="#"
                        class="link-wrapper color-neutral-800 text-medium text-decoration-none w-inline-block">
                        <div class="line-square-icon link-icon-left"
                            style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                            
                        </div>
                        <a href="{{route('blog.all')}}"><div class="link-text">Back to blog</div></a>
                    </a>
                </div>
            </div>
            <div data-w-id="a581def4-ceca-3035-1c7b-ad58b60f4f61" style="opacity: 1" class="blog-page---top-content">
                @if(isset($blog->feature_image))
                <div class="image-wrapper blog-card-featured---image-wrapper">
                    <img src="{{asset('core/public/assets/image/blog_image/'.$blog->feature_image)}}"
                        alt=" photo"
                        class="image fit-cover" />
                    <div class="bg-overlay opacity-80"></div>
                </div>
                @endif
                <div class="z-index-1">
                    <div data-w-id="a581def4-ceca-3035-1c7b-ad58b60f4f66"
                        style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);  opacity: 1; transform-style: preserve-3d;"
                        class="inner-container _752px">
                        <div class="inner-container _700px---tablet">
                            <div class="inner-container _600px---mbl">
                              &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-default w-container">
            <h1 class="display-2 mg-bottom-6px padding-l-r">
                {{$blog->title}}
            </h1>
            <div class="mg-bottom-20px">
              <div class="flex-horizontal start flex-wrap padding-l-r">
                  <div class="text-bold">
                      <a href="" class="text-link ">{{$blog->Category->blog_category}}</a>
                  </div>
                  <div class="dot-divider"></div>
                  <div class="text-200 medium ">
                    {{\Carbon\Carbon::parse($blog->date)->format('d/m/Y')}}
                  </div>
                  <div class="dot-divider"></div>
                  <div class="text-bold">
                    <p class="text-link ">{{$blog->author}}</p>
                  </div>
              </div>
          </div>
        </div>
    </section>

    <section class="section blog-post-content">
        <div class="container-default w-container">
            <div data-w-id="d364559a-e203-26f7-e49c-904189ad4522" style="opacity: 1" class="inner-container _765px center">
                <div class="rich-text---paragraph-mg-fix">
                    <div class="rich-text-v2 w-richtext">
                        @php echo $blog->blog_body; @endphp
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
