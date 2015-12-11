<?php

class MarketsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$markets = array(
			['name' => 'Asia Pacifico'],
			['name' => 'Centro y Sur America'],
			['name' => 'Colombia'],
			['name' => 'Europa'],
			['name' => 'Africa y Medio Oriente'],
			['name' => 'Norte America'],
		);

		$this->loadData('markets', $markets, 'App\Market');
    }
}
