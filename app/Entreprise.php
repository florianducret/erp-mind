<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $table = 'entreprise';
    protected $fillable = [ 'nom', 'adresse', 'mail', 'telephone' ];
}
