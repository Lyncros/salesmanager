<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Find and run all seeders
        $classes = require base_path().'/vendor/composer/autoload_classmap.php';
        foreach ($classes as $class) {
            if (strpos($class, 'TableSeeder') !== false) {
                $seederClass = substr(last(explode('/', $class)), 0, -4);
                $this->call($seederClass);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
