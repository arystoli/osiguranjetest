<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'name',
    	'surname'
    	
    ];

    public $timestamps = false;

    protected $table = 'clients';
}
