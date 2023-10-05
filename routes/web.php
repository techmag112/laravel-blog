<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Models\Article;
use App\Models\Category;
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

Route::get('/', HomeController::class);
Route::get('/articles/{id?}', ArticlesController::class);
//Route::get('/articles/{id?}', function ($id = 1) {
//    $categories = Category::query()->get();
//    $current_category = Category::query('name')->where('id', $id)->get();
//    $articles = Article::query()
//        ->orderByDesc('created_at')
//        ->whereRelation('categories', 'category_id', '=', $id)
//        ->paginate(6);
//    return view('articles',  compact('articles', 'categories', 'current_category'));
//})->where('id', '[0-9]+');
