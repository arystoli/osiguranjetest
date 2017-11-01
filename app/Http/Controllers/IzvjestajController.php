<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;


class IzvjestajController extends Controller
{
    public function promet(Request $request)
    {
    	$testDate = "";
    	$enpArray = array();
    	$inpArray = array();
        /// Handle various list based on form
        if($request->input('hidden_source')=='datum')
        {
        	$testDate = $request->input('datum') . " 00:00:00";
            $policas = DB::table('policas')->whereDate('created_at', '=', $testDate)->orderBy('id', 'desc')->paginate(20);


            // Izvještaj po načinu plaćanja
            $externiNaciniPlacanja = DB::table('nacinplacanja')->get();
            

            foreach($externiNaciniPlacanja as $enp)
            {	
            	$tempSum=0;
            	foreach ($policas as $polica) {
            		
            		if($polica->NacinPlacanjaOznaka == $enp->Oznaka)
            		{
            			$tempSum = $tempSum + $polica->Premija;
            		}
            	}
            	//U eksterni array se spremaju svi izračuni sume načina plaćanja
            	//Dalje se prosljeđuje u view
            	$enpArray[$enp->Naziv] = $tempSum;
            	
            }
            //////////////////////////////////////////////////

             // Izvještaj po načinu plaćanja interno
            $interniNaciniPlacanja = DB::table('interninacinplacanja')->get();
            

            foreach($interniNaciniPlacanja as $inp)
            {	
            	$tempSum=0;
            	foreach ($policas as $polica) {
            		
            		if($polica->interniNacinPlacanja == $inp->id)
            		{
            			$tempSum = $tempSum + $polica->Premija;
            		}
            	}
            	//U eksterni array se spremaju svi izračuni sume načina plaćanja
            	//Dalje se prosljeđuje u view
            	$inpArray[$inp->naziv] = $tempSum;
            	
            }
            //////////////////////////////////////////////////

 			// Izvještaj po operateru
            $users = DB::table('users')->get();
            

            foreach($users as $user)
            {	
            	$tempSum=0;
            	foreach ($policas as $polica) {
            		
            		if($polica->operater == $user->id)
            		{
            			$tempSum = $tempSum + $polica->Premija;
            		}
            	}
            	//U eksterni array se spremaju svi izračuni sume načina plaćanja
            	//Dalje se prosljeđuje u view
            	$userArray[$user->name] = $tempSum;
            	
            }
            //////////////////////////////////////////////////



            // Handle multiple database requests to generate per day outputs:
            // po nacinu placanja, gotovina, kartica, itd, itd, teta1, teta2
            return view('izvjestaji.promet', ['policas' => $policas,
        'externiNaciniPlacanja' => $enpArray,
        'interniNacinPlacanja' => $inpArray,
        'users' => $userArray,
        'datumstr' => $testDate]);
        }
        else{        
        $policas = DB::table('policas')->paginate(20);        
        }
        
        return view('izvjestaji.promet', ['policas' => $policas, 'datumstr' => $testDate]);
    }

    public function radnici(Request $request)
    {
        $testDate = "";
        $userData = array();
        /// Handle various list based on form
        if($request->input('hidden_source')=='datum_radnici')
        {
            

            function getUserDataInDate($date, $timeChosen, $userData){
                //Dohvat internih načina plaćanja
                $interniNaciniPlacanja = DB::table('interninacinplacanja')->get();
                //Dohvat svih operatera
                $users = DB::table('users')->get();
                foreach($users as $user)
                {         
                    $policas = DB::table('policas')->whereDate('created_at', '=',
                    $date)->where('operater', $user->id)->orderBy('id', 'desc')->get();
                    $premija = 0;
                    $brPolica = 0;
                    foreach ($policas as $polica) {
                        $premija+=$polica->Premija;
                        $brPolica++;
                    }
                    $userData[$user->name][$timeChosen]['iznos'] = $premija;
                    $userData[$user->name][$timeChosen]['brPolica'] = $brPolica;

                    foreach($interniNaciniPlacanja as $inp)
                            {   
                                $brPolicaInp = 0;
                                $premijaInp = 0;

                                $policas = DB::table('policas')->whereDate('created_at', '=',
                                $date)->where([['operater', $user->id],
                                ['interniNacinPlacanja',$inp->id],
                                ])->orderBy('id', 'desc')->get();


                                foreach ($policas as $polica) {
                                    $brPolicaInp ++;
                                    $premijaInp += $polica->Premija;
                                }             
                                //U array se spremaju svi izračuni sume načina plaćanja
                                //za pojedinog korisnika te se dodaju u korisnikov array
                                $userData[$user->name][$timeChosen]['inp'][$inp->naziv]['brPolica'] = $brPolicaInp;
                                $userData[$user->name][$timeChosen]['inp'][$inp->naziv]['iznos'] = $premijaInp;
                            }                   
                }
                return $userData;
            }

            $testDate = $request->input('datum') . " 00:00:00";
            //$policas = DB::table('policas')->whereDate('created_at', '=',
            //$testDate)->orderBy('id', 'desc')->paginate(20); 
            //$policas = DB::table('policas')->orderBy('id', 'desc')->paginate(20);

            //Dohvat internih načina plaćanja
            $interniNaciniPlacanja = DB::table('interninacinplacanja')->get();

            //Dohvat polica za današnji dan  
            $users = DB::table('users')->get();            
            $datum = Carbon::now()->format('Y-m-d') . " 00:00:00";
            $userData = getUserDataInDate($datum, 'danas', $userData);
            $userData = getUserDataInDate($datum, 'test', $userData);            

            var_dump($userData);
            //////////////////////////////////////////////////



            // Handle multiple database requests to generate per day outputs:
            // po nacinu placanja, gotovina, kartica, itd, itd, teta1, teta2
            return view('izvjestaji.radnici', ['userData' => $userData,                
                'datumstr' => $testDate]);
        }
        else{
        $datum = Carbon::now()->format('Y-m-d') . " 00:00:00";        
        $policas = DB::table('policas')->whereDate('created_at', '=',
            $datum)->orderBy('id', 'desc')->paginate(20); 

            return view('izvjestaji.radnici', ['policas' => $policas, 'datumstr' => Carbon::now()->format('Y-m-d')]);       
        }
        
        return view('izvjestaji.radnici', ['policas' => $policas, 'datumstr' => $testDate]);
    }

    public function store(Request $request)
    {

        /// Handle various list based on form
        if($request->input('hidden_source')=='operater')
        {
            $policas = DB::table('policas')->where('operater', '=', $request->input('operater'))->orderBy('id', 'desc')->paginate(15);

        }
        elseif ($request->input('hidden_source')=='datum_radnici') {
                    $policas = DB::table('policas')->where('operater', '=', $request->input('operater'))->orderBy('id', 'desc')->paginate(15);

                }        
        else{
        
        $policas = DB::table('policas')->paginate(15);

        return view('izvjestaji.radnici', ['policas' => $policas]);
        }
    }
}
