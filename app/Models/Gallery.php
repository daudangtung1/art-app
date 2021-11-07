<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'thumb_name',
        'gallery_info_id',
        'user_id',
    ];

    protected $hidden = [
        'id',
    ];

    public function galleryInfo()
    {
        return $this->belongsTo('App\Models\GalleryInfo','gallery_info_id');
    }

    public function galleryItem()
    {
        return $this->hasMany('App\Models\Image','gallery_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_id');
    }
}
