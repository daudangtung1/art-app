<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'gallery_id',
        'post_id',
        'image_id',
    ];

    protected $hidden = [
        'id',
    ];

    public $timestamps=false;

    public function posts(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public function galleries(){
        return $this->belongsTo('App\Models\Gallery', 'gallery_id');
    }

    public function slugImage(){
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
