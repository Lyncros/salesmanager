<?php 

use Illuminate\Database\Seeder;

class ContactTypesTableSeeder extends BaseTableSeeder {

	public function run() {
        $contactTypes = array(
			['description' => 'Solicitante', 'completeness_measure' => true],
			['description' => 'Cliente Indirecto', 'completeness_measure' => true],
			['description' => 'Cliente Potencial', 'completeness_measure' => true],
			['description' => 'Empleado', 'completeness_measure' => false],
			['description' => 'Contacto FNC', 'completeness_measure' => false],
			['description' => 'Otro', 'completeness_measure' => false],
        );

		$this->loadData('contact_types', $contactTypes, 'App\ContactType');
	}

}