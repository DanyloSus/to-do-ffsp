@extends('layout.app')

@section('heading', 'To Do List')

@section('content')
    @forelse ($toDos as $toDo)
        <div>
            <a href='{{ route('info', [
                'toDo' => $toDo
            ]) }}'>{{ $toDo->title }}</a>
        </div>
    @empty
        <div>
            It's nothing here, yet...
        </div>
    @endforelse
@endsection