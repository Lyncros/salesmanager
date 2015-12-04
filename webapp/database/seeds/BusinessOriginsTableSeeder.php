<?php

class BusinessOriginsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'Feria'],
			['description' => 'Contacto FNC'],
			['description' => 'Visita '],
			['description' => 'Pagina Web'],
			['description' => 'Investigacion de mercado'],
			['description' => 'Por referencia de otro cliente'],
    	);

    	$this->loadData('business_origins', $data, 'App\BusinessOrigin');
    }
}
