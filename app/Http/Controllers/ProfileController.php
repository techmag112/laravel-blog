<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordProfileRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function profile(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //$data = User::query()->where('id', '=', 1)->first();
        return view('layouts.profile', [
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'avatar' => Auth::user()->avatar,
            'save'=>false
        ]);
    }

    /**
     * @param ProfileRequest $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function store_profile(ProfileRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        User::query()->where('id', '=', Auth::id())->update([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
        ]);
        Auth::user()->update([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
        ]);
        return view('layouts.profile', [
            'name'=> Auth::user()->name,
            'email'=> Auth::user()->email,
            'avatar' => Auth::user()->avatar,
            'save'=>true
        ]);
    }

    /**
     * @param ChangePasswordProfileRequest $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function store_password(ChangePasswordProfileRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

         User::query()->where('id', Auth::id())
            ->update(['password' => Hash::make($request->password)]);

        return view('layouts.profile', [
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'avatar' => Auth::user()->avatar,
            'save'=>true
        ]);

    }

}
