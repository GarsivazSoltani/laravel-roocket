<?php

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', function () {
  $articles = Article::all();
  // dd($articles);
  return view('index');
});

Route::get('/about', function () {
  return view('about');
});

Route::get('/contact', function () {
  return view('contact');
});

Route::prefix('/admin')->group(function () {
  Route::get('/articles/create', function () {
    if($_GET){
      dd($_GET);
    }
    return view('admin.articles.create');
  });

  Route::post('/articles/create', function () {
    return dd('test');
  });
});
