@extends('layout.app')

@section('heading', $toDo->title)

@section('content')
    <div>
        <p>{{ $toDo->description }}</p>
        <p>{{ $toDo->completed }}</p>
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