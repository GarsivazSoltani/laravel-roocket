<?php

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
    // $article = new Article();
    // $article->title = request('title');
    // $article->slug = request('title');
    // $article->body = request('body');
    // $article->save();

    $validate_data = Validator::make(request()->all(), [
      'title' => 'required|min:10|max:50',
      'body' => 'required'
    ])->validated();

    dd($validate_data);
    // if($validator->fails()){
    //   return redirect()
    //     ->back()
    //     ->withErrors($validator);
    // }

    Article::create([
      'title' => $validate_data['title'],
      'slug' => $validate_data['title'],
      'body' => $validate_data['body']
    ]);

    return redirect('/admin/articles/create');
  });
});
