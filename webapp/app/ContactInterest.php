<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInterest extends Model {
    
    public $timestamps = false;
    public $table = 'contact_interest';

    public function interest() {
    	return $this->hasOne('App\Interest', 'id', 'id_interest');
    }
}
