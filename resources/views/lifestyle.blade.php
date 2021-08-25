@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="lifestyle" class="pagini-text-mic">{{__('site.lifestlye')}} </a>
    </div>
    <div class="page-title">{{__('site.lifestlye')}}</div>
    <div class="lifestyle-container">
        <a href = "miss" class="lifestyle-item" data-aos="fade-left" data-aos-delay="250">
            <div class="lifestyle-interior"></div>
            <div class="lifestyle-image"><img
                    src="{{ route('thumb', ['width:470', settings('lifestyle.miss-image')]) }}" class="full-width">
            </div>
            <div class="lifestyle-overlay">
                <div class="lifestyle-text">{{__('site.miss-germany')}}</div>
            </div>
        </a>
        <a href = "celebrity" class="lifestyle-item">
            <div class="lifestyle-interior"></div>
            <div class="lifestyle-image"><img
                    src="{{ route('thumb', ['width:470', settings('lifestyle.celebrity-image')]) }}" class="full-width">
            </div>
            <div class="lifestyle-overlay">
                <div class="lifestyle-text">{{__('site.element-mic-celebrity')}}</div>
            </div>
        </a>
        <a href = "editorial" class="lifestyle-item" data-aos="fade-right" data-aos-delay="500">
            <div class="lifestyle-interior"></div>
            <div class="lifestyle-image"><img
                    src="{{ route('thumb', ['width:470', settings('lifestyle.editorial-image')]) }}" class="full-width">
            </div>
            <div class="lifestyle-overlay">
                <div class="lifestyle-text">{{__('site.element-mic-editorial')}}</div>
            </div>
        </a>
    </div>
<div class = "celebrity-photo-title">{{__('site.articles')}}</div>
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
@push('scripts')
<script>

</script>
@endpush