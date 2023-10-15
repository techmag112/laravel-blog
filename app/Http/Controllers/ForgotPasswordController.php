<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(): View|Application|Factory
    {
        return view('auth.forgot');
    }

    public function submitForgetPasswordForm(Request $request) : RedirectResponse
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
       return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token): View|Application|Factory
    {
        $data = DB::table('password_resets')
            ->where([
                'token' => $token
            ])
            ->first();
        return view('auth.reset', ['token' => $token, 'email' => $data->email]);
    }


    public function submitResetPasswordForm(ResetPasswordRequest $request): Application|Redirector|RedirectResponse
    {
        //$request->validate([
        //    'password' => 'required|string|min:5|confirmed',
        //    'password_confirmation' => 'required'
        //]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::query()->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('login')->with('message', 'Your password has been changed!');
    }
}
