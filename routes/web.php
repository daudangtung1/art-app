<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\GalleryIndex;
use App\Http\Livewire\Admin\AdminGallery;
use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Gender;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminImage;

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

/*guest view*/
Route::get('/gallery', GalleryIndex::class)->name('gallery');

/*admin dashboard*/
Route::get('/admin/dashboard', AdminDashboard::class)->name('adminDashboard')->middleware('login');

/*admin gallery*/

Route::get('/admin/gallery', AdminGallery::class)->name('adminGallery')->middleware('login');

Route::get('/admin/image', AdminImage::class)->name('adminImage')->middleware('login');

/*admin blog*/
Route::get('/admin/category', AdminCategory::class)->name('adminCategory')->middleware('login');
