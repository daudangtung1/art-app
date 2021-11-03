<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryUser extends Model
{
    use HasFactory;

    protected $table = "gallery_users";

    protected $fillable = [
        'user_id'
    ];
}
