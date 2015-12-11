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
			['description' => 'S'],
            ['description' => 'M'],
            ['description' => 'L'],
            ['description' => 'XL'],
			['description' => 'XXL'],
    	);

    	$this->loadData('sizes', $data, 'App\Size');
    }
}
