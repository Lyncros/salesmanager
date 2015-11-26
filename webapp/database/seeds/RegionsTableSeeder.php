<?php

class RegionsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $regions = array(
			['name' => 'A'],
			['name' => 'b'],
			['name' => 'C'],
			['name' => 'D'],
			['name' => 'E'],
			['name' => 'Otro'],
        );

        $this->loadData('regions', $regions, 'App\Region');
    }
}
