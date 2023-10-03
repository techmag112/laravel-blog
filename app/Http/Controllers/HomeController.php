<?php

namespace App\Http\Controllers;

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
        return view('home');
    }
}
