<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhaseRuptureAvenant extends Model
{
	protected $table = 'phase_rupture_avenant';
    protected $fillable = ['reference', 'numero', 'nom', 'jeh_phase'];
}
