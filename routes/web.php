<?php

use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return User::all();
});


Route::get('/sites', function () {
    return Site::all();
});

Route::get('/comments', [CommentController::class, 'index'])->middleware(\Illuminate\Http\Middleware\HandleCors::class);
Route::post('/add-comment', [CommentController::class, 'store'])->middleware(\Illuminate\Http\Middleware\HandleCors::class);

Route::get('/adminer', function() {
    return file_get_contents(__DIR__.'/../vendor/vrana/adminer/adminer.php');
});