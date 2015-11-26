<?php

use Illuminate\Database\Seeder;

class BaseTableSeeder extends Seeder {

	public function run() {
		//Do nothing
	}

	protected function loadData($table_name, $data, $class) {
		DB::table($table_name)->truncate();

		foreach ($data as $item) {
	        $class::create($item);
		}
	}

}