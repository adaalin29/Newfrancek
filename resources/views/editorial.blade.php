@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="editorial" class="pagini-text-mic">{{__('site.editorial')}} </a>
    </div>
    <div class="page-title">{{__('site.editorial')}}</div>
    <div class="services-description">{{settings('editorial.description')}}</div>
    <div class="editorial-container">
        @php ($delay_contor = 0)
        @foreach($editorial as $item)
        <a href="editorial-detail/{{$item->slug}}" class="editorial-item" data-aos-delay="{{$delay_contor*150}}"
            data-aos-easing="ease-in-sine" data-aos="fade-right">
            <div class="editorial-image"><img src="{{ route('thumb', ['width:400', $item->banner]) }}"
                    class="editorial-image-image"></div>
            <div class="editorial-title">{{ substr(strip_tags($item->title), 0, 30) }}...</div>
            <div class="editorial-image-text">{{ substr(strip_tags($item->content), 0, 100) }}...</div>
        </a>
        <?php $delay_contor++ ?>
        @endforeach
    </div>
</div>
@endsection