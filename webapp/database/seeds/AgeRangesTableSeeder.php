<?php

class AgeRangesTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => '20- 30'],
			['description' => '30-40'],
			['description' => '40-50'],
			['description' => '50 o mas'],
    	);

        $this->loadData('age_ranges', $data, 'App\AgeRange');
    }
}
