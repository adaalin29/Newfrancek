@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class = "container">
    <div class = "pagini">
    <a href = "" class = "pagini-text-mare">{{__('site.homepage')}} |</a>
    <a href = "bibliography" class = "pagini-text-mic">{{__('site.biblio')}} </a>
    </div>
    <div class = "bio-video-mobile"></div>
    <div class = "page-title">{{settings('biography.title')}}</div>
    <div class = "biblio-container">

        <video class = "biblio-video" autoplay="" playsinline="" muted="" preload="auto" data-aos="fade-right" data-aos-delay="250">
        <source src="http://newfrancek.laravel.touchmediahost.com/storage/Videos/prezentare-francek.mp4" type="video/mp4">
          </video>
        {{-- <div class = "biblio-image" data-aos="fade-right" data-aos-delay="250"><img src = "{{ route('thumb', ['width:800', settings('biography.banner')]) }}" class = "full-width"></div> --}}
    <div class  = "text" data-aos="fade-left" data-aos-delay="500">{!!settings('biography.description')!!}</div>
    </div>
</div>
@endsection
@push('scripts')
<script>
  $( document ).ready(function() {

    if(screen.width<=1024)
      $('video').appendTo('.bio-video-mobile');

  });
</script>
@endpush