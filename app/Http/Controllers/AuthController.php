<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function login(): Factory|View|Application
    {
        return view('auth.login');
    }

    /**
     * @return Factory|View|Application
     */
    public function register(): Factory|View|Application
    {
        return view('auth.register');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function authorization(LoginRequest $request): RedirectResponse
    {
       if (!Auth::attempt($request->only('email', 'password'))) {
          return back()->withErrors([
               'email'=>'User not found or password error!'
           ]);
       }
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        User::query()->create([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'email_verified_at' => now(),
        ]);

        return redirect()->route('login');
    }

    /**
     * @param Request $request
     * @return Redirector|RedirectResponse|Application
     */
    public function logout(Request $request): Redirector|RedirectResponse|Application
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->guest(route('home'));
    }
}
