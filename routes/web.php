<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Gallery;
use App\Http\Livewire\Admin\AdminGallery;
use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Gender;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/gallery', Gallery::class);
Route::get('/gender', Gender::class);

Route::get('/admin/gallery', AdminGallery::class);
Route::get('/admin/category', AdminCategory::class);
