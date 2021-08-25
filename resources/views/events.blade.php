@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="events" class="pagini-text-mic">{{__('site.events')}} </a>
    </div>
    <div class="page-title">{{__('site.events')}}</div>
    @if($events!=NULL)
    <div class="events-container">
        @php ($delay_contor = 0)
        @foreach($events as $item)
        <div class="event-item" data-aos-delay="{{$delay_contor*150}}" data-aos-easing="ease-in-sine"  data-aos="fade-right">
            <div class="event-image"><img src="{{ route('thumb', ['width:425', $item->image]) }}" class="full-width events-img">
            </div>
            <div class="event-title">{{$item->name}}</div>
            <div class="event-description">{!!$item->description!!}</div>

        </div>
        <?php $delay_contor++ ?>
        @endforeach
    </div>
    @endif
</div>
@endsection
@push('scripts')
<script>

</script>
@endpush