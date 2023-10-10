
@extends('layout')
@section('title', 'Авторизация')
@section('content')
    <main class="bg-darkblue text-white md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
        <div class="container">
            <div class="text-center">
                <a rel="home" href="/">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                    >
                </a>
            </div>
            <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                <h1 class="mb-5 text-lg font-semibold">Вход в аккаунт</h1>
                <form class="space-y-3" method="post" action="{{route('login')}}">
                    @csrf
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold @error('email') border-red-500 @enderror"
                        type="email"
                        required=""
                        autofocus=""
                        autocomplete="email"
                        placeholder="E-mail"
                        name="email"
                        value="{{ old('email') }}">
                    <br>
                    @error('email')
                        <div class="text-red-500 mt-2">{{$message}}</div><br>
                    @enderror

                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold  @error('password') border-red-500 @enderror"
                        type="password"
                        required=""
                        autocomplete="current-password"
                        placeholder="Пароль"
                        name="password">
                    <br>
                    @error('password')
                        <div class="text-red-500 mt-2">{{$message}}</div><br>
                    @enderror
                    <button class="w-full btn btn-pink" type="submit">Войти</button>
                </form>

                <div class="space-y-3 mt-5">
                    <div class="text-xxs md:text-xs">
                        <a class="text-white hover:text-white/70 font-bold"
                           href="/forgot"
                        >
                            Забыли пароль?
                        </a>
                    </div>
                    <div class="text-xxs md:text-xs">
                        <a class="text-white hover:text-white/70 font-bold"
                           href="{{route('register')}}">
                            Регистрация
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
