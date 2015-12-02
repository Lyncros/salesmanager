<?php

use Illuminate\Database\Seeder;

class GroupAreaInterestProfileTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // GERENCIA - El Visionario
    	$dataGerencia = array(
    		['id_group_area' => 2, 'id_profile' => 2, 'id_interest' => 1], // Informes del gerente
    		['id_group_area' => 2, 'id_profile' => 2, 'id_interest' => 2], // Evolucion del mercado del cafe
    		['id_group_area' => 2, 'id_profile' => 2, 'id_interest' => 3], // Innovacion
    		['id_group_area' => 2, 'id_profile' => 2, 'id_interest' => 4], // Tendencias y Oportunidades
		);

        // COMPRAS - El Armadillo
        $dataCompras = array(
        	['id_group_area' => 1, 'id_profile' => 1, 'id_interest' => 2], // Evolucion del mercado del cafe
        	['id_group_area' => 1, 'id_profile' => 1, 'id_interest' => 3], // Innovacion
        	['id_group_area' => 1, 'id_profile' => 1, 'id_interest' => 4], // Tendencias y Oportunidades
        );

        // COMERCIAL - El Armadillo
        $dataComercial = array(
        	['id_group_area' => 4, 'id_profile' => 1, 'id_interest' => 5], // Argumentos de venta
        	['id_group_area' => 4, 'id_profile' => 1, 'id_interest' => 3], // Innovacion
        	['id_group_area' => 4, 'id_profile' => 1, 'id_interest' => 4], // Tendencias y Oportunidades
        );

        // MERCADEO - El Visionario
    	$dataMercadeo = array(
    		['id_group_area' => 3, 'id_profile' => 2, 'id_interest' => 3], // Innovacion
    		['id_group_area' => 3, 'id_profile' => 2, 'id_interest' => 4], // Tendencias y Oportunidades
    		['id_group_area' => 3, 'id_profile' => 2, 'id_interest' => 5], // Argumentos de venta
    		['id_group_area' => 3, 'id_profile' => 2, 'id_interest' => 6], // Productos
    		['id_group_area' => 3, 'id_profile' => 2, 'id_interest' => 7], // Recetas
    		['id_group_area' => 3, 'id_profile' => 2, 'id_interest' => 8], // Empaques
		);

		// LOGISTICA - El Visionario
    	$dataLogistica = array(
    		['id_group_area' => 6, 'id_profile' => 2, 'id_interest' => 8], // Empaques
    		['id_group_area' => 6, 'id_profile' => 2, 'id_interest' => 9], // Almacenamiento
		);

		// I&D - El Armadillo
        $dataID = array(
        	['id_group_area' => 5, 'id_profile' => 3, 'id_interest' => 3], // Innovacion
        	['id_group_area' => 5, 'id_profile' => 3, 'id_interest' => 4], // Tendencias y Oportunidades
        );

        // CALIDAD - El Armadillo
        $dataCalidad = array(
        	['id_group_area' => 7, 'id_profile' => 4, 'id_interest' => 3], // Innovacion
        	['id_group_area' => 7, 'id_profile' => 4, 'id_interest' => 9], // Almacenamiento
        );

        $data = array_merge($dataGerencia, $dataCompras, $dataComercial, 
        	$dataMercadeo, $dataLogistica, $dataID, $dataCalidad);

        $tablename = 'group_area_interest_profile';

        DB::table($tablename)->truncate();

        foreach ($data as $row) {
        	 DB::table($tablename)->insert($row);
        }
        
    }
}
