<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Keywords_settingsController extends Controller
{
    public function keywords_settings()
    {
        $list = DB::table('search_words')
        ->get();

        return view('keywords_settings',['list' => $list]);
    }
}
