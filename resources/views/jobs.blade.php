@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="jobs" class="pagini-text-mic">{{__('site.jobs')}}  </a>
    </div>
    <div class="page-title">{{__('site.jobs')}}</div>
    <div class="jobs-container">
        @foreach($jobs as $item)
        <div class="job-item">
            <div class="job-title">{{$item->name}}</div>
            <div class="job-quote">{{$item->quote}}</div>
            <div class="job-description">{{ substr(strip_tags($item->description), 0, 375) }}...</div>
            <a class="job-link" href="job-detail/{{$item->slug}}">{{__('site.see-more')}}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection