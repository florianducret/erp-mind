<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvenantCc extends Model
{
    protected $table = 'avenant_cc';
    protected $fillable = ['reference', 'date', 'motif'];

}
