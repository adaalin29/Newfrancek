@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="gallery" class="pagini-text-mic">{{__('site.gallery')}} </a>
    </div>
    <div class="page-title">{{__('site.gallery')}}</div>
    <div class="gallery-container">
        @php ($delay_contor = 0)
        @foreach($gallery as $album)
    <a class="gallery-category-item" href = "gallery-detail/{{$album->id}}" data-aos-delay="{{$delay_contor*150}}" data-aos-easing="ease-in-sine"  data-aos="fade-right">
            <img class="full-width" style="transition:0.5s;"
                src="{{ route('thumb', ['width:300', $album->images[0]]) }}">
            <div class="gallery-category-overflow">
                <div class="gallery-category-name">{{$album->categories['name']}}</div>
            </div>
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