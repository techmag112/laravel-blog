
@extends('layout')
@section('title', 'Восстановление пароля')
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
                <h1 class="mb-5 text-lg font-semibold">Восстановить пароль</h1>
                <form class="space-y-3" method="post" action="{{route('forget.post')}}">
                    @csrf
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        type="email"
                        required=""
                        autofocus=""
                        autocomplete="email"
                        name="email"
                        placeholder="E-mail"
                    >
                    @error('email')
                    <div class="text-red-500 mt-2">{{$message}}</div><br>
                    @enderror

                    <button class="w-full btn btn-pink" type="submit">Отправить</button>
                </form>

                <div class="space-y-3 mt-5">
                    <div class="text-xxs md:text-xs">
                        <a class="text-white hover:text-white/70 font-bold"
                           href="{{route('login')}}"
                        >
                            Я вспомнил пароль
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
