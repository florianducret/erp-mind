<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    protected $table = 'versement';
    protected $fillable = ['reference', 'solde_intermediaire_ht', 'jeh_intermediaire'];
}
