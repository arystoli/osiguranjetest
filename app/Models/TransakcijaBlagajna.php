<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 */
class TransakcijaBlagajna extends Model
{
    protected $table = 'transakcijablagajna';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'iznos_naplacen',
        'iznos_polica',
        'operater'
        'osiguranje'
        'nacin_placanja'
    ];

    protected $guarded = [];

        
}