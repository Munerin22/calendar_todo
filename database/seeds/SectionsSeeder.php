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
			['name_section' => '製造部'],
			['name_section' => '総務部'],
			['name_section' => '技術部'],
		];
		DB::table('sections')->insert($sections);
    }
}
