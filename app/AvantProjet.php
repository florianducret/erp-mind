<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvantProjet extends Model
{
    protected $table = 'avant_projet';
    protected $fillable = ['reference'];
}
