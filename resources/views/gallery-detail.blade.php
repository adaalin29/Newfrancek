@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
    <a href="gallery-detail/{{$gallery->id}}" class="pagini-text-mic">{{__('site.gallery')}} | {{$gallery->categories['name']}}</a>
    </div>
    <div class="page-title">{{$gallery->categories['name']}}</div>
    <div class = "gallery-items-container">
        @php ($delay_contor = 0)
        @foreach($gallery->images as $item)
        <a class = "gallery-item-container fancybox-width" data-fancybox="gallery" href = "{{ route('thumb', ['width:1920', $item]) }}" data-aos-delay="{{$delay_contor*150}}" data-aos-easing="ease-in-sine"  data-aos="fade-right">
            <img style = "transition:0.5s;" src = "{{ route('thumb', ['width:300', $item]) }}" class = "full-width">
            <div class="gallery-category-overflow">
                <div class = "search-image"><img src = "images/search.svg" class = "full-width"></div>
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