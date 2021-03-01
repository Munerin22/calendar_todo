@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">ToDoの詳細</div>

<div class="panel-body">
<a href="{{route('index')}}">ToDo一覧</a><br>

<label for="title" class="col-md-4 control-label">■タイトル</label>
<div class="col-md-6">
<p>{{ $todo_detail['title'] }}</p>
<hr>
</div>

<label for="main" class="col-md-4 control-label">■ToDo</label>
<div class="col-md-6">
<p>{{ $todo_detail['main'] }}</p>
<hr>
</div>

<label for="delivery" class="col-md-4 control-label">■納期</label>
<div class="col-md-6" style="padding-top: 8px">
<p>{{ $todo_detail['delivery'] }}</p>
<hr>
</div>

<label for="share" class="col-md-4 control-label">■共有レベル</label>
<div class="col-md-6">
@if ( $todo_detail['share'] == 0)
<p>個人</p>
@elseif ( $todo_detail['share'] == 1)
<p>部署内</p>
@else ( $todo_detail['share'] == 2)
<p>全体</p>
@endif
<hr>
</div>

<label for="delivery" class="col-md-4 control-label">■登録者</label>
<div class="col-md-6" style="padding-top: 8px">
<p>{{ $todo_detail['section']['section'] }}：{{ $todo_detail['user']['name'] }}</p>
<hr>
</div>

<div class="col-md-6" style="padding-top: 8px">
@if (Auth::guard()->user())
@if (Auth::guard()->user()->id == $todo_detail['user_id'])
<a href="{{route('todo_edit_form', ['id' => $todo_detail['id']])}}">ToDoの編集</a><br>
<form method="POST" action="{{route('todo_delete')}}">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{$todo_detail['id']}}">
<div align="right">
<input type="submit" value="ToDoの削除" style="background-color:#FFCCCC;border-color:#990000"><div>
</form>
@endif
@endif
</div>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
