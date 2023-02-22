<?php

namespace App\Http\Controllers;

use Auth;
use App\Odi;
use App\User;
use \Notification;

use App\ListadoRed;
use App\NuevasAltas;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Notifications\EmailNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function send()
    {

        $user = Auth::user();

        $project = [
            'greeting' => 'Hola ' . Auth::user()->name . ',',
            'body' => 'Hay una nueva alta en el sistema',
            'thanks' => 'Gracias por su colaboracion',
            'actionText' => 'Ir al sistema',
            'actionURL' => url('/'),
            'id' => 57
        ];

        $user->notify( new EmailNotification($project));

        dd('Notification sent!');
    }
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




        $nuevasaltas = NuevasAltas::All();
        return view('home',compact('nuevasaltas'));
    }
}
