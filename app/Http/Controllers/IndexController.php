<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Team;
use App\Gallery;
use App\GalleryCategory;
use App\Service;
use App\Salon;
use App\Testimonial;
use App\Editorial;
use App\Miss;
use App\Event;
use App\Celebrity;
use App\Job;
class IndexController extends Controller
{
    public function index()
    {
      $services = Service::withTranslations()->get();
      $services = $services->translate(\App::getLocale(), 'de');
      return view('index',[
        
          'services'=>$services,
      ]);
    }


    public function bio()
    {
      return view('biography',[
          
      ]);
    }

    public function editorial()
    {
      $editorial = Editorial::withTranslations()->get();
      $editorial = $editorial->translate(\App::getLocale(), 'de');
      return view('editorial',[

          'editorial'=>$editorial,
      ]);
    }

    public function editorial_detail($url_slug)
    {
      $editorial = Editorial::where('slug',$url_slug)->withTranslations()->first();
      $editorial = $editorial->translate(\App::getLocale(), 'de');
      return view('editorial-detail',[

          'editorial'=>$editorial,
      ]);
    }

    public function miss()
    {
      $miss = Miss::get();
      foreach($miss as $item){
        $item->images = json_decode($item->images);
      }
      return view('miss',[

        'miss'=>$miss,

      ]);
    }

    public function barber()
    {
      $gallery = Gallery::with('categories')->where('id',1)->first();
      $gallery->images = json_decode($gallery->images);
      return view('barber',[
        'gallery'=>$gallery,
          
      ]);
    }

    public function team()
    {

      $team = Team::orderBy('name')->withTranslations()->get();
      $team = $team->translate(\App::getLocale(), 'de');
      return view('team',[
        
        'team'=>$team,
      ]);
    }

    public function appointment()
    {
      $testimonials = Testimonial::orderBy('created_at')->get();
      $salons = Salon::withTranslations()->orderBy('order', 'asc')->get();
      $salons = $salons->translate(\App::getLocale(), 'de');
      $services = Service::withTranslations()->get();
      $services = $services->translate(\App::getLocale(), 'de');
      return view('appointment',[
        'services'=>$services,
        'salons'=>$salons,
        'testimonials'=>$testimonials,
        
      ]);
    }

    public function services()
    {
      $testimonials = Testimonial::orderBy('created_at')->get();
      $salons = Salon::withTranslations()->get();
      $salons = $salons->translate(\App::getLocale(), 'de');
      $services = Service::withTranslations()->get();
      $services = $services->translate(\App::getLocale(), 'de');
      return view('services',[
        'services'=>$services,
        'salons'=>$salons,
        'testimonials'=>$testimonials,
        
      ]);
    }
    public function service_detail($url_slug)
    {

      $services = Service::where('slug',$url_slug)->withTranslations()->first();
      $services = $services->translate(\App::getLocale(), 'de');
      $anotherServices = Service::where('id','!=',$services->id)->orderBy('created_at','desc')->withTranslations()->get();
      $anotherServices = $anotherServices->translate(\App::getLocale(), 'de');
      // dd($anotherServices->toArray());

      return view('service-detail',[
        'services'=>$services,
        'anotherServices'=>$anotherServices,
        
      ]);
    }

    public function terms()
    {
      return view('terms',[
          
      ]);
    }

    public function jobs()
    {
      $jobs = Job::withTranslations()->get();
      $jobs = $jobs->translate(\App::getLocale(), 'de');
      return view('jobs',[
          'jobs'=>$jobs,
      ]);
    }

    public function job_detail($url_slug)
    {

      $job = Job::where('slug',$url_slug)->withTranslations()->first();
      $job = $job->translate(\App::getLocale(), 'de');
      $jobs = Job::withTranslations()->get();
      $jobs = $jobs->translate(\App::getLocale(), 'de');
      $salons = Salon::withTranslations()->orderBy('order', 'asc')->get();
      $salons = $salons->translate(\App::getLocale(), 'de');
      return view('job-detail',[
        'job'=>$job,
        'salons'=>$salons,
        'jobs'=>$jobs,
        
      ]);
    }

    public function events()
    {

      $events = Event::withTranslations()->get();
      $events = $events->translate(\App::getLocale(), 'de');
      return view('events',[
          'events'=>$events
      ]);
    }

    public function celebrity()
    {

      $gallery = Gallery::with('categories')->where('id',6)->first();
      // dd($gallery);
      $gallery->images = json_decode($gallery->images);
      $orderedImages = $gallery->images;
      rsort($orderedImages);
      $gallery->images = $orderedImages;
      $celebrities = Celebrity::get();
      return view('celebrity',[
          'celebrities'=>$celebrities,
          'gallery'=>$gallery,
      ]);
    }

    public function cookies()
    {
      return view('cookies',[
          
      ]);
    }

    public function impressum()
    {
      return view('impressum',[
          
      ]);
    }

    public function salons()
    {
      $gallery = Gallery::with('categories')->where('id',5)->first();
      $gallery->images = json_decode($gallery->images);
      $salons = Salon::withTranslations()->orderBy('order', 'asc')->get();
      $salons = $salons->translate(\App::getLocale(), 'de');
      return view('salons',[
        'gallery'=>$gallery,
        'salons'=>$salons,
          
      ]);
    }

    public function salon_detail($url_slug)
    {

      $salon = Salon::where('slug',$url_slug)->with(['services','teams'])->orderBy('order', 'asc')->withTranslations()->first();
      $salon = $salon->translate(\App::getLocale(), 'de');
      $gallery = Gallery::with('categories')->where('id',$salon->id+6)->first();
      if($gallery!=null){
         $gallery->images = json_decode($gallery->images);
      }

      
      // dd($salon);

      return view('salon-detail',[
        'salon'=>$salon,
        'gallery'=>$gallery,
        
      ]);
    }

    public function lifestyle()
    {
      $editorial = Editorial::get()->take(6);
      return view('lifestyle',[
        'editorial'=>$editorial,
          
      ]);
    }

    public function gallery()
    {
      $gallery = Gallery::with('categories')->whereNotIn('id',[6,7,8,9,10,11])->get();

      foreach($gallery as $gallery_item){
        $gallery_item->images = json_decode($gallery_item->images);
    }
    // dd($gallery);
      return view('gallery',[

          'gallery'=>$gallery,
      ]);
    }

    public function gallery_detail($url_slug){
        
      $gallery = Gallery::with('categories')->where('id',$url_slug)->first();
      $gallery->images = json_decode($gallery->images);
      // dd($gallery->images);
      return view ('gallery-detail',[

          'gallery'=>$gallery,
      ]);

  }


}
