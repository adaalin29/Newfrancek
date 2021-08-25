@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="editorial" class="pagini-text-mic"> {{__('site.editorial')}} |</a>
        <a href="editorial-detail/{{$editorial->id}}" class="pagini-text-mic"> {{$editorial->title}} </a>
    </div>
    <div class="page-title">{{$editorial->title}}</div>
    <div class="editorial-detail-banner"><img src="{{ route('thumb', ['width:1920', $editorial->banner]) }}"
            class="full-width"></div>
    <div class="editorial-detail-text">{!!$editorial->content!!}</div>
    <div class = "editorial-social">
    <div class = "editorial-share-text">{{__('site.share-on')}}</div>
    <div class = "editorials-share-items">
        <a href = "https://www.facebook.com/sharer/sharer.php?u={{URL::to('/')}}/editorial-detail/{{$editorial->id}}" target = "_blank" class = "editorial-share-item"><img src = "images/editorial-facebook.svg" class = "editorial-image-image-social"></a>
        <a href = "https://twitter.com/intent/tweet?url={{URL::to('/')}}/editorial-detail/{{$editorial->id}}" target = "_blank" class = "editorial-share-item"><img src = "images/editorial-twitter.svg" class = "editorial-image-image-social"></a>
        <a href = "http://pinterest.com/pin/create/button/?url={{URL::to('/')}}/editorial-detail/{{$editorial->id}}&media={{ route('thumb', ['width:1920', $editorial->banner]) }}" target = "_blank" class = "editorial-share-item"><img src = "images/editorial-pinterest.svg" class = "editorial-image-image-social"></a>
    </div>
    </div>
</div>
@endsection