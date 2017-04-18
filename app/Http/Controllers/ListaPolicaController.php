<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListaPolicaController extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index()
    {
        $policas = DB::table('policas')->paginate(15);

        return view('polica.listaPolica', ['policas' => $policas]);
    }
}