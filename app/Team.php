<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Team extends Model
{
    use Translatable;
    protected $translatable = ['description'];
}
