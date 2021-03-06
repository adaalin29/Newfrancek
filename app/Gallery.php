<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
    public function categories() {
        return $this->belongsTo(GalleryCategory::class, 'id_category', 'id');
    }
}
