<?php

use Illuminate\Database\Seeder;

class ContactInterestTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
        	['id_contact' => 1, 'id_interest' => 2, 'hits' => 4],
        	['id_contact' => 1, 'id_interest' => 3, 'hits' => 9],
        	['id_contact' => 1, 'id_interest' => 4, 'hits' => 2],
        	['id_contact' => 2, 'id_interest' => 2, 'hits' => 4],
        	['id_contact' => 2, 'id_interest' => 3, 'hits' => 9],
        	['id_contact' => 2, 'id_interest' => 4, 'hits' => 2],
        	['id_contact' => 3, 'id_interest' => 2, 'hits' => 4],
        	['id_contact' => 3, 'id_interest' => 3, 'hits' => 9],
        	['id_contact' => 3, 'id_interest' => 4, 'hits' => 2],
        	['id_contact' => 4, 'id_interest' => 2, 'hits' => 4],
        	['id_contact' => 4, 'id_interest' => 3, 'hits' => 9],
        	['id_contact' => 4, 'id_interest' => 4, 'hits' => 2],
        );

        $tablename = 'contact_interest';

        DB::table($tablename)->truncate();

        foreach ($data as $row) {
    	   //DB::table($tablename)->insert($row);
        }
    }
}
