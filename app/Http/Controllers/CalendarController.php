<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Carbon\CarbonImmutable;
use Carbon\Carbon;

$WEEK_DAYS = ['$BF|(B', '$B7n(B', '$B2P(B', '$B?e(B', '$BLZ(B', '$B6b(B', '$BEZ(B'];

class CalendarController extends Controller
{
    //
	public function index() {
		// $B:#7n$NF|IU$r<hF@(B($B<hF@Nc!'!!(B2020-5)
		$year = date('Y');
		$month = date('Y-m');

		// $B7n=i$NMKF|$r?tCM$G<hF@(B(0[$BF|(B]$B$+$i(B6[$BEZ(B]$B$N?tCM(B)
		$weekDay = date('w', strtotime($month));

		$dates = [];

		// $BA07n:G=*=5$NF|IU$r<hF@!J(B3$BF|"*LZMKF|$G$"$l$PA07n:G=*F|!'7nMK!"$5$i$K(B-1$BF|$,F|MK!K(B
		for ($weekDay; $weekDay >= 1; $weekDay--) {
			$dates[] = new Carbon("$month -$weekDay day");
		}

		// $B7nKvF|(B
		$lastDay = date('d', strtotime("last day of $month"));

		// $B$=$N7n$NF|IU(B
		for ($day = 1; $day <= $lastDay; $day++) {
			$dates[] = new Carbon("$month-$day");
		}

		// $B7nKv$NMKF|!J(Bdate('w', strtotime('2020-05-31')) $B"*!!(B0$B!JF|MKF|!K!K(B
		$weekDay = date('w', strtotime("$month-$lastDay"));

		// $BMh7n:G=i$N=5$NF|IU(B
		for ($day = 1; $day <= 6 - $weekDay; $day++) {
			$dates[] = new Carbon("$month-$lastDay +$day day");
		}
		
		$year = date('Y');
		$month = date('m');
		$weekCount = count($dates)/7;
		return view('index', compact('year', 'month', 'dates', 'weekCount'));
		
	}

}
