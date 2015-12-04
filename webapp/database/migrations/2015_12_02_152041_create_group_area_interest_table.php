<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupAreaInterestTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('group_area_interest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_group_area')->unsigned()->index();
            $table->integer('id_interest')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('group_area_interest');
    }
}
