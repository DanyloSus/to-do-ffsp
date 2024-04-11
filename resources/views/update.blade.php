@extends('layout.app')

@section('heading', 'Edit the To Do')

@section('content')
    <div>
        <form method="POST" action="{{ route('update.put', [
            'toDo' => $toDo,
        ]) }}">
            @csrf
            @method('PUT')
            <div>
                <label for='title'>Title</label>
                <input id='title' name='title' value='{{ $toDo->title }}' />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for='description'>Description</label>
                <textarea id='description' name='description'>{{ $toDo->description }}</textarea>
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type='submit'>Submit</button>
            </div>
        </form>
    </div>
@endsection