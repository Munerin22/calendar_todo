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

			//Todoの追加
			$todo_add = new Todo;
			$todo = $request->all();
			unset($todo['_token']);
			$todo_add->fill($todo)->save();

			//Todo追加後
			return redirect()->route('index');
	}

	public function detail($todo_id = null) {
			//DBからURLパラメータのtodoレコードを取得
			$todo_detail = Todo::where('id', $todo_id)->first();
			//$detailTodoがあるかどうか確認
			if ($todo_detail) {
				return view('todo.detail', compact('todo_detail'));
			} else {
				return redirect('/');
			}
	}
}
