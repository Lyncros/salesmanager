<?php

class PropertyWeightTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
            ['name' => 'email', 'weight' => 15],
            ['name' => 'firstname', 'weight' => 8],
            ['name' => 'lastname', 'weight' => 8],
            ['name' => 'phone', 'weight' => 2],
            ['name' => 'skype', 'weight' => 5],
            ['name' => 'company_name', 'weight' => 5.5],
            ['name' => 'company_area', 'weight' => 5],
            ['name' => 'market', 'weight' => 5],
            ['name' => 'language', 'weight' => 5],
            ['name' => 'honorific', 'weight' => 0.4],
            ['name' => 'street', 'weight' => 0.4],
            ['name' => 'city', 'weight' => 0.4],
            ['name' => 'country', 'weight' => 0.4],
            ['name' => 'region', 'weight' => 0.4],
            ['name' => 'postal_code', 'weight' => 0.4],
            ['name' => 'sap_code', 'weight' => 1],
            ['name' => 'ten_digits_code', 'weight' => 0.4],
            ['name' => 'business_origin', 'weight' => 3.5],
            ['name' => 'contact_type', 'weight' => 3.4],
            ['name' => 'segmentation_client_type', 'weight' => 3.9],
            ['name' => 'segmentation_product_type', 'weight' => 2],
            ['name' => 'segmentation_FNC_relation', 'weight' => 1],
            ['name' => 'segmentation_potential', 'weight' => 1],
            ['name' => 'career', 'weight' => 2.8],
            ['name' => 'position', 'weight' => 10],
            ['name' => 'linkedin_profile', 'weight' => 5],
            ['name' => 'newsletter', 'weight' => 0.2],
            ['name' => 'bulletinFNC', 'weight' => 0.2],
            ['name' => 'size', 'weight' => 0.2],
            ['name' => 'age_range', 'weight' => 2.2]
        );

		$this->loadData('property_weights', $data, 'App\PropertyWeight');
    }
}
