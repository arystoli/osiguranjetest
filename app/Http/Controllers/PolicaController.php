<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\PolicaController;

use Illuminate\Support\Facades\DB;

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
        
        //SLUČAJ KADA se sprema Basic forma i prosljeđuju se cijene

        if($request->input('hidden_source')=='basic'){
            
            $polica = Polica::firstOrCreate(['RegistarskaOznaka' => $request->input('RegistarskaOznaka')]);
            $data = $request->all();
            $polica->create($data);

            //var_dump($data);
            // ================= Micanje nepotrebnih podataka iz $data objekta
            unset($data['interniDobavljac_id']);
            unset($data['eksterniDobavljac_id']);
            unset($data['nadzorniktehnickog']);
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

            
            }
            else if($request->input('hidden_source')=='full_one_page'){
                
                //Temporary disabled
                //$polica = Polica::firstOrCreate(['RegistarskaOznaka' => $request->input('RegistarskaOznaka')]);
            $data = $request->all();
            //$polica->create($data);

            //var_dump($data);
            unset($data['_token']);
            unset($data['BrojRanijePolica']);

            $ugovaratelj = (object) array();
            $osiguranik = (object) array();

            $ugovaratelj->{'VrstaOsobeID'} = $data['ugovarateljVrsta'];
            $ugovaratelj->{'Naziv'} = $data['ugovarateljNaziv'];
            $ugovaratelj->{'Ime'} = $data['ugovarateljIme'];
            $ugovaratelj->{'Prezime'} = $data['ugovarateljPrezime'];
            $ugovaratelj->{'OIB'} = $data['ugovarateljOib'];
            $ugovaratelj->{'DatumRodjenja'} = $data['ugovarateljDatumRodjenja'];
            $ugovaratelj->{'SpolOznaka'} = $data['ugovarateljSpolOznaka'];
            $ugovaratelj->{'Ulica'} = $data['ugovarateljUlica'];
            $ugovaratelj->{'KucniBroj'} = $data['ugovarateljKucniBroj'];
            $ugovaratelj->{'PostanskiBroj'} = $data['ugovarateljPostanskiBroj'];
            $ugovaratelj->{'Naselje'} = DB::table('naselje')->where('Oznaka', $data['ugovarateljNaseljeOznaka'])->value('Naziv');
            $ugovaratelj->{'NaseljeOznaka'} = $data['ugovarateljNaseljeOznaka'];
            $ugovaratelj->{'Telefon'} = $data['ugovarateljTelefon'];
            $ugovaratelj->{'Email'} = $data['ugovarateljEmail'];

            $osiguranik->{'VrstaOsobeID'} = $data['osiguranikVrsta'];
            $osiguranik->{'Naziv'} = $data['osiguranikNaziv'];
            $osiguranik->{'Ime'} = $data['osiguranikIme'];
            $osiguranik->{'Prezime'} = $data['osiguranikPrezime'];
            $osiguranik->{'OIB'} = $data['osiguranikOib'];
            $osiguranik->{'DatumRodjenja'} = $data['osiguranikDatumRodjenja'];
            $osiguranik->{'SpolOznaka'} = $data['osiguranikSpolOznaka'];
            $osiguranik->{'Ulica'} = $data['osiguranikUlica'];
            $osiguranik->{'KucniBroj'} = $data['osiguranikKucniBroj'];
            $osiguranik->{'PostanskiBroj'} = $data['osiguranikPostanskiBroj'];
            $osiguranik->{'Naselje'} = DB::table('naselje')->where('Oznaka', $data['osiguranikNaseljeOznaka'])->value('Naziv');
            $osiguranik->{'NaseljeOznaka'} = $data['osiguranikNaseljeOznaka'];
            $osiguranik->{'Telefon'} = $data['osiguranikTelefon'];
            $osiguranik->{'Email'} = $data['osiguranikEmail'];


            var_dump($ugovaratelj);
            var_dump($osiguranik);
            $data['Ugovaratelj'] = $ugovaratelj;
            $data['Osiguranik'] = $osiguranik;
            //Dodati podatke u osiuranika i ugovaratelja
            
            $data['Proba'] = false;
            //var_dump($data);
            $post_data = $data;
            $post_data = json_encode($data);
            
            //var_dump($post_data);    

            /**Ovaj dio treba enable nakon testiranja podataka
            *$eh = new EHAPI();
            $policaData = $eh->postPolica($post_data);
            **/
            

            //return view('polica.cijene', ['polica' => $policaData]);
            
            }
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
