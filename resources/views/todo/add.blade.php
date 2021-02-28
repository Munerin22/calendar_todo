@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">ToDoの追加</div>

<div class="panel-body">
<a href="{{route('index')}}">ToDo一覧</a>
<form class="form-horizontal" method="POST" action="{{ route('todo_add') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">タイトル</label>

<div class="col-md-6">
<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

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
<textarea name="main" cols="46" rows="5" placeholder="やる事を入力してください" required></textarea>
@if ($errors->has('main'))
<span class="help-block">
<strong>{{ $errors->first('main') }}</strong>
</span>
@endif
</div>
</div>

<!-- section -->
<div class="form-group row">
<label for="delivery" class="col-md-4 control-label">納期</label>

<div class="col-md-6" style="padding-top: 8px">
<input id="delivery" type="date" name="delivery" required >

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
<input id="share-p" type="radio" name="share" value="0">
<label for="share-p">個人</label>/
<input id="share-s" type="radio" name="share" value="1" required >
<label for="share-s">部署内</label>
<input id="share-pub" type="radio" name="share" value="2" >
<label for="share-pub">全体</label>

@if ($errors->has('share'))
<span class="help-block">
<strong>{{ $errors->first('share') }}</strong>
</span>
@endif
</div>
</div>
<!-- end -->

<input type="hidden" name="user_id" value="{{ auth()->user()->id }}" >

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
追加
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
