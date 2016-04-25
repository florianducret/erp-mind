<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

use App\User;
use App\Team;
use App\Http\Requests;

class TableauDeBordController extends Controller
{
    public function getQualité()
    {
        return view('qualite.tableauDeBord');
    }
    
    public function postQualité(Request $req)
    {
        $pusher = \App::make('pusher');
        if($req->input('etat') == "approuver")   
        {   
            $pusher->trigger('document-channel',
                             'approuver-event', 
                             array(
                                   'text' => \Auth::user()->firstname.' a approuvé la génération suivante : '.$req->input('text'),
                                   'reference' => $req->input('reference')
                                  ));
            Storage::move('files/shares/temp_'.$req->input('reference').'.docx', 'files/shares/tresorerie/'.$req->input('reference').'.docx');
        }
        else
            $pusher->trigger( 'document-channel',
                              'refuser-event', 
                              array(
                                    'text' => \Auth::user()->firstname.' a refusé la génération suivante : '.$req->input('text'),
                                    'reference' => $req->input('reference')
                                   ));
        
    }
    
    public function getTrésorerie()
    {
        return view('tresorerie.tableauDeBord');
    }
}
