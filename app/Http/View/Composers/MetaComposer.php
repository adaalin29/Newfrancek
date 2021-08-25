<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class MetaComposer
{
  
  public function compose (View $view)
  {
    $metaTitle='';
    if(request()->segment(1) != '') {
      $metaTitle = ucfirst(str_replace('-',' ', request()->segment(1)));
    } else {
      $metaTitle='Home';
    }
    
    if (isset($metaTitle)) {
      $view->with('metaTitle',$metaTitle);
    }
  }
  
}