<?php

class HonorificsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'Sr.'],
			['description' => 'Sra.'],
			['description' => 'Mr'],
			['description' => 'Ms'],
        );

        $this->loadData('honorifics', $data, 'App\Honorific');
    }
}
