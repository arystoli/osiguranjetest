<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterniNacinPlacanja extends Model
{
    protected $table = 'interninacinplacanja';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'naziv',        
    ];

    protected $guarded = [];

        
}
