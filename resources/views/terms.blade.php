@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class = "container">
    <div class = "pagini">
    <a href = "" class = "pagini-text-mare">{{__('site.homepage')}} |</a>
    <a href = "terms" class = "pagini-text-mic">{{__('site.terms')}}</a>
    </div>
    <div class = "page-title">{{__('site.terms')}}</div>
    <div class = "biblio-container">
    <div class  = "text" data-aos="fade-left" data-aos-delay="500">{!!settings('site.terms')!!}</div>
    </div>
</div>
@endsection