<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvenantRuptureRm extends Model
{
    protected $table = 'avenant_rupture_rm';
    protected $fillable = [
    	'reference', 'motif',
        'montant_accorde_ht', 'date'
    ];
}
