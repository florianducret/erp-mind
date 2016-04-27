<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvenantRm extends Model
{
    protected $table = 'avenant_rm';
    protected $fillable = ['reference', 'date', 'motif', 'date_echeance', 'montant_ht', 'jeh'];
}
