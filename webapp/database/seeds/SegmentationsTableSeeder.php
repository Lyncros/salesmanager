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
			['description' => 'MARCAS TERCEROS'],
			['description' => 'TRADERS'],
			['description' => 'MARCAS FNC'],
			['description' => 'PRODUCTORES SOLUBLE'],
			['description' => 'TOSTADORES'],
			['description' => 'INDUSTRIAL'],
			['description' => 'MARCAS PROPIAS'],
			['description' => 'EMPACADORES'],
			['description' => 'VENDING'],
			['description' => 'MAQUILA'],
        );

		$this->loadData('segmentation_client_types', $data, 'App\SegmentationClientType');

		$data = array(
			['description' => 'GRANEL'],
			['description' => 'EMPACADO'],
		);

		$this->loadData('segmentation_product_types', $data, 'App\SegmentationProductType');

		$data = array(
			['description' => 'NINGUNA'],
			['description' => 'MUY POCA'],
			['description' => 'MEDIA'],
			['description' => 'ALTA'],
			['description' => 'MUY ALTA'],
		);

		$this->loadData('segmentation_FNC_relations', $data, 'App\SegmentationFNCRelation');

		$data = array(
			['description' => 'MUY POCO'],
			['description' => 'ALTO'],
			['description' => 'MEDIO'],
			['description' => 'MUY ALTO'],
			['description' => 'NINGUNO'],
		);

		$this->loadData('segmentation_potentials', $data, 'App\SegmentationPotential');

    }
}
