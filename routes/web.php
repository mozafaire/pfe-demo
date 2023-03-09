<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author\AuthorRegisterController;
use App\Http\Controllers\Editor\EditorRegisterController;
use App\Http\Controllers\Reviewer\ReviewerRegisterController;
use App\Http\Controllers\article\ArticleController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:author'])->group(function(){
        Route::view('/login','dashboard.author.login')->name('login');
        Route::view('/register','dashboard.author.register')->name('register');
        Route::post('/create',[AuthorRegisterController::class,'create'])->name('create');
        Route::post('/customLogin',[AuthorRegisterController::class,'customLogin'])->name('customLogin');
    });
    Route::middleware(['auth:author'])->group(function(){
        Route::view('/home','dashboard.author.home')->name('home');
        Route::post('/logout',[AuthorRegisterController::class,'logout'])->name('logout');
        Route::post('/uploade',[ArticleController::class,'uploade'])->name('uploade');
        Route::get('/create-article',[ArticleController::class,'index_create_article'])->name('create-article');
        Route::get('/traitement-article',[ArticleController::class,'index_show_traitement_article'])->name('traitement-article');
        Route::get('/accept-article',[ArticleController::class,'index_show_accept_article'])->name('accept-article');
        Route::get('/refuse-article',[ArticleController::class,'index_show_refuse_article'])->name('refuse-article');
        Route::get('/libre-article',[ArticleController::class,'index_show_libre_article'])->name('libre-article');

    });
});

Route::prefix('editor')->name('editor.')->group(function(){
    Route::middleware(['guest:editor'])->group(function(){
        Route::view('/login','dashboard.editor.login')->name('login');
        Route::view('/register','dashboard.editor.register')->name('register');
        Route::post('/create',[EditorRegisterController::class,'create'])->name('create');
        Route::get('/customLogin',[EditorRegisterController::class,'customLogin'])->name('customLogin');
    });
    Route::middleware(['auth:editor'])->group(function(){
        Route::view('/home','dashboard.editor.home')->name('home');
        Route::post('/logout',[EditorRegisterController::class,'logout'])->name('logout');
        Route::get('/libre-article',[ArticleController::class,'show_libre_article'])->name('libre-article');
        Route::get('/validation-article',[ArticleController::class,'validation_article'])->name('validation-article');
        Route::get('/update-etat',[ArticleController::class,'update_etat'])->name('update-etat');

    });
});

Route::prefix('reviewer')->name('reviewer.')->group(function(){
    Route::middleware(['guest:reviewer'])->group(function(){
        Route::view('/login','dashboard.reviewer.login')->name('login');
        Route::view('/register','dashboard.reviewer.register')->name('register');
        Route::post('/create',[ReviewerRegisterController::class,'create'])->name('create');
        Route::post('/dologin',[ReviewerRegisterController::class,'dologin'])->name('dologin');
        Route::post('/customLogin',[ReviewerRegisterController::class,'customLogin'])->name('customLogin');
    });
    Route::middleware(['auth:reviewer'])->group(function(){
        Route::view('/home','dashboard.Reviewer.home')->name('home');
        Route::post('/logout',[ReviewerRegisterController::class,'logout'])->name('logout');

    });
});

/*Route::prefix('article')->name('article.')->group(function(){
    Route::get('/uploade',[ArticleController::class,'uploade'])->name('uploade');
});*/