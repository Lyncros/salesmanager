<?php

class SizesTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => '0'],
			['description' => 'L'],
			['description' => 'M'],
			['description' => 'XL'],
			['description' => 'S'],
			['description' => 'XXL'],
    	);

    	$this->loadData('sizes', $data, 'App\Size');
    }
}
