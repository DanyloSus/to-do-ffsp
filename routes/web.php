<?php

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

Route::get('/{toDo}', function (ToDo $toDo) {
    return $toDo->title;
})->name('main');
