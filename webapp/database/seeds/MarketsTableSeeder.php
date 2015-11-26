<?php

class MarketsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$markets = array(
			['name' => 'ASIA PACIFICO'],
			['name' => 'CENTRO Y SUR AMERICA'],
			['name' => 'COLOMBIA'],
			['name' => 'EUROPA'],
			['name' => 'AFRICA Y MEDIO ORIENTE'],
			['name' => 'NORTE AMERICA'],
		);

		$this->loadData('markets', $markets, 'App\Market');
    }
}
