<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TwitterController extends Controller
{
    public function Twitter()
    {
        $mst_works_datas = DB::table('mst_works')
        ->select('id','title as works_title','actress as works_actress', 'url as works_url');

        $list = 
        DB::table('tweet_results')
        ->leftjoin('search_words', 'search_words.id', '=', 'tweet_results.search_word_id')
        ->joinSub($mst_works_datas, 'mst_works_datas',function($join){
            $join->on('mst_works_datas.id', '=', 'tweet_results.works_id');
        })
        ->get();
        return view('Twitter',['list' => $list]);
    }
}
