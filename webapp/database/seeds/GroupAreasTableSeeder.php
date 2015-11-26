<?php

class GroupAreasTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$groupAreas = array(
			['description' => 'COMPRAS'],
			['description' => 'GERENCIA'],
			['description' => 'MERCADEO'],
			['description' => 'COMERCIAL'],
			['description' => 'I&D'],
			['description' => 'LOGISTICA'],
			['description' => 'CALIDAD'],
		);

		$this->loadData('group_areas', $groupAreas, 'App\GroupArea');
    }
}
