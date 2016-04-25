<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $table = 'todolist';
    protected $fillable = ['content', 'deadline']; 

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function getTempsRestant()
    {

    	$date = new Carbon($this->deadline);
    	Carbon::setlocale('fr');
    	return $date->diffForHumans();
    }
}
