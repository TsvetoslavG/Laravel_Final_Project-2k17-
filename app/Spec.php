<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $fillable = [
		'spec_name', 'spec_desc', 'spec_positions', 'positions_left'
	];
}
