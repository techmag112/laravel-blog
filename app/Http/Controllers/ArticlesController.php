<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __invoke($id = 1): View|Application|Factory
    {
        $categories = Category::query()->get();
        $current_category = Category::query()->select('name')->where('id', $id)->first();
        $articles = Article::query()
            ->orderByDesc('created_at')
            ->whereRelation('categories', 'category_id', '=', $id)
            ->paginate(6);
        return view('layouts.articles',  compact('articles', 'categories', 'current_category'));
    }
}
