@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">ToDo
<div class="text-right">
<a href="{{route('index')}}">Home</a>
</div>
</div>
<div class="panel-body">

@if (Session::has('flash_message'))
<div style="padding: 5px; margin-bottom: 5px; border: 1px dotted #333333; background-color: #ffffdd;">
<font color="#44aaee"><center>{{session('flash_message')}}</center></font><br>
</div>
@endif

@if (Auth::guard()->user())
<a href="{{route('todo_add_form')}}"><center>ToDoの追加</center></a>
@else
【ログインしてください】
@endif
<br>

ToDoのカテゴリ
<ul>
<li><font color=#FF9999>全体</font></li>
<li><font color=#0099CC>部署内</font></li>
<li><font color=#99CC66>個人</font></li>
@if (Auth::guard()->user())
@if (Auth::guard()->user()->position == 1)
<li><font color=#000>リーダー</font></li>
@endif
@endif
</ul>

<div class="calender">
<table class="table">
<tr>
<td colspan="2">
@if ($month - 1 > 0)
<a href="{{route('other', ['month' => $month-1])}}">＜--{{ $month-1 }}月</a>
@endif
</td>
<th colspan="3">
<div class="text-center">
{{ $year }}年{{ $month }}月
</div>
</th>
<td colspan="2">
<div class="text-right">
@if ($month + 1 < 13)
<a href="{{route('other', ['month' => $month+1])}}">{{ $month+1 }}月--＞</a>
@endif
</div>
</td>
</tr>

<tr>
<th class="sun"  style="color: red"><div class="text-center">日</div></th>
<th class="mon"><div class="text-center">月</div></th>
<th class="tue"><div class="text-center">火</div></th>
<th class="wed"><div class="text-center">水</div></th>
<th class="thu"><div class="text-center">木</div></th>
<th class="fri"><div class="text-center">金</div></th>
<th class="sat"  style="color: blue"><div class="text-center">土</div></th>
</tr>

@for ($week = 1; $week <= $weekCount; $week++)
<tr>
@for ($oneweek = 0; $oneweek <= 6; $oneweek++)
<td>
<div class="text-center">
{{ $dates[$oneweek + (($week - 1) * 7)]->format('j') }}
<br>

@foreach ($todos as $todo)
<!-- 全体 -->
@if (2 == $todo['share'] && $dates[$oneweek + (($week - 1) * 7)]->format('Y-m-d') == $todo['delivery'])
<a href="{{route('todo_detail', ['id' => $todo['id']])}}"><font color=#FF9999>{{ mb_substr($todo['title'], 0, 5, 'UTF-8') }}…</font></a><br>
@endif

@if (Auth::guard()->user())
<!-- ユーザーのToDoを表示 -->
@if (Auth::guard()->user()->id == $todo['user_id'] && Auth::guard()->user()->position ==0 && 0 == $todo['share'] && $dates[$oneweek + (($week - 1) * 7)]->format('Y-m-d') == $todo['delivery'])
<a href="{{route('todo_detail', ['id' => $todo['id']])}}"><font color=#99CC66>{{ mb_substr($todo['title'], 0, 5, 'UTF-8') }}…</font></a><br>

<!-- リーダーのToDoを表示 -->
@elseif (Auth::guard()->user()->id == $todo['user_id'] && Auth::guard()->user()->position ==1 && 0 == $todo['share'] && $dates[$oneweek + (($week - 1) * 7)]->format('Y-m-d') == $todo['delivery'])
<a href="{{route('todo_detail', ['id' => $todo['id']])}}"><font color=#000>{{ mb_substr($todo['title'], 0, 5, 'UTF-8') }}…</font></a><br>

<!-- リーダーはメンバーのToDoも把握できるようにする -->
@elseif (Auth::guard()->user()->position == 1 && Auth::guard()->user()->section == $todo['section_id'] && 0 == $todo['share'] && $dates[$oneweek + (($week - 1) * 7)]->format('Y-m-d') == $todo['delivery'])
<a href="{{route('todo_detail', ['id' => $todo['id']])}}"><font color=#99CC66>{{ mb_substr($todo['title'], 0, 5, 'UTF-8') }}…</font></a><br>
@endif

<!-- 部署内のToDoを表示 -->
@if (Auth::guard()->user()->section == $todo['section_id'] && 1 == $todo['share'] && $dates[$oneweek + (($week - 1) * 7)]->format('Y-m-d') == $todo['delivery'])
<a href="{{route('todo_detail', ['id' => $todo['id']])}}"><font color=#0099CC>{{ mb_substr($todo['title'], 0, 5, 'UTF-8') }}…</font></a><br>
@endif

@endif
@endforeach

</div>
</td>
@endfor
</tr>
@endfor
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection
