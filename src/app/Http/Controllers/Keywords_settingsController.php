<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Keywords_settingsController extends Controller
{
    public function keywords_settings()
    {
        $works = DB::table('mst_works')->get();
        $list = DB::table('search_words')
        ->paginate(100);;

        return view('keywords_settings',['list' => $list,'works' => $works]);
    }

    public function insert_keyword(Request $request)
    {
        $param = [
            'target_type' => $request->target_type,
            'works_id' => $request->works_id,
            'keyword' => $request->keyword,
            'created' => now(),
            'updated' => now(),
            'searched' => now(),
        ];
        $insert = DB::table('search_words')->insert($param);
        return redirect('/keywords_settings');
    }
}
