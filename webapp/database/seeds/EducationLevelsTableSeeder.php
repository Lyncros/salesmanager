<?php

use Illuminate\Database\Seeder;

class EducationLevelsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'Tecnico'],
			['description' => 'Profesional'],
			['description' => 'Especialista'],
			['description' => 'Master'],
			['description' => 'Doctor'],
        );

        $this->loadData('education_levels', $data, 'App\EducationLevel');
    }
}
