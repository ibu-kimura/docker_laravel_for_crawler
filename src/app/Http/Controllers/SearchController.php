<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function search()
    {
        $param = [
            'start_date' => 0,
            'end_date' => 0,
            'search_cnt' => 0,
            'auto_alerted' => 0,
            'deleted' => 0,
            'manual_alerted' => 0,
        ];
        return view('search',['param'=>$param]);
    }

    public function calc_datas(Request $request)
    {
        $search_cnt = DB::table('web_results')
        ->get()
        ->where('created','=>',"2023-02-01 00:00:00")
        ->where('created','=<',"2023-02-15 00:00:00");
        $auto_alerted = $search_cnt
        ->where('status','警告')
        ->where('status','自動警告');
        $deleted = $search_cnt
        ->where('status','削除済み');
        $manual_alerted = $search_cnt
        ->where('status','手動警告');
        $param = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'search_cnt' => count($search_cnt),
            'auto_alerted' => count($auto_alerted),
            'deleted' => count($deleted),
            'manual_alerted' => count($manual_alerted),
            ];
        return view('search',['param'=>$param]);
    }
}
