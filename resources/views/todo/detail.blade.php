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
</div>

<label for="main" class="col-md-4 control-label">■ToDo</label>
<div class="col-md-6">
<p>{{ $todo_detail['main'] }}</p>
</div>

<label for="delivery" class="col-md-4 control-label">■納期</label>
<div class="col-md-6" style="padding-top: 8px">
<p>{{ $todo_detail['delivery'] }}</p>
</div>

<label for="share" class="col-md-4 control-label">■共有レベル</label>
<div class="col-md-6">
@if ( $todo_detail['share'] == 0)
<p>個人</p>
@elseif ( $todo_detail['share'] == 1)
<p>課内</p>
@else ( $todo_detail['share'] == 2)
<p>全体</p>
@endif
</div>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
