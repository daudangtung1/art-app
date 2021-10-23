<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

    public function item()
    {
        return $this->hasMany('App\Models\Image', 'category_id');
    }
}
