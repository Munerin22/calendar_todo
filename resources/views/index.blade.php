<div class="card">
<div class="card-header" style="text-align: center;">
- 予約 -
</div>
<div class="card-body">

<div class="calender">
<form class="prev-next-form"></form>
<table class="table">
<tr>
<td colspan="2">

</td>
<th colspan="3">
<div class="text-center">
{{ $year }}年{{ $month }}月
</div>
</th>
<td colspan="2">
<div class="text-right">

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
</div>
</td>
@endfor
</tr>
@endfor
</table>
</div>
</div>
