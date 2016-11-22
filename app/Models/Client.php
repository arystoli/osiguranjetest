<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 */
class Client extends Model
{
    protected $table = 'clients';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'surname',
        'certificate',
        'last_login'
    ];

    protected $guarded = [];

        
}