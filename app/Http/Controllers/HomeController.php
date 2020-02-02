<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    
    public function verify($token = null){
        if ($token === null) {
            return redirect()->route('login');
        }

        $user = User::where('remember_token',$token)->first();

        if ($user === null) {
            return redirect()->route('login');
        }
        $user->update([
            'email_verified_at' => now(),
            'remember_token' => null,
        ]);
        return redirect()->route('home');
    }
}
