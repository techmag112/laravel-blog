@extends('layout')
@section('title', 'Страница')
@section('content')
    <x-header>Статьи</x-header>
    <main class="py-16 lg:py-20">
        <div class="container" style="margin-left:50px;">

            <img class="w-full rounded-xl my-8" src="{{$article[0]->cover}}" alt="">

            <div class="prose prose-lg min-w-full prose-img:rounded-xl prose-invert">
                <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                    {{$article[0]->title}}
                </h1>
                <div class="flex flex-wrap gap-3 mt-7">
                    <a href="#"
                       class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                        @foreach($article[0]->categories as $key => $category)
                            @if($key!=0) , @endif{{$category->name}}
                        @endforeach
                    </a>
                </div>

                <div class="mt-4 break-words">
                    <p>
                        {{$article[0]->body}}
                    </p>
                </div>
            </div>

        </div>
    </main>
    <x-footer></x-footer>
@endsection
