<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $hidden = [
		'id_contact_type',
		'id_group_area',
		'id_country',
		'id_region',
		'id_gender',
		'id_education_level',
		'id_age_range',
		'id_size',
		'id_market',
		'id_segmentation_abc',
		'id_segmentation_client_type',
		'id_segmentation_product_type',
		'id_segmentation_potential',
		'id_segmentation_FNC_relation',
		'id_creator',
	];

	protected $appends = [
		'segmentation_ABC',
		'segmentation_FNC_relation'
	];

	protected $casts = [
        'action' => 'boolean',
        'christmasCards' => 'boolean',
        'christmasPresents' => 'boolean',
        'newsletter' => 'boolean',
        'bulletinFNC' => 'boolean',
    ];

    protected $guarded = ['id_creator'];

    public function getSegmentationABCAttribute() {
    	if (array_key_exists('segmentation_ABC', $this->relations)) {
	    	return $this->relations['segmentation_ABC'];
    	}
    }

    public function getSegmentationFNCRelationAttribute() {
    	if (array_key_exists('segmentation_FNC_relation', $this->relations)) {
    		return $this->relations['segmentation_FNC_relation'];
    	}
    }

	public function country() {
		return $this->hasOne('App\Country', 'id', 'id_country');
	}

	public function region() {
		return $this->hasOne('App\Region', 'id', 'id_region');
	}

	public function contact_type() {
		return $this->hasOne('App\ContactType', 'id', 'id_contact_type');
	}

	public function group_area() {
		return $this->hasOne('App\GroupArea', 'id', 'id_group_area');
	}

	public function market() {
		return $this->hasOne('App\Market', 'id', 'id_market');
	}

	public function segmentation_ABC() {
		return $this->hasOne('App\SegmentationABC', 'id', 'id_segmentation_abc');
	}

	public function segmentation_client_type() {
		return $this->hasOne('App\SegmentationClientType', 'id', 'id_segmentation_client_type');
	}

	public function segmentation_FNC_relation() {
		return $this->hasOne('App\SegmentationFNCRelation', 'id', 'id_segmentation_FNC_relation');
	}

	public function segmentation_potential() {
		return $this->hasOne('App\SegmentationPotential', 'id', 'id_segmentation_potential');
	}

	public function segmentation_product_type() {
		return $this->hasOne('App\SegmentationProductType', 'id', 'id_segmentation_product_type');
	}

	public function education_level() {
		return $this->hasOne('App\EducationLevel', 'id', 'id_education_level');
	}

	public function size() {
		return $this->hasOne('App\Size', 'id', 'id_size');
	}

	public function age_range() {
		return $this->hasOne('App\AgeRange', 'id', 'id_age_range');
	}

	public function gender() {
		return $this->hasOne('App\Gender', 'id', 'id_gender');
	}

}