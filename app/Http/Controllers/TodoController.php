<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //ToDoの追加
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

	//ToDoの詳細
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

	//ToDoの編集
	public function edit($todo_id = null) {
		$todo_edit = Todo::where('id', $todo_id)->first();
		if ($todo_edit) {
			return view('todo.edit', compact('todo_edit'));
		} else {
			return redirect()->route('index');
		}
	}

	//ToDoの更新
	public function update(Request $request) {
		$validatedData = $request->validate([
			'title' => 'required|max:50',
			'main' => 'required',
			'delivery' => 'required|date',
			'section_id' => 'required|numeric',
		]);

		$todo_update = Todo::where('id', $request->id)->first();
		//ログインユーザーの確認
		$user_id = Auth::guard()->user()->id;
		if ($user_id == $todo_update->user_id) {

			//ToDoが存在しない場合
			if (!$todo_update) {
				return redirect()->route('index');
			}

			$todo = $request->all();
			unset($todo['_token']);
			$todo_update->fill($todo)->save();
		}
		return redirect()->route('index');
	}
}
