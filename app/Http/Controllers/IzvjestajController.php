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

             // Izvještaj po načinu plaćanja
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


            // Handle multiple database requests to generate per day outputs:
            // po nacinu placanja, gotovina, kartica, itd, itd, teta1, teta2
            return view('izvjestaji.promet', ['policas' => $policas,
        'externiNaciniPlacanja' => $enpArray, 'interniNacinPlacanja' => $inpArray, 'datumstr' => $testDate]);
        }
        else{        
        $policas = DB::table('policas')->paginate(20);        
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
