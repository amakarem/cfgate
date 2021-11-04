<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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
        $userID = Auth::user()->id;
        $var = array(
            'data' => DB::table('trades')->whereRaw($whereraw)->where('owner', $userID)->orderBy('code')->get()->toArray();
        );
        return view('home', $var);
    }
}
