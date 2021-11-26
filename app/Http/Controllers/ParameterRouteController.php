<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParameterRouteController extends Controller
{
    public $a = 1;

    public function index($slug)
    {
        if ($a = $slug) {
            return view('welcome');
        } else {
            return view('auth.login');
        }
    }
}
