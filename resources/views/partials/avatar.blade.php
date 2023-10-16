@php use function PHPUnit\Framework\isEmpty; @endphp
<div class="flex items-center justify-between">
    <div>
        <div class="mt-2">
            @if($avatar!= null)
                <img
                    src="{{ Vite::asset('storage/app/public/'. $avatar)}}"
                    alt="" class="rounded-full h-20 w-20 object-cover">
            @else
                <img
                    src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                    alt="" class="rounded-full h-20 w-20 object-cover">
            @endif
        </div>
    </div>
    <form action="{{route('upload_avatar')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="flex justify-between" style='flex-wrap: nowrap; justify-content:flex-end; align-items:center'>
            <div>
                <input type="file" name="avatar">
            </div>
            <div>
                <button class="w-full btn btn-pink mt-2 mr-2" type="submit"> Загрузить</button>
            </div>
        </div>
    </form>
    <div>
        <form action="{{route('delete_avatar')}}" method="post">
            @csrf
            @method('delete')
            <button class="w-full btn btn-outline mt-2" type="submit"> Удалить</button>
        </form>
    </div>
</div>

