<?php

class GroupAreasTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$groupAreas = array(
			['description' => 'COMPRAS', 'id_profile' => 1],
			['description' => 'GERENCIA', 'id_profile' => 2],
			['description' => 'MERCADEO', 'id_profile' => 2],
			['description' => 'COMERCIAL', 'id_profile' => 1],
			['description' => 'I&D', 'id_profile' => 3],
			['description' => 'LOGISTICA', 'id_profile' => 2],
			['description' => 'CALIDAD', 'id_profile' => 4],
		);

		$this->loadData('group_areas', $groupAreas, 'App\GroupArea');
    }
}
