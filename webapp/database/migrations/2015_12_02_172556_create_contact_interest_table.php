<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInterestTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contact_interest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_contact');
            $table->integer('id_interest');
            $table->integer('hits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('contact_interest');
    }
}
