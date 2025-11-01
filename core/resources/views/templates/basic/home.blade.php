@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @include($activeTemplate . 'sections.banner')
    @include($activeTemplate . 'sections.category')
    @include($activeTemplate . 'sections.images', ['images' => $images])

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif
@endsection
