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
    return view('info', [
        'toDo' => $toDo
    ]);
})->name('info');

Route::delete('/{toDo}', function (ToDo $toDo) {
    $toDo->delete();

    return redirect()->route('main')->with('success', 'To Do deleted');
})->name('info.destroy');

Route::get('/{toDo}/edit', function(ToDo $toDo) {
    return view('update', [
        'toDo' => $toDo
    ]);
})->name('update');

Route::put('/{toDo}/edit', function(ToDo $toDo, ToDoRequest $req) {
    $toDo->update($req->validated());

    return redirect()->route('info', [
        'toDo' => $toDo
    ])->with('success', 'To Do updated!');
})->name('update.put');