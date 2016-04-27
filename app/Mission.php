<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'mission';
    protected $fillable = [      
        'montant_ht', 'montant_etudiant_ht',
        'sujet', 'description',
        'debut','fin',
	];
}
