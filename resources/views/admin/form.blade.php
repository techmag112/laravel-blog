@extends('layout')
@section('title', 'Добавление статьи')
@section('content')

    <main class="py-16 lg:py-20">
        <div class="container" style="margin-left:50px;">
            <header class="shadow mb-10">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl text-white-900 font-bold">
                        Добавить статью
                    </h1>
                </div>
            </header>
            <br>
            <a href="{{ route('admin.index') }}" class="text-indigo-600 hover:text-indigo-900 my-5 block">
                Вернуться назад
            </a>
            <br>
            <form action="{{ $article->exists ? route('admin.update', $article) : route('admin.store') }}"
                  method="POST">
                @csrf
                @method( $article->exists ? 'PUT' : 'POST' )
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-white-700">Заголовок</label>
                                <input type="text"
                                       name='title'
                                       style="color:blue; text-decoration:none"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{ old('title', $article) }}"
                                >
                                @error('title')
                                    <div class="text-red-500 mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-white-700">Текст</label>
                                <input type="text"
                                       name='body'
                                       style="color:blue; text-decoration:none"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{ old('body', $article) }}"
                                >
                                @error('body')
                                    <div class="text-red-500 mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-white-700">Категории</label>
                                <select multiple size="3"
                                        name='category_id[]'
                                        style="color:blue; text-decoration:none"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                >

                                @foreach($categories as $key=>$category)

                                     <option value="{{$key}}"
                                         {!! (collect(old('category_id', $category_list))->contains($key)) ? 'selected="selected"' : '' !!}>
                                         {{$category}}
                                     </option>
                                @endforeach


                                </select>
                                @error('category_id')
                                    <div class="text-red-500 mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-white-700">Автор</label>
                                <select size='1'
                                        name='user_id'
                                        style="color:blue; text-decoration:none"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @foreach($authors as $id => $author)
                                        <option value="{{$id}}" @selected((int) old('user_id', $article) === $id )>{{$author}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="text-red-500 mt-2">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-pink inline-flex justify-center">
                            {{ $article->exists ? 'Сохранить' : 'Добавить' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
