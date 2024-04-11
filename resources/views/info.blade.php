@extends('layout.app')

@section('heading', $toDo->title)

@section('content')
    <div class='flex flex-col gap-3 items-center'>
        <p>{{ $toDo->completed ? '' : 'Not' }} Completed</p>
        <p>{{ $toDo->description }}</p>
        <p>Created: {{ $toDo->created_at->diffForHumans() }}</p>
        <p>Updated: {{ $toDo->updated_at->diffForHumans() }}</p>
        <a href='{{ route('update', [
            'toDo' => $toDo
        ]) }}' class='btn w-min'>Edit</a>
        <div>
            <form method="POST" action="{{ route('info.toogle', [
                'toDo' => $toDo,
            ]) }}" >
                @csrf
                @method('PUT')
                <button type='submit'>Toogle</button>
            </form>
        </div>
        <div>
            <form method="POST" action="{{ route('info.destroy', [
                'toDo' => $toDo,
            ]) }}" >
                @csrf
                @method('DELETE')
                <button type='submit'>Delete</button>
            </form>
        </div>
    </div>
@endsection