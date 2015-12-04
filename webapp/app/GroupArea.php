<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupArea extends Model {

	public function profile() {
		return $this->hasOne('App\Profile', 'id', 'id_profile');
	}

	public function interests() {
		return $this->belongsToMany('App\Interest', 'group_area_interest', 'id_group_area', 'id_interest');
	}

}
