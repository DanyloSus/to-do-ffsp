<?php

use App\Http\Requests\ToDoRequest;
use App\Models\ToDo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $latestToDos = ToDo::latest()->paginate();

    return view('list', [ 
        'toDos' => $latestToDos 
    ]);
})->name('main');

Route::get('/create', function () {
    return view('create');
})->name('create');

Route::post('/create', function (ToDoRequest $req) {
    $toDo = ToDo::create($req->validated());

    return redirect()->route('info', [
        'toDo' => $toDo,
    ])->with('success', 'To Do created!');
})->name('create.post');

Route::get('/{toDo}', function (ToDo $toDo) {
    return $toDo->title;
})->name('info');
