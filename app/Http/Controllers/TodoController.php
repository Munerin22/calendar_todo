<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //
	public function add(Request $request) {
			$validatedData = $request->validate([
				'title' => 'required|max:50',
				'main' => 'required',
				'delivery' => 'required|date',
			]);

			//Todo$B$NDI2C(B
			$todo_add = new Todo;
			$todo = $request->all();
			unset($todo['_token']);
			$todo_add->fill($todo)->save();

			//Todo$BDI2C8e(B
			return redirect()->route('index');
	}

	public function detail($todo_id = null) {
			//DB$B$+$i(BURL$B%Q%i%a!<%?$N(Btodo$B%l%3!<%I$r<hF@(B
			$todo_detail = Todo::where('id', $todo_id)->first();
			//$detailTodo$B$,$"$k$+$I$&$+3NG'(B
			if ($todo_detail) {
				return view('todo.detail', compact('todo_detail'));
			} else {
				return redirect('/');
			}
	}
}
