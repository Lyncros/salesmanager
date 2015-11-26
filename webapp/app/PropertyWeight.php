<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyWeight extends Model {
    
    public $timestamps = false;

    protected $casts = [
        'weight' => 'float',
    ];

}
