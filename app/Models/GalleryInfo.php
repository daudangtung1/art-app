<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'thumb_name',
        'name',
        'image',
        'description',
    ];

    protected $hidden = [
        'id',
    ];

    public function gallery()
    {
        return $this->hasOne('App\Models\Gallery');
    }
}
