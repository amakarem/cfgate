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
        $data = DB::table('trades')
            ->join('indices', 'indices.id', '=', 'trades.code')
            ->join('categories', 'categories.id', '=', 'indices.category_id')
            ->where('owner', $userID)
            ->groupBy('categories.name', 'indices.id', 'indices.name')
            ->sum('trades.qty', 'trades.value', 'trades.income')
            ->orderBy('category', 'name')
            ->get(['categories.name AS category', 'indices.id as index_id', 'indices.name', 'trades.qty', 'trades.value', 'trades.income']);
        $data = json_decode(json_encode($data), true);
        if (!empty($data)) {
            $headers = array_keys($data[array_key_first($data)]);
        }
        $var['headers'] = $headers;
        $var['data'] = $data;
        $var['title'] = 'Portofolio';
        return view('home', $var);
    }
    public function trades()
    {
        $userID = Auth::user()->id;
        $headers = [];
        $data = DB::table('trades')
            ->join('indices', 'indices.id', '=', 'trades.code')
            ->join('categories', 'categories.id', '=', 'indices.category_id')
            ->where('owner', $userID)
            ->orderBy('code')
            ->get(['categories.name AS category', 'indices.id as index_id', 'indices.name','trades.id','trades.qty','trades.value','trades.income','trades.status', 'trades.Updated_at as date']);
        $data = json_decode(json_encode($data), true);
        if (!empty($data)) {
            $headers = array_keys($data[array_key_first($data)]);
        }
        $var['headers'] = $headers;
        $var['data'] = $data;
        $var['title'] = 'Orders';
        return view('home', $var);
    }
}
