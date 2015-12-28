<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $hidden = [
		'id_contact_type', 'id_group_area', 'id_country', 'id_region', 
		'id_gender', 'id_education_level', 'id_age_range', 'id_size', 
		'id_market', 'id_honorific', 'id_language', 'id_profile', 
		'id_business_origin', 'id_customer_since', 
		'id_segmentation_ABC', 'id_segmentation_client_type', 
		'id_segmentation_product_type', 'id_segmentation_potential', 
		'id_segmentation_FNC_relation',
	];

	protected $appends = [
		'segmentation_ABC',
		'segmentation_FNC_relation'
	];

	protected $casts = [
        'action' => 'boolean',
        'christmas_cards' => 'boolean',
        'christmas_presents' => 'boolean',
        'newsletter' => 'boolean',
        'bulletinFNC' => 'boolean',
    ];

    protected $fillable = [
		'id', 'consolidated_code','ten_digits_code','sap_code','firstname','lastname','email',
		'skype','linkedin_profile','position','company_area','company_name','career','phone',
		'street','city','postal_code','region',
		'action','christmas_cards','christmas_presents','newsletter','bulletinFNC',
		'id_honorific','id_market','id_country','id_contact_type','id_group_area','id_profile',
		'id_segmentation_ABC','id_segmentation_client_type','id_segmentation_product_type',
		'id_segmentation_FNC_relation','id_segmentation_potential',
		'id_education_level','id_size','id_gender','id_age_range','id_business_origin',
		'id_language','id_customer_since',
    ];

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

	public function contact_type() {
		return $this->hasOne('App\ContactType', 'id', 'id_contact_type');
	}

	public function group_area() {
		return $this->hasOne('App\GroupArea', 'id', 'id_group_area');
	}

	public function market() {
		return $this->hasOne('App\Market', 'id', 'id_market');
	}

	public function profile() {
		return $this->hasOne('App\Profile', 'id', 'id_profile');
	}

	public function segmentation_ABC() {
		return $this->hasOne('App\SegmentationABC', 'id', 'id_segmentation_ABC');
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

	public function interests() {
		return $this->hasMany('App\ContactInterest', 'id_contact');
	}

	public function honorific() {
		return $this->hasOne('App\Honorific', 'id', 'id_honorific');
	}

	public function language() {
		return $this->hasOne('App\Language', 'id', 'id_language');
	}

	public function customer_since() {
		return $this->hasOne('App\CustomerSince', 'id', 'id_customer_since');
	}

	public function business_origin() {
		return $this->hasOne('App\BusinessOrigin', 'id', 'id_business_origin');
	}

	public function responsibles() {
		return $this->belongsToMany('App\User', 'contact_user', 'id_contact', 'id_user');
	}

	public function scopeFull($query) {
		$with = array(
            'responsibles', 'country', 'contact_type', 'group_area', 'market', 'gender', 'interests.interest', 'profile',
            'education_level', 'age_range', 'size', 'language', 'customer_since', 'honorific', 'business_origin',
            'segmentation_ABC', 'segmentation_client_type', 'segmentation_FNC_relation', 
            'segmentation_potential', 'segmentation_product_type'
        );
		return $query->with($with);
	}

	public function scopeHasResponsible($query, $id_responsible) {
		if ($id_responsible) {
			return $query->whereHas('responsibles', function($query) use($id_responsible) {
	            $query->where('id_user', $id_responsible);
	        });
		} else {
			return $query;
		}
	}

}
