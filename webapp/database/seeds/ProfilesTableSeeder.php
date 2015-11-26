<?php

class ProfilesTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$profiles = array(
			['description' => 'El Armadillo'],
			['description' => 'El Visionario'],
			['description' => 'Wozniack'],
			['description' => 'El Notario'],
		);

        $this->loadData('profiles', $profiles, 'App\Profile');
    }
}
