<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Http\Requests\ToDoRequest;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function show(ToDo $toDo) {
        return view('info', [
            'toDo' => $toDo
        ]);
    }

    public function toogle(ToDo $toDo) {
        $toDo->toogle();
    
        return redirect()->back()->with('success', 'Task toogled!');
    }

    public function destroy(ToDo $toDo) {
        $toDo->delete();

        return redirect()->route('main')->with('success', 'To Do deleted');
    }

    public function showCreate() {
        return view('create');
    }

    public function create(ToDoRequest $req) {
        $toDo = ToDo::create($req->validated());

        return redirect()->route('info', [
            'toDo' => $toDo,
        ])->with('success', 'To Do created!');
    }

    public function showEdit(ToDo $toDo) {
        return view('update', [
            'toDo' => $toDo
        ]);
    }

    public function update(ToDo $toDo, ToDoRequest $req) {
        $toDo->update($req->validated());

        return redirect()->route('info', [
            'toDo' => $toDo
        ])->with('success', 'To Do updated!');
    }
}
