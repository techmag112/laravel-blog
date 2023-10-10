<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __invoke($id): View|Application|Factory
    {
        $article = Article::query()
            ->where('id', $id)
            ->with('categories:name')
            ->first();
        return view('layouts.article',  compact('article'));
    }
}
