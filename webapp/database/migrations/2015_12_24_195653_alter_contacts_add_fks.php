<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContactsAddFks extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('contacts', function(Blueprint $table) {
            $table->foreign('id_country')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('id_contact_type')->references('id')->on('contact_types')->onDelete('cascade');
            $table->foreign('id_group_area')->references('id')->on('group_areas')->onDelete('cascade');
            $table->foreign('id_segmentation_ABC')->references('id')->on('segmentation_ABC')->onDelete('cascade');
            $table->foreign('id_segmentation_client_type')->references('id')->on('segmentation_client_types')->onDelete('cascade');
            $table->foreign('id_segmentation_FNC_relation')->references('id')->on('segmentation_FNC_relations')->onDelete('cascade');
            $table->foreign('id_segmentation_potential')->references('id')->on('segmentation_potentials')->onDelete('cascade');
            $table->foreign('id_segmentation_product_type')->references('id')->on('segmentation_product_types')->onDelete('cascade');
            $table->foreign('id_education_level')->references('id')->on('education_levels')->onDelete('cascade');
            $table->foreign('id_gender')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('id_size')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('id_age_range')->references('id')->on('age_ranges')->onDelete('cascade');
            //$table->foreign('id_')->references('id')->on('s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('contacts', function(Blueprint $table) {
            $table->dropForeign('contacts_id_group_area_foreign');
            $table->dropForeign('contacts_id_contact_type_foreign');
            $table->dropForeign('contacts_id_country_foreign');
            $table->dropForeign('contacts_id_segmentation_abc_foreign');
            $table->dropForeign('contacts_id_segmentation_client_type_foreign');
            $table->dropForeign('contacts_id_segmentation_fnc_relation_foreign');
            $table->dropForeign('contacts_id_segmentation_potential_foreign');
            $table->dropForeign('contacts_id_segmentation_product_type_foreign');
            $table->dropForeign('contacts_id_education_level_foreign');
            $table->dropForeign('contacts_id_gender_foreign');
            $table->dropForeign('contacts_id_size_foreign');
            $table->dropForeign('contacts_id_age_range_foreign');
            //$table->dropForeign('contacts_id__level_foreign');
        });
    }
}
