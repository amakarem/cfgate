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
        $headers = [];
        $data = DB::table('trades')->join('indices', 'id', '=', 'trades.code')->where('owner', $userID)->orderBy('code')->get();
        $data = json_decode(json_encode($data), true);
        if (!empty($data)) {
            $headers = array_keys($data[array_key_first($data)]);
        }
        $var['headers'] = $headers;
        $var['data'] = $data;
        $var['title'] = 'Dashboard';
        return view('home', $var);
    }
}
