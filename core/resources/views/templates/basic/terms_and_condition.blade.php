@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section blog-post-content">
        <div class="container-default w-container">
            <div data-w-id="d364559a-e203-26f7-e49c-904189ad4522" style="opacity: 1" class="inner-container _765px center">
                <div class="rich-text---paragraph-mg-fix">
                    <div class="rich-text-v2 w-richtext">
                        <h2>{{$content->data_values->title}}</h2>
                        <p>@php echo $content->data_values->details @endphp</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection