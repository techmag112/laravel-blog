@extends('layout')
@section('title', 'Главная страница')
@section('content')
    <x-header>{{$name}}</x-header>
        <main class="py-16 lg:py-20">
            <div class="container">

                @if($save)
                    <p class="max-w-[640px] mt-4 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple mb-5">
                        Изменения сохранены
                    </p>
                @endif

                <div class="md:flex md:items-start md:justify-between md:space-x-4" x-data="{active: 1}">
                    <div class="md:w-1/2 md:my-0 my-4 w-full p-2 xs:p-4 md:p-8 2xl:p-12 rounded-[20px] bg-purple">
                        <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 1}" @click="active = 1"> Редактировать профиль</div>
                        <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 2}" @click="active = 2"> Изменить пароль</div>
                    </div>
                    <div class="w-full p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                        <form class="space-y-3" x-show="active === 1" method="post" action="{{route('store_profile')}}">
                            @csrf
                            <div class="flex items-center justify-between">
                                <div><input type="file" class="hidden">
                                    <div class="mt-2"><img
                                            src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                                            alt="" class="rounded-full h-20 w-20 object-cover"></div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <button class="w-full btn btn-pink mt-2 mr-2" type="button"> Загрузить</button>
                                    <button class="w-full btn btn-outline mt-2" type="button"> Удалить</button>
                                </div>
                            </div>

                            <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                   type="text"
                                   required=""
                                   placeholder="Имя"
                                   name="name"
                                   value="{{ $name }}"
                            >
                            <br>
                            @error('name')
                            <div class="text-red-500 mt-2">{{$message}}</div><br>
                            @enderror
                            <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                   type="email"
                                   required=""
                                   placeholder="E-mail"
                                   name="email"
                                   value="{{ $email }}"
                            >
                            <br>
                            @error('email')
                            <div class="text-red-500 mt-2">{{$message}}</div><br>
                            @enderror
                            <button class="w-full btn btn-pink" type="submit"> Сохранить</button>


                        </form>
                        <form class="space-y-3" x-show="active === 2" type="POST" action="">
                            @csrf
                            <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                   type="password"
                                   required=""
                                   autocomplete="old-password"
                                   placeholder="Текущий пароль"
                                   name="old-password"
                            >

                            <input
                                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                type="password" required="" autocomplete="new-password" placeholder="Новый пароль"
                                name="current-password"
                            >

                            <input
                                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                type="password" required="" autocomplete="new-password" placeholder="Повторите пароль"
                                name="password_confirmation"
                            >

                            <button class="w-full btn btn-pink" type="submit"> Сменить пароль</button>


                        </form>
                    </div>
                </div>
            </div>
        </main>
    <x-footer></x-footer>
@endsection
