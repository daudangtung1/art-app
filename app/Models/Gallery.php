<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'thumb_name',
    ];

    protected $hidden=[
        'id',
    ];

    public function galleryInfo(){
        return $this->hasOne('App\Models\GalleryInfo');
    }

    public function galleryItem(){
        return $this->hasMany('App\Models\Image');
    }
}
