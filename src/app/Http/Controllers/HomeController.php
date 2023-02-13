<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $list = 
        DB::table('web_results')
        ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
        ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
        ->select('web_results.*','search_words.keyword','target_services.site_name')
        ->get();
        return view('home',['list' => $list]);
    }

    public function keywords_settings()
    {
        return view('keywords_settings');
    }

    public function search()
    {
        return view('search');
    }
}
