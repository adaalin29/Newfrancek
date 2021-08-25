<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Salon extends Model
{
    use Translatable;
    protected $translatable = ['description','description2','description3'];

    
  public function services () {
    return $this->belongsToMany(SalService::class, 'salon_services');
  }
  public function teams () {
    return $this->belongsToMany(Team::class, 'salon_teams');
  }
}
