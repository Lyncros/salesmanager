<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model {

	protected $casts = [
        'completeness_measure' => 'boolean',
    ];

}
