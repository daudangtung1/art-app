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
        'category_id',
    ];

    protected $hidden=[
        'id',
    ];

    public function imageInfo(){
        return $this->hasOne('App\Models\ImageInfo');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
