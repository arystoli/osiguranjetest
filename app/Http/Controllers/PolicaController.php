<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\PolicaController;

use App\Models\Polica;

use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

use App\MyLib\EurohercAPI as EHAPI;

class PolicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('polica.basic');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
         
    }*/

    public function getPolicaKorakDrugi(Request $request)
    {
        return view('polica.korak1', ['polica' => $request->session()->get('polica')]);
        
    }

     public function getPolicaOnePage(Request $request)
    {
        return view('polica.onePage', ['polica' => $request->session()->get('polica')]);
        
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
        //return $request->ugovaratelj_id;
        //$polica = Polica::firstOrCreate(['osiguranikOib' => $request->input('osiguranikOib')]);
        
        $polica = Polica::firstOrCreate(['RegistarskaOznaka' => $request->input('RegistarskaOznaka')]);
        $data = $request->all();
        $polica->create($data);

        //var_dump($data);
        unset($data['_token']);
        unset($data['BrojRanijePolica']);
        $data['Ugovaratelj'] = (object) array();
        $data['Osiguranik'] = (object) array();
        $data['Proba'] = false;
        //var_dump($data);
        $post_data = $data;
        $post_data = json_encode($data);
        //var_dump($post_data);    
        $eh = new EHAPI();
        $policaData = $eh->postPolica($post_data);

        return view('polica.cijene', ['polica' => $policaData]);
        
        //echo json_encode($data); //RADI OVO
        //echo $polica->RegistarskaOznaka;
        //echo "Test";

        /*echo $polica->makeHidden(['osiguranikId','osiguranikNaziv','osiguranikIme','osiguranikPrezime','osiguranikOib',
            'osiguranikDatumRodjenja','osiguranikSpolOznaka','osiguranikUlica', 'osiguranikKucniBroj'])->toJson();*/


        //$request->session()->put('polica', $polica);

        //TODO :::::::::::::::::::::::::: OVO OVO TODO


                    //return redirect()->action('PolicaController@getPolicaKorakDrugi');

        //TODO :::::::::::::::::::::::::: OVO OVO TODO
    }

    public function sendPostData(Request $request)
    {
        return $request->session()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }

    public function formData(Request $request)
    {
        //Funkcija koja se pokreće nakon što klijent popuni podatke o osiguraniku?
    }*/
}
