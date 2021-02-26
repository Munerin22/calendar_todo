<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Carbon\CarbonImmutable;
use Carbon\Carbon;

$WEEK_DAYS = ['日', '月', '火', '水', '木', '金', '土'];

class CalendarController extends Controller
{
    //
	public function index() {
		// 今月の日付を取得(取得例：　2020-5)
		$year = date('Y');
		$month = date('Y-m');

		// 月初の曜日を数値で取得(0[日]から6[土]の数値)
		$weekDay = date('w', strtotime($month));

		$dates = [];

		// 前月最終週の日付を取得（3日→木曜日であれば前月最終日：月曜、さらに-1日が日曜）
		for ($weekDay; $weekDay >= 1; $weekDay--) {
			$dates[] = new Carbon("$month -$weekDay day");
		}

		// 月末日
		$lastDay = date('d', strtotime("last day of $month"));

		// その月の日付
		for ($day = 1; $day <= $lastDay; $day++) {
			$dates[] = new Carbon("$month-$day");
		}

		// 月末の曜日（date('w', strtotime('2020-05-31')) →　0（日曜日））
		$weekDay = date('w', strtotime("$month-$lastDay"));

		// 来月最初の週の日付
		for ($day = 1; $day <= 6 - $weekDay; $day++) {
			$dates[] = new Carbon("$month-$lastDay +$day day");
		}
		
		$year = date('Y');
		$month = date('m');
		$weekCount = count($dates)/7;
		return view('index', compact('year', 'month', 'dates', 'weekCount'));
		
	}

}
