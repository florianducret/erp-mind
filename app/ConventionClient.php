<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConventionClient extends Model
{
    protected $table = 'convention_client';
    protected $fillable = [
    	'reference', 'realisation',
        'montant_sans_frais_ht',
        'montant_avec_frais_ht',
        'pourcentage_accompte', 'jeh'
    ];
}
