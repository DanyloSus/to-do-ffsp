@extends('layout.app')

@section('heading', 'Edit the To Do')

@section('content')
    <div>
        <form method="POST" action="{{ route('update.put', [
            'toDo' => $toDo,
        ]) }}"
            class='flex flex-col gap-3'
        >
            @csrf
            @method('PUT')
            <div class='flex items-center justify-center gap-3'>
                <label for='title'>Title</label>
                <input id='title' name='title' value='{{ $toDo->title }}' />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class='flex items-center justify-center gap-3'>
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