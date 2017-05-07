<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\TransakcijaBlagajna;

class BlagajnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blagajna.index');
    }

    public function showList()
    {
        $blagajnas = DB::table('blagajnas')->paginate(15);
        return view('blagajna.showList', ['blagajnas' => $blagajnas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Iskorisiti za otvaranje view-a za kreiranje nove transakcij
        $user = Auth::user();
        return view('blagajna.form', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $trblagajna = new TransakcijaBlagajna;
        $trblagajna->osiguranje = $request->osiguranje;
        $trblagajna->operater = $user->id;
        $trblagajna->iznos_naplacen = $request->iznos_naplacen;
        $trblagajna->iznos_polica = $request->iznos_polica;
        $trblagajna->nacin_placanja = $request->nacin_placanja;

        $trblagajna->save();

        return view('blagajna.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
