@extends('layout')
@section('title', 'Страницы')
@section('content')
    <x-header>Статьи</x-header>
    <main class="py-16 lg:py-20"  style="margin-left:50px;">
        <div class="container">
            <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                Статьи
            </h1>

            @include('partials.category', compact('categories'))

            <div class="tasks grid gap-4 grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-14 xl:gap-y-20 mt-12 md:mt-20">
                @foreach($articles as $key=>$article)
                    <div class="tasks-card flex flex-col rounded-3xl md:rounded-[40px] bg-card">
                        <div class="tasks-card-photo overflow-hidden rounded-3xl md:rounded-[40px] xs:h-48 sm:h-[280px] sm:w-[400px]">
                            <a href="/article/{{$article->id}}">
                                <img src={{$article->image}} class="object-cover" alt="">
                            </a>
                        </div>
                        <div class="grow flex flex-col pt-6 sm:pt-10 pb-6 sm:pb-10 2xl:pb-14 px-5 sm:px-8 2xl:px-12">
                            <h3 class="text-md md:text-lg 2xl:text-xl font-black">{{$article->title}}</h3>
                            <div class="mt-auto">
                                <div class="flex flex-wrap gap-3 mt-7">
                                    <a href="#"
                                       class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                                        {{$current_category->name}}
                                    </a>
                                </div>
                                <div class="flex flex-wrap sm:items-center justify-center sm:justify-between mt-8 sm:mt-10">
                                    <a class="btn btn-pink" href="/article/{{$article->id}}">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $articles->links('pagination::tailwind') }}
        </div>
    </main>
    <x-footer></x-footer>
@endsection
