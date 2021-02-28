<?php

use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$sections = [
			['name_section' => '$B@=B$It(B'],
			['name_section' => '$BAmL3It(B'],
			['name_section' => '$B5;=QIt(B'],
		];
		DB::table('sections')->insert($sections);
    }
}
