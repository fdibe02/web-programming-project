<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WriteController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('auth', [AuthController::class, 'showAuthPage']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('home', [HomeController::class, 'showHomePage']);
Route::get('home/news', [HomeController::class, 'showNews']);
Route::get('home/search', [HomeController::class, 'search']);
Route::get('home/{topic}', [HomeController::class, 'showTopic']);




Route::get('profile', [ProfileController::class, 'showProfile']);
Route::post('profile/add-like', [ProfileController::class, 'addLike']);
Route::post('profile/remove-like', [ProfileController::class, 'removeLike']);
Route::post('profile/add-dislike', [ProfileController::class, 'addDislike']);
Route::get('profile/liked-articles', [ProfileController::class, 'showLikedArticles']);

Route::get('article/{article_id}', [ArticleController::class, 'showArticle']);

Route::get('write', [WriteController::class, 'showWrite']);
Route::post('write', [WriteController::class, 'publishArticle']);
Route::get('write/get-image/{title}', [WriteController::class, 'getImage']);









