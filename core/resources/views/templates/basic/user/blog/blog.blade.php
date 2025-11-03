@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <div class="page-wrapper">
        <section class="section top">
            <div class="container-default w-container">
                <div data-w-id="8bb848d1-c4f3-760d-4852-bc5b3ec7233d"
                    style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                    class="mg-bottom-48px">
                    <div class="w-layout-grid grid-2-columns title-and-buttons _1-col-tablet">
                        <div class="inner-container _574px">
                            <div class="inner-container _500px">
                                <h1 class="display-1 mg-bottom-12px">Blogs <span class="text-no-wrap">&amp;&nbsp;articles</span></h1>
                            </div>
                        </div>
                        <div id="w-node-fadc21ba-5fc1-3fc4-c809-882bd5db418b-79836a41"
                            class="inner-container search-article">
                            <form action="" class="mg-bottom-0 w-form">
                                <div class="position-relative">
                                    <input type="search" class="input button-inside w-input" maxlength="256" name="search_blog" placeholder="Browse articles" id="search" required="">
                                    <input type="submit" value="Search" class="btn-primary inside-input default w-button">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section no-padding-top">
            <div class="container-default w-container">
                <div data-w-id="a37a847a-404d-a944-00b0-b5d35f72796b"
                    style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                    class="mg-bottom-48px">
                    <div class="title-and-buttons">
                        <div class="overflow-hidden w-dyn-list">
                            <div role="list" class="categories-badges-wrapper right-categories w-dyn-items">
                                <div role="listitem" class="categories-badges-item-wrapper right-categories w-dyn-item"><a href="{{route('blog.all')}}" aria-current="page" class="category-tab dark first w-inline-block w--current">
                                        <div>All</div>
                                    </a></div>
                                    @foreach ($blogCategory as $item)
                                    <div role="listitem" class="categories-badges-item-wrapper right-categories w-dyn-item"><a
                                     href="#" aria-current="page"
                                     class="category-tab dark first w-inline-block w-condition-invisible w--current">
                                     </a><a href="{{$item->slug}}" class="category-tab dark w-inline-block">
                                         <div>{{$item->blog_category}}</div>
                                     </a>
                                    </div>
                                    @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-dyn-list">
                    @if ($blogs ==null || count($blogs)==0)
                         <div class="container-no-blog-found">
                            <h4 class="text-muted text-center" colspan="100%">No Blog Found !!!</h4>
                         </div>
                        @else
                    <div role="list" class="grid-3-columns gap-row-40px _2-col-mbl w-dyn-items">
                        @foreach ($blogs as $item)
                        <div role="listitem" class="blur-sibling-item w-dyn-item" style="opacity: 1;"><a href="{{route('blog.details',['slug'=> $item->slug])}}"  class="blog-card w-inline-block" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
                            @if($item->feature_image != null)
                            <a href="{{route('blog.details',['slug'=> $item->slug])}}">
                                <div class="image-wrapper blog-card-image"><img src="{{asset('core/public/assets/image/blog_image/'.$item->feature_image)}}"
                                    alt="Alpha V: Sony announces the next-gen mirrorless camera"
                                    sizes="(max-width: 479px) 92vw, (max-width: 767px) 45vw, (max-width: 991px) 46vw, (max-width: 1439px) 30vw, 420px"
                                    srcset= "{{asset('core/public/assets/image/blog_image/'.$item->feature_image)}}"
                                    class="image fit-cover" ></div>
                            </a>
                            @endisset
                           
                            <div class="blog-card-content">
                                <div class="mg-bottom-16px">
                                    <div class="flex-horizontal start flex-wrap">
                                        <div class="text-200 medium color-neutral-600">News</div>
                                        <div class="dot-divider"></div>
                                        <div class="text-200 medium color-neutral-600">{{\Carbon\Carbon::parse($item->date)->format('d/m/Y')}}</div>
                                    </div>
                                </div>
                                <h3 class="display-4 mg-bottom-0 title">{{$item->title}}</h3>
                            </div>
                        </a></div>
                        @endforeach
                    </div>
                    @endif
                    <div data-w-id="05d0da36-b41f-61dd-e6c1-5a28cb44abe4"
                    style="transform: translate3d(0px, 10%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;"
                    role="navigation" aria-label="List" class="w-pagination-wrapper pagination-wrapper max-width-980px">
                    <div id="w-node-_160f9dc3-2726-4837-083c-ca8f46399643-79836a41" aria-label="Page 1 of 2" role="heading"
                      class="w-page-count page-count---main">1 / 2</div><a
                      id="w-node-_05d0da36-b41f-61dd-e6c1-5a28cb44abe9-79836a41"
                      href="https://stocktemplate.webflow.io/blog?42b9b338_page=2" aria-label="Next Page"
                      class="w-pagination-next btn-primary pagination-button">
                      <div class="w-inline-block">Next</div>
                    </a>
                    <link rel="prerender" href="https://stocktemplate.webflow.io/blog?42b9b338_page=2">
                  </div>
                </div>
            </div>
            @if (count($blogs) > 0)
            {{ $blogs->links('pagination::bootstrap-5') }}
            @endif
        </section>
    </div>
@endsection
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
