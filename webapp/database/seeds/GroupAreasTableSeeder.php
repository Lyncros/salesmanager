<?php

class GroupAreasTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$groupAreas = array(
			['description' => 'Compras', 'id_profile' => 1],
			['description' => 'Gerencia', 'id_profile' => 2],
			['description' => 'Mercadeo', 'id_profile' => 2],
			['description' => 'Comercial', 'id_profile' => 1],
			['description' => 'I&D', 'id_profile' => 3],
			['description' => 'Logística', 'id_profile' => 2],
			['description' => 'Calidad', 'id_profile' => 4],
		);

		$this->loadData('group_areas', $groupAreas, 'App\GroupArea');
    }
}
