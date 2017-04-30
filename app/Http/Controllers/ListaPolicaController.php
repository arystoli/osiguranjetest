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
        
        $policas = DB::table('policas')->paginate(15);

        return view('polica.listaPolica', ['policas' => $policas]);
    }
}