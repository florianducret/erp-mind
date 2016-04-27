<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesVerbal extends Model
{
    protected $table = 'proces_verbal';
    protected $fillable = ['reference', 'duree_garantie', 'date'];
}
