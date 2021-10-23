<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'gallery_id',
    ];

    protected $hidden=[
        'id',
    ];

    public function imageInfo(){
        return $this->hasOne('App\Models\ImageInfo');
    }

    public function galleryParent(){
        return $this->belongsTo('App\Models\Gallery', 'gallery_id');
    }
}
