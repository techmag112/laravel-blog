@extends('layout')
@section('title', 'Сброс пароля')
@section('content')
    <main class="bg-darkblue text-white md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
        <div class="container">
            <div class="text-center">
                <a href="{{route('home')}}">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                    >
                </a>
            </div>
            <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                <h1 class="mb-5 text-lg font-semibold">Обновите пароль для {{$email}}</h1>
                <form class="space-y-3" method="post" action="{{route('reset.post')}}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold @error('password') border-red-500 @enderror"
                        type="password"
                        name="password"
                        required=""
                        autocomplete="current-password"
                        placeholder="Новый пароль">
                    <br>
                    @error('password')
                    <div class="text-red-500 mt-2">{{$message}}</div><br>
                    @enderror

                    <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold @error('password_confirmation') border-red-500 @enderror"
                           type="password"
                           name="password_confirmation"
                           required=""
                           autocomplete="new-password"
                           placeholder="Повторите пароль"
                    >
                    <br>
                    @error('password_confirmation')
                    <div class="text-red-500 mt-2">{{$message}}</div><br>
                    @enderror

                    <button class="w-full btn btn-pink" type="submit">Сохранить</button>
                </form>

                <div class="space-y-3 mt-5">
                    <div class="text-xxs md:text-xs">
                        Вспомнили пароль? <a class="text-white hover:text-white/70 font-bold underline underline-offset-4"
                                         href="{{route('login')}}">Войти</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
