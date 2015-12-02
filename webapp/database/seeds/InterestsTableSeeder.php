<?php

use Illuminate\Database\Seeder;

class InterestsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'Informes del Gerente'],
			['description' => 'Evolucion del mercado del café'],
			['description' => 'Innovacion'],
			['description' => 'Tendencias y Oportunidades'],
			['description' => 'Argumentos de Venta'],
			['description' => 'Productos'],
			['description' => 'Recetas'],
			['description' => 'Empaque'],
			['description' => 'Almacenamiento'],
    	);

    	$this->loadData('interests', $data, 'App\Interest');
    }
}
