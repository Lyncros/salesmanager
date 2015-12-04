<?php

class CustomerSinceTableSeeder extends BaseTableSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => '0 - 5 años'],
			['description' => '5 - 10 años'],
			['description' => '10 - 15 años'],
			['description' => '15 o mas'],
    	);

    	$this->loadData('customer_sinces', $data, 'App\CustomerSince');
    }
}
