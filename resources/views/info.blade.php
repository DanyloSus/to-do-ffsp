@extends('layout.app')

@section('heading', $toDo->title)

@section('content')
    <div>
        <p>{{ $toDo->description }}</p>
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