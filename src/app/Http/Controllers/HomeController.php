<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebResults;
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
        ->orderby('created','desc')
        ->paginate(100);

        if(isset($_GET['sort'])){
            $list = 
            DB::table('web_results')
            ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
            ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
            ->select('web_results.*','search_words.keyword','target_services.site_name')
            ->orderby($_GET['sort'],$_GET['direction'])
            ->paginate(100);
        }
        $target_list=
        DB::table('target_services')
        ->get();
        return view('home',['list' => $list,'target_list' => $target_list]);
    }
}
