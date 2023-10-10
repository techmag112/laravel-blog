<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return View|Application|Factory
     */
    public function __invoke(): View|Application|Factory
    {

        $articles = Article::query()
            ->orderByDesc('id')
            ->take(6)
            ->with('categories:name')
            ->get();
        return view('layouts.home',  compact('articles'));
    }
}
