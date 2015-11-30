<?php 

use Illuminate\Database\Seeder;

class ContactTypesTableSeeder extends BaseTableSeeder {

	public function run() {
        $contactTypes = array(
			['description' => 'Solicitante'],
			['description' => 'Cliente Indirecto'],
			['description' => 'Cliente Potencial']
        );

		$this->loadData('contact_types', $contactTypes, 'App\ContactType');
	}

}