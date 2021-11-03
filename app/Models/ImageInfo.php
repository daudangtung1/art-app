<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'alt',
    ];
    protected $hidden = [
        'id',
//        'image_id',
    ];

    public function image(){
        return $this->hasOne('App\Models\Image', 'image_id');
    }
}
