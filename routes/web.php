<?php

use App\Http\Controllers\AdminImageController;
use App\Http\Controllers\AdminMansionController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MansionController;
use App\Http\Controllers\PostController;
use App\Models\Mansion;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index', [
        'mansions' => Mansion::whereNotNull('image')->inRandomOrder()->take(6)->get(),
        'posts' => Post::where('private', '=', 0)->orderBy('published_at', 'desc')->take(3)->get(),
    ]);
});

Route::view('/contact', 'pages.contact', ['sended' => false]);
Route::view('/form', 'pages.approval', ['sended' => false]);
Route::view('/survey', 'pages.survey', ['sended' => false]);

Route::controller(MailController::class)->group(function () {
    Route::post('/contact', 'contact');
    Route::post('/form', 'approval');
    Route::post('/survey', 'survey');
});

Route::view('/privacy-policy', 'pages.privacyPolicy');

Route::resource('mansions', MansionController::class)->only(['index', 'show']);
Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::prefix('admin')->group(function () {
    Route::view('/login', 'pages.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    
        Route::resource('mansions', AdminMansionController::class)->except('show');
        Route::post('mansions/{mansion}/image', [AdminMansionController::class, 'image']);
        Route::resource('mansions.images', AdminImageController::class)->shallow();
        Route::resource('posts', AdminPostController::class)->except('show');
    });
});