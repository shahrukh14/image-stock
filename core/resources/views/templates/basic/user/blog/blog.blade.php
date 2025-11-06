@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <div class="page-wrapper">
        <section class="section top">
            <div class="container-default w-container">
                <div class="mg-bottom-48px">
                    <div class="w-layout-grid grid-2-columns title-and-buttons _1-col-tablet">
                        <div class="inner-container _574px">
                            <div class="inner-container _500px">
                                <h1 class="display-1 mg-bottom-12px">Blogs articles</span></h1>
                            </div>
                        </div>
                        <div class="inner-container search-article">
                            <form action="" class="mg-bottom-0 w-form">
                                <div class="position-relative">
                                    <input type="search" class="input button-inside w-input" maxlength="256" name="search_blog" placeholder="Browse articles" id="search">
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
                <div class="mg-bottom-48px">
                    <div class="title-and-buttons" style="text-align: left;">
                        <div class="overflow-hidden w-dyn-list">
                            <div role="list" class="categories-badges-wrapper right-categories w-dyn-items">
                                <div role="listitem" class="categories-badges-item-wrapper right-categories w-dyn-item">
                                    <a href="{{route('blog.all')}}" aria-current="page" class="category-tab dark first w-inline-block w--current">
                                        <div>All</div>
                                    </a>
                                </div>
                                @foreach ($blogCategory as $item)
                                <div role="listitem" class="categories-badges-item-wrapper right-categories w-dyn-item">
                                    <a href="{{route('blog.specific.category',$item->slug)}}" class="category-tab dark w-inline-block">
                                        <div>{{$item->blog_category}}</div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                <div class="w-dyn-list">
                    @if ($blogs == null || count($blogs)==0)
                         <div class="container-no-blog-found">
                            <h4 class="text-muted text-center" colspan="100%">No Blog Found !!!</h4>
                         </div>
                    @else
                    <div role="list" class="grid-3-columns gap-row-40px _2-col-mbl w-dyn-items">
                        @foreach ($blogs as $item)
                        <div role="listitem" class="blur-sibling-item w-dyn-item" style="opacity: 1;"><a href="{{route('blog.details',['slug'=> $item->slug])}}"  class="blog-card w-inline-block" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
                            @if($item->feature_image != null)
                            <a href="{{route('blog.details',['slug'=> $item->slug])}}">
                                <div class="image-wrapper blog-card-image">
                                    <img src="{{asset('core/public/assets/image/blog_image/'.$item->feature_image)}}" alt="{{$item->slug}}" srcset= "{{asset('core/public/assets/image/blog_image/'.$item->feature_image)}}" class="image fit-cover" >
                                </div>
                            </a>
                            @endisset
                           
                            <div class="blog-card-content">
                                <div class="mg-bottom-16px">
                                    <div class="flex-horizontal start flex-wrap">
                                        <div class="text-200 medium color-neutral-600">{{$item->Category->blog_category}}</div>
                                        <div class="dot-divider"></div>
                                        <div class="text-200 medium color-neutral-600">{{ date('M d, Y', strtotime($item->date))}}</div>
                                    </div>
                                </div>
                                <h3 class="display-4 mg-bottom-0 title">{{$item->title}}</h3>
                            </div>
                        </a></div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @if (count($blogs) > 0)
            {{ $blogs->links('pagination::bootstrap-4') }}
            @endif
        </section>
    </div>
@endsection