<?php
namespace  App\MyLib;


use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Polica;

use App\Models\Blagajna;

use App\Models\TransakcijaBlagajna;

use App\MyLib\EurohercAPI as EHAPI;

use App\MyLib\BlagajnaHelper as BH;

class BlagajnaHelper {

	/*Testna klasa u kojoj možemo testirat ifunkcioniranje klase*/
	public function test()
	{

		echo "Radi klasa";
	}

	public function odradiTransakciju(TransakcijaBlagajna $transakcija)
	{
		$bh = new BH();
		
	
		DB::transaction(function($transakcija) use ($transakcija) {
			
			$iznosOduzeti = ($transakcija->iznos_naplacen) - 
			($transakcija->iznos_polica);
			$blagajnas = Blagajna::where('osiguranje', $transakcija->osiguranje)->get();
			foreach ($blagajnas as $blagajna) {
				$stariIznosPolica = $blagajna->iznosPolica;
				$stariIznosNovca = $blagajna->iznos;
				$blagajna->iznosPolica = $stariIznosPolica + $transakcija->iznos_polica;
				$blagajna->iznos = $stariIznosNovca - $iznosOduzeti;
				$blagajna->save();
			}


		});

	}

	
}

?>