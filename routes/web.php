<?php

use App\Http\Controllers\StoreCommentController;
use App\Models\Comment;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/comments', function () {
    return Comment::all();
});


Route::get('/users', function () {
    return User::all();
});


Route::get('/sites', function () {
    return Site::all();
});

Route::post('/add-comment', StoreCommentController::class);


Route::get('/comentarios', function () {
    return view('Comments');
});
