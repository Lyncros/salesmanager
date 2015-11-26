<?php

class GendersTableSeeder extends BaseTableSeeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'Masculino'],
			['description' => 'Femenino'],
    	);

    	$this->loadData('genders', $data, 'App\Gender');
    }
}
