<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 */
class Blagajna extends Model
{
    protected $table = 'Blagajnas';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'iznosUplacen',
        'iznosPolica',
        'nacinPlacanja'
    ];

    protected $guarded = [];

        
}