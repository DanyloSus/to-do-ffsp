@extends('layout.app')

@section('heading', $toDo->title)

@section('content')
    <div>
        <p>{{ $toDo->description }}</p>
    </div>
@endsection