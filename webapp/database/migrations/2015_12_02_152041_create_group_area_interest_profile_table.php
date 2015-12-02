<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupAreaInterestProfileTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('group_area_interest_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_group_area');
            $table->integer('id_interest');
            $table->integer('id_profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('group_area_interest_profile');
    }
}
