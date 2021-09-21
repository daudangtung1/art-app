<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable=[
        'gender', 'created_at'
    ];

    protected $hidden=[
        'id'
    ];

    protected $casts=[
        'gender'=>'integer',
        '0'=>'male',
    ];
}
