<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Todolist;

class TodoController extends Controller
{
    public function postAdd(Request $req)
    {
    	$todo = Auth::user()->todos()->create([
            'content' => $req->input('content'),
            'deadline' => $req->input('deadline')
    	]);

    	return view('layouts.todo', ['todo' => $todo]);
    }

    public function postRemove(Request $req, $todo_id)
    {
    	Todolist::find($todo_id)->delete();
    }
}
