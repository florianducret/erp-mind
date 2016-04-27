<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signataire extends Model
{
	protected $table = 'signataire';
    protected $fillable = ['nom', 'prenom', 'status', 'mail', 'telephone'];
}
