<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consolidated_code', 20);
            $table->string('ten_digits_code', 10);
            $table->string('sap_code', 30);
            $table->string('honorific', 5);
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('email');
            $table->string('skype', 50);
            $table->string('linkedin_profile');
            $table->string('career', 50);
            $table->string('company', 50);
            $table->string('position', 50);
            $table->string('phone', 50);
            $table->string('street', 100);
            $table->string('city', 50);
            $table->string('postal_code', 10);
            $table->string('language');
            $table->string('business_origin', 50);
            $table->boolean('action');
            $table->boolean('christmasCards');
            $table->boolean('christmasPresents');
            $table->boolean('newsletter');
            $table->boolean('bulletinFNC');
            $table->integer('customer_since')->unsigned()->nullable();
            $table->integer('id_market')->unsigned()->nullable();
            $table->integer('id_country')->unsigned()->nullable();
            $table->integer('id_region')->unsigned()->nullable();
            $table->integer('id_contact_type')->unsigned()->nullable();
            $table->integer('id_group_area')->unsigned()->nullable();
            $table->integer('id_segmentation_abc')->unsigned()->nullable();
            $table->integer('id_segmentation_client_type')->unsigned()->nullable();
            $table->integer('id_segmentation_product_type')->unsigned()->nullable();
            $table->integer('id_segmentation_FNC_relation')->unsigned()->nullable();
            $table->integer('id_segmentation_potential')->unsigned()->nullable();
            $table->integer('id_education_level')->unsigned()->nullable();
            $table->integer('id_size')->unsigned()->nullable();
            $table->integer('id_gender')->unsigned()->nullable();
            $table->integer('id_age_range')->unsigned()->nullable();
            $table->integer('id_creator')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('contacts');
    }
}
