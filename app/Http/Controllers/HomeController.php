<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Status;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::whereNull('parent_id')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('home', ['statuses' => $statuses]);
    }
    
    public function sendNotification()
    {
        $user1 = User::where('name', '=', 'Paul Bâcle')->first()->id;
        $user2 = User::where('name', '=', 'Paul Bâcle')->first()->id;
       
        \Notifynder::category('user.welcome')
            ->from($user1)
            ->to($user2)
            ->url('/')
            ->send();
        
        return redirect('/');
    }
}
