<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\AdminGallery;
use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Admin\AdminImage;
use App\Http\Livewire\Admin\AdminPost;
use App\Http\Controllers\GalleryController;

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
//Route::get('/gallery', GalleryIndex::class)->name('gallery');
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{slug}', [GalleryController::class, 'mount'])->name('imageShow');

/*admin dashboard*/
//Route::get('/admin/{data}', AdminDashboard::class)->name('adminDashboard')->middleware('login');

/*admin gallery*/

Route::get('/admin/gallery', AdminGallery::class)->name('adminGallery')->middleware('login');

Route::get('/admin/image', AdminImage::class)->name('adminImage')->middleware('login');
Route::get('/admin/post', AdminPost::class)->name('adminPost')->middleware('login');

/*admin blog*/
Route::get('/admin/category', AdminCategory::class)->name('adminCategory')->middleware('login');
