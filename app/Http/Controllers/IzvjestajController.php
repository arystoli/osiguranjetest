<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;


class IzvjestajController extends Controller
{
    public function promet(Request $request)
    {

        /// Handle various list based on form
        if($request->input('hidden_source')=='datum')
        {
        	$testDate = $request->input('datum') . " 00:00:00";
            $policas = DB::table('policas')->whereDate('created_at', '=', $testDate)->orderBy('id', 'desc')->paginate(15);
        }
        else{        
        $policas = DB::table('policas')->paginate(15);        
        }
        
        return view('izvjestaji.promet', ['policas' => $policas, 'datumstr' => $testDate]);
    }

    public function store(Request $request)
    {

        /// Handle various list based on form
        if($request->input('hidden_source')=='operater')
        {
            $policas = DB::table('policas')->where('operater', '=', $request->input('operater'))->orderBy('id', 'desc')->paginate(15);

        }
        else{
        
        $policas = DB::table('policas')->paginate(15);

        return view('polica.listaPolica', ['policas' => $policas]);
        }
    }
}
