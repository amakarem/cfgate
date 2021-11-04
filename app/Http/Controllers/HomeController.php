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
        $data = DB::table('trades')->where('owner', $userID)->orderBy('code')->get();
        foreach ($data as $row) {
            $row = $row->toArray();
                    print_r($row);
        die();
            $headers = array_keys($row);
            break;
        }
        $var['headers'] = $headers;
        $var['data'] = $data;
        $var['title'] = 'Dashboard';
        return view('home', $var);
    }
}
