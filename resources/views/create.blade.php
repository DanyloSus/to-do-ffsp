@extends('layout.app')

@section('heading', 'Create To Do')

@section('content')
    <div>
        <form action='{{ route('create.post') }}' method='POST'>
            @csrf
            <div>
                <label for='title'>Title</label>
                <input id='title' name='title' />
            </div>
            <div>
                <label for='description'>Description</label>
                <textarea id='description' name='description'></textarea>
            </div>
            <div>
                <button type='submit'>Submit</button>
            </div>
        </form>
    </div>
@endsection
