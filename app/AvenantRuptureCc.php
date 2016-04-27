<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvenantRuptureCc extends Model
{
    protected $table = 'avenant_rupture_cc';
    protected $fillable = [
    	'reference', 'date', 'motif',
        'montant_sans_frais_ht', 'montant_frais_ht',
    ];
}
