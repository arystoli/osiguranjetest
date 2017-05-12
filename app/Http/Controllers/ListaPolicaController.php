<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class ListaPolicaController extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        /// Handle various list based on form
        if($request->input('hidden_source')=='operater')
        {
            $policas = DB::table('policas')->where('operater', '=', $request->input('operater'))->orderBy('id', 'desc')->paginate(15);
        }
        else{        
        $policas = DB::table('policas')->paginate(15);        
        }
        return view('polica.listaPolica', ['policas' => $policas]);
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