<?php

class LanguagesTableSeeder extends BaseTableSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'Japones'],
			['description' => 'Inglés'],
			['description' => 'Mandarin'],
			['description' => 'Español'],
    	);

    	$this->loadData('languages', $data, 'App\Language');
    }
}
