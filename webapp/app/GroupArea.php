<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupArea extends Model {

	public function profile() {
		return $this->hasOne('App\Profile', 'id', 'id_profile');
	}

}
