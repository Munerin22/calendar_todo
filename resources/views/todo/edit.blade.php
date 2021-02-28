@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">ToDoの編集</div>

<div class="panel-body">
<a href="{{route('index')}}">ToDo一覧</a>
<form class="form-horizontal" method="POST" action="{{ route('todo_update') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">タイトル</label>

<div class="col-md-6">
<input id="title" type="text" class="form-control" name="title" value="{{ $todo_edit['title'] }}" required autofocus>

@if ($errors->has('title'))
<span class="help-block">
<strong>{{ $errors->first('title') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('main') ? ' has-error' : '' }}">
<label for="main" class="col-md-4 control-label">ToDo</label>

<div class="col-md-6">
<textarea name="main" cols="46" rows="5" placeholder="やる事を入力してください" required>{{ $todo_edit['main'] }}</textarea>
@if ($errors->has('main'))
<span class="help-block">
<strong>{{ $errors->first('main') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group row">
<label for="delivery" class="col-md-4 control-label">納期</label>

<div class="col-md-6" style="padding-top: 8px">
<input id="delivery" type="date" name="delivery" value="{{ $todo_edit['delivery'] }}" required >

@if ($errors->has('delivery'))
<span class="help-block">
<strong>{{ $errors->first('delivery') }}</strong>
</span>
@endif
</div>
</div>

<!-- position -->
<div class="form-group{{ $errors->has('share') ? ' has-error' : '' }}">
<label for="share" class="col-md-4 control-label">共有レベル</label>

<div class="col-md-6">
@if ($todo_edit['share'] == 0)
<input id="share-p" type="radio" name="share" value="0" checked>
@else
<input id="share-p" type="radio" name="share" value="0" required>
@endif
<label for="share-p">個人</label>/

@if ($todo_edit['share'] == 1)
<input id="share-s" type="radio" name="share" value="1" checked>
@else
<input id="share-s" type="radio" name="share" value="1" required>
@endif
<label for="share-s">部署内</label>

@if ($todo_edit['share'] == 2)
<input id="share-pub" type="radio" name="share" value="2" checked>
@else
<input id="share-pub" type="radio" name="share" value="2" required>
@endif
<label for="share-pub">全体</label>

@if ($errors->has('share'))
<span class="help-block">
<strong>{{ $errors->first('share') }}</strong>
</span>
@endif
</div>
</div>

<input type="hidden" name="id" value="{{ $todo_edit['id'] }}" >
<input type="hidden" name="user_id" value="{{ auth()->user()->id }}" >
<input type="hidden" name="section_id" value="{{ $todo_edit['section']['id'] }}" >

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
更新
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
