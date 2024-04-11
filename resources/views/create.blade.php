@extends('layout.app')

@section('heading', 'Create To Do')

@section('content')
    <div>
        <form action='{{ route('create.post') }}' method='POST'>
            @csrf
            <div>
                <label for='title'>Title</label>
                <input id='title' name='title' value='{{ old('title') }}' />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for='description'>Description</label>
                <textarea id='description' name='description'>{{ old('description') }}</textarea>
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
