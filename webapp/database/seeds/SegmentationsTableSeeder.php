<?php

class SegmentationsTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
			['description' => 'A'],
			['description' => 'B'],
			['description' => 'C'],
			['description' => 'No aplica'],
        );
    	$this->loadData('segmentation_ABC', $data, 'App\SegmentationABC');

        $data = array(
			['description' => 'Marcas Terceros'],
			['description' => 'Traders'],
			['description' => 'Marcas FNC'],
			['description' => 'Productores Soluble'],
			['description' => 'Tostadores'],
			['description' => 'Industrial'],
			['description' => 'Marcas Propias'],
			['description' => 'Empacadores'],
			['description' => 'Vending'],
			['description' => 'Maquila'],
        );

		$this->loadData('segmentation_client_types', $data, 'App\SegmentationClientType');

		$data = array(
			['description' => 'Granel'],
			['description' => 'Empacado'],
		);

		$this->loadData('segmentation_product_types', $data, 'App\SegmentationProductType');

		$data = array(
			['description' => 'Ninguna'],
			['description' => 'Muy Poca'],
			['description' => 'Media'],
			['description' => 'Alta'],
			['description' => 'Muy Alta'],
		);

		$this->loadData('segmentation_FNC_relations', $data, 'App\SegmentationFNCRelation');

		$data = array(
			['description' => 'Ninguno'],
			['description' => 'Muy Poco'],
			['description' => 'Medio'],
			['description' => 'Alto'],
			['description' => 'Muy Alto'],
		);

		$this->loadData('segmentation_potentials', $data, 'App\SegmentationPotential');

    }
}
