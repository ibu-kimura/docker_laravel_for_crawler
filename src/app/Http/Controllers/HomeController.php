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
    public function index(Request $request)
    {
        $list = 
        DB::table('web_results')
        ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
        ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
        ->select('web_results.*','search_words.keyword','target_services.site_name')
        ->orderby('created','desc')
        ->paginate(100);
        $target_list=
        DB::table('target_services')
        ->orderby('site_name','asc')
        ->get();


        //sort
        if(isset($request->sort)){
            $list = 
            DB::table('web_results')
            ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
            ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
            ->select('web_results.*','search_words.keyword','target_services.site_name')
            ->orderby($request->sort,$request->direction)
            ->paginate(100);
        }

        //search
        if(isset($request->target_id)){
            $list = 
            DB::table('web_results')
            ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
            ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
            ->select('web_results.*','search_words.keyword','target_services.site_name')
            ->where('target_id',$request->target_id)
            ->orderby('created','desc')
            ->paginate(100);
        }
        if(isset($request->search_keyword)){
            $list = 
            DB::table('web_results')
            ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
            ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
            ->select('web_results.*','search_words.keyword','target_services.site_name')
            ->where('site_name','like',"%".$request->search_keyword."%")
            ->orderby('created','desc')
            ->paginate(100);
        }
        if(isset($request->status)){
            $list = 
            DB::table('web_results')
            ->leftjoin('search_words', 'search_words.id', '=', 'web_results.search_word_id')
            ->leftjoin('target_services', 'target_services.id', '=', 'web_results.target_id')
            ->select('web_results.*','search_words.keyword','target_services.site_name')
            ->where('status',$request->status)
            ->orderby('created','desc')
            ->paginate(100);
        }

        return view('home',['list' => $list,'target_list' => $target_list]);
    }
}
