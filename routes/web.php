<?php

use App\Http\Controllers\ToDoController;
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
    $latestToDos = ToDo::latest()->paginate(5);

    return view('list', [ 
        'toDos' => $latestToDos 
    ]);
})->name('main');

Route::get('/create', [ToDoController::class, 'showCreate'])->name('create');

Route::post('/create', [ToDoController::class, 'create'])->name('create.post');

Route::get('/{toDo}', [ToDoController::class, 'show'])->name('info');

Route::put('/{toDo}', [ToDoController::class, 'toogle'])->name('info.toogle');

Route::delete('/{toDo}', [ToDoController::class, 'destroy'])->name('info.destroy');

Route::get('/{toDo}/edit', [ToDoController::class, 'showEdit'])->name('update');

Route::put('/{toDo}/edit', [ToDoController::class, 'update'])->name('update.put');