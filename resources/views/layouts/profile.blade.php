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
                @if($errors->any())
                        <p class="max-w-[640px] mt-4 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple mb-5">
                        {!! implode('', $errors->all(':message<br>')) !!}
                        </p>
                @endif

               <div class="md:flex md:items-start md:justify-between md:space-x-4" x-data="{active: 1}">
                    <div class="md:w-1/2 md:my-0 my-4 w-full p-2 xs:p-4 md:p-8 2xl:p-12 rounded-[20px] bg-purple">
                        <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 1}" @click="active = 1"> Редактировать профиль</div>
                        <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 2}" @click="active = 2"> Изменить пароль</div>
                    </div>
                    <div class="w-full p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">

                        @include('partials.avatar', ['avatar' => $avatar])

                        <form class="space-y-3" x-show="active === 1" method="post" action="{{route('store_profile')}}">
                            @csrf
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

                        <form class="space-y-3" x-show="active === 2" method="post" action="{{route('store_password')}}">
                            @csrf
                            @method('delete')
                            <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                   type="password"
                                   required=""
                                   placeholder="Текущий пароль"
                                   name="current_password"
                            >
                            @error('current_password')
                            <div class="text-red-500 mt-2">{{$message}}</div><br>
                            @enderror
                            <input
                                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                type="password" required="" placeholder="Новый пароль"
                                name="password"
                            >
                            @error('password')
                            <div class="text-red-500 mt-2">{{$message}}</div><br>
                            @enderror
                            <input
                                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                                type="password" required="" placeholder="Повторите пароль"
                                name="password_confirmation"
                            >
                            @error('password_confirmation')
                            <div class="text-red-500 mt-2">{{$message}}</div><br>
                            @enderror
                            <button class="w-full btn btn-pink" type="submit"> Сменить пароль</button>
                        </form>

                    </div>
                </div>
            </div>
        </main>
    <x-footer></x-footer>
@endsection
