<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PublicController extends Controller
{
    public function index()
    {
        return $this->viewpage('home-page','pages');
    }
    public function page($slag)
    {
        return $this->viewpage($slag,'pages');
    }
    public function post($slag)
    {
        return $this->viewpage($slag,'posts');
    }
    public function viewpage($slag, $type)
    {
        $data = DB::table($type)->where('slug', $slag)->get();
        $var = array();
        foreach ($data as $value) {
            $var['title'] = $value->title;
            $var['excerpt'] = $value->excerpt;
            $var['body'] = $value->body;
            $var['meta_description'] = $value->meta_description;
            $var['meta_keywords'] = $value->meta_keywords;
        }
        if (empty($var)) {
            $var['title'] = '404 Not Found';
            $var['excerpt'] = '';
            $var['body'] = '';
            $var['meta_description'] = '';
            $var['meta_keywords'] = '';
        }
        return view('welcome', $var);
    }
}
