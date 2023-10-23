@extends('layout')
@section('title', 'Главная страница')
@section('content')
    <x-header>Статьи</x-header>
    <main class="py-16 lg:py-20">
        <div class="container" style="margin-left:50px;">
            <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                Список статей
            </h1>
            <br><br>
            <div>
               <a class="btn btn-pink" href="{{ route('admin.create') }}">
                    Добавить статью
               </a>
            </div>
            <br>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <!-- if users.total > 0 -->
                        @if($articles->count() > 0)
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Заголовок
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Дата
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Категории
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Автор
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Действия</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                    @foreach($articles as $key=>$article)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-white font-medium text-gray-900 text-center">
                                                    {{$article->title}}
                                               </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-white font-medium text-gray-900 text-center">
                                                    {{$article->created_at}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-white font-medium text-gray-900 text-center">
                                                    @foreach($article->categories as $index => $category)
                                                        @if($index!=0), @endif{{$category->name}}
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-white font-medium text-gray-900 text-center">
                                                    {{$authors[$key]->name}}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 text-right text-sm font-medium flex justify-end items-center space-x-3">
                                                <a
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                    href="{{ route('admin.edit', $article) }}"
                                                    style="color:blue; text-decoration:none"
                                                >Редактировать</a>/
                                                <form action="{{ route('admin.destroy', $article) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer"
                                                        style="color:red; text-decoration:none"
                                                    >Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>

                                    {{ $articles->links('pagination::tailwind') }}

                            </div>
                        @else
                            <!-- else-->
                            <br>
                            <div class="text-center font-bold text-xl">
                                Статей пока нет
                            </div>
                        @endif
                </div>
            </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
@endsection


