<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Demo extends Model
{
    use Translatable;
    protected $translatable = ['test'];
}
