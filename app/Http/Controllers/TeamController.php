<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Team;
use App\User;

class TeamController extends Controller
{
    function inscriptionGet()
    {
        return view('pole.inscription');
    }
    
    function inscriptionPost(Request $req)
    {
        $pole = $req->input('radio');
        $user = \Auth::user()->firstname;
        $commentaire = $req->input('commentaire');
        
        
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.welcome', 
                          [
                              'nom' => $user, 
                              'pole' => $pole,
                              'commentaire' => $commentaire,
                          ],
        function($m) use ($user, $pole)
        {
           $m
                ->from('pist.mind@gmail.com', $user)
                ->to('pist.mind@gmail.com', $pole)
                ->subject("$user souhaite s'inscrire au pôle $pole");
        });
        
        \Auth::user()->switchTeam(null);
        \Auth::user()->attachTeam(Team::where('name', '=', $pole)->first());
            
        return redirect('/');
    }
}
