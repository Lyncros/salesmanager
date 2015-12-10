<?php

class UsersTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
        	['name' => 'admin', 'email' => 'admin@salesmanager.com', 'password' => Hash::make('secret'), 'role' => 1000],
        	['name' => 'sales', 'email' => 'sales@salesmanager.com', 'password' => Hash::make('secret'), 'role' => 100],
    	);

    	$this->loadData('users', $data, 'App\User');
    }
}
