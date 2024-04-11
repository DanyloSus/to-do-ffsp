@extends('layout.app')

@section('heading', 'To Do List')

@section('content')
    <div>
        <a href='{{ route('create') }}'>Create</a>
    </div>

    @forelse ($toDos as $toDo)
        <div class='flex flex-col gap-3'>
            <a href='{{ route('info', [
                'toDo' => $toDo
            ]) }}'
                class='hover:font-medium hover:text-xl transition-all'
            >{{ $toDo->title }}</a>
        </div>
    @empty
        <div class='absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2'>
            It's nothing here, yet...
        </div>
    @endforelse
    @if ($toDos->count())
        <nav class='mx-10 mt-10'>{{ $toDos->links() }}</nav>
    @endif
@endsection