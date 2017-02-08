<?php
namespace  App\MyLib;


use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Polica;

use App\MyLib\EurohercAPI as EHAPI;

class EurohercAPI {

	/*Testna klasa u kojoj možemo testirat ifunkcioniranje klase*/
	public function test()
	{

		echo "Radi klasa";
	}

	public function postPolica($data)
	{

		try {
				
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();

				//TESTNI POST
			/*$headers = ['base_uri' => 'https://jsonplaceholder.typicode.com/', 'verify' => false, 'API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key, 'content-type' => 'application/json'];
			$body = $data;
			$request = ('POST', 'https://jsonplaceholder.typicode.com/posts', $headers, $body);
			$response = $request->send();*/



			/*$headers = ['base_uri' => 'https://prodaja.euroherc.hr/ws.ao/', 'verify' => false, 'API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key, 'content-type' => 'application/json'];
			$body = $data;
			$request = new Request('POST', 'https://prodaja.euroherc.hr/ws.ao/api/v1/polica', $headers, $body);
			$response = $request->send();*/

			


			// STARI POST 
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('POST', 'https://prodaja.euroherc.hr/ws.ao/api/v1/polica', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'content-type' => 'application/json', 'SessionID' => $session_key], 'body' => $data]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			return $content;
			//var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod slanja podataka (postPolica)";
			echo $re;
		}
	
	}
	
	public function getSession()
	{
		try {

			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/session', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D']]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			$sessionLeaseTime = Carbon::today();
			echo $sessionLeaseTime;
			$sessionLeaseTime = $sessionLeaseTime->subHours(2);
			//echo $sessionLeaseTime;
			//echo $content->Data->SessionId;
			if(DB::table('session')
				->where('Naziv', 'Euroherc')
				->where('updated_at', '<', $sessionLeaseTime)
				->count())
			{
				echo $content->Data->SessionId;
				
				DB::table('session')
				->where('Naziv', 'Euroherc')
				->update(['session_key' => $content->Data->SessionId]);
				echo "New session<br>";
			}
			else
			{
				echo "Old Session<br>";
			}
			
			//dd($content);

		} catch (RequestException $re) {
          //For handling exception
			echo "Test exception";
			echo $re;
		}
	}
	///TESTNA SESSION GET FUNKCIJA
	public function getSifarniciTest()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			/*$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnagrupa', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);*/
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/sifarnici', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => '0456aaf1-10e4-44e7-90b1-bc57e34c51c5']]);

			

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			echo "<h2>VARDUMP</h2>";

			var_dump($content->Naselje);
			foreach ($content->Naselje->Data as $value) {
				print "Oznaka = " . $value->Oznaka;
				//var_dump($value->Oznaka);
			}

			//$file = fopen('sifarnici.txt', 'w');
			//$tekst = serialize($content);
			//fwrite($file, $tekst);
			//var_dump($content->Naselje->Data);
			
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}
	public function getSifarnici()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao/', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/sifarnici', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			return $content;
			//var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifnaGrupa($content)
	{
		try {

			foreach ($content->TarifnaGrupa->Data as $value) {
				
				DB::table('tarifnagrupa')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				//var_dump($value->Oznaka);
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();*/
			
			//var_dump($content->TarifnaGrupa->Data);

			
			/*$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnagrupa', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/

			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifnaPodGrupa($content)
	{
		try {

			foreach ($content->TarifnaPodGrupa->Data as $value) {
				
				DB::table('tarifnapodgrupa')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'TarifnaGrupaOznaka' => $value->TarifnaGrupaOznaka]);

				//var_dump($value->Oznaka);
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnapodgrupa', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifniDoplatak($content)
	{
		try {

			foreach ($content->TarifniDoplatak->Data as $value) {
				
				DB::table('tarifnidoplatak')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'TarifnaGrupaOznaka' => $value->TarifnaGrupaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnidoplatak', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifniPopust($content)
	{
		try {

			foreach ($content->TarifniPopust->Data as $value) {
				
				DB::table('tarifnipopust')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'TarifnaGrupaOznaka' => $value->TarifnaGrupaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnipopust', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getBonus($content)
	{
		try {

			foreach ($content->Bonus->Data as $value) {
				
				DB::table('bonus')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'TarifnaGrupaOznaka' => $value->TarifnaGrupaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/bonus', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getMalus($content)
	{
		try {
			foreach ($content->Malus->Data as $value) {
				
				DB::table('malus')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'TarifnaGrupaOznaka' => $value->TarifnaGrupaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/malus', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getVrstaOsobe($content)
	{
		try {
			foreach ($content->VrstaOsobe->Data as $value) {
				
				DB::table('vrstaosobe')->insert(['ID' => $value->ID, 'Naziv' => $value->Naziv, 'Oznaka' => $value->Oznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/vrstaosobe', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getSpol($content)
	{
		try {
			foreach ($content->Spol->Data as $value) {
				
				DB::table('spol')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/spol', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}


	public function getZona($content)
	{
		try {
			foreach ($content->Zona->Data as $value) {
				
				DB::table('zona')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zona', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getZonaSvota($content)
	{
		try {

			foreach ($content->ZonaSvota->Data as $value) {
				
				DB::table('zonasvota')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'ZonaOznaka' => $value->ZonaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonasvota', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getZonaVrstaPutnika($content)
	{
		try {

			foreach ($content->ZonaVrstaPutnika->Data as $value) {
				
				DB::table('zonavrstaputnika')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'ZonaOznaka' => $value->ZonaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonavrstaputnika', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getZonaVrstaVozaca($content)
	{
		try {

			foreach ($content->ZonaVrstaVozaca->Data as $value) {
				
				DB::table('zonavrstavozaca')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'ZonaOznaka' => $value->ZonaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonavrstavozaca', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getKilometaraGodisnje($content)
	{
		try {

			foreach ($content->KilometaraGodisnje->Data as $value) {
				
				DB::table('kilometaragodisnje')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/kilometaragodisnje', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getRezijskiDodatak($content)
	{
		try {
			foreach ($content->RezijskiDodatak->Data as $value) {
				
				DB::table('rezijskidodatak')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}



				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/rezijskidodatak', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getVrstaIzjave($content)
	{
		try {
			foreach ($content->VrstaIzjave->Data as $value) {
				
				DB::table('vrstaizjave')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}


				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/vrstaizjave', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getOsobaZaObracun($content)
	{
		try {
			foreach ($content->OsobaZaObracun->Data as $value) {
				
				DB::table('osobazaobracun')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/osobazaobracun', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getPopustKorporativni($content)
	{
		try {

			foreach ($content->PopustKorporativni->Data as $value) {
				
				DB::table('popustkorporativni')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/popustikorporativni', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getPopustViseVozila($content)
	{
		try {

			foreach ($content->PopustViseVozila->Data as $value) {
				
				DB::table('popustvisevozila')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/popustvisavozila', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getPosebanPopust($content)
	{
		try {

			foreach ($content->PosebanPopust->Data as $value) {
				
				DB::table('posebanpopust')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/posebanpopust', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getNacinPlacanja($content)
	{
		try {
			foreach ($content->NacinPlacanja->Data as $value) {
				
				DB::table('nacinplacanja')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/nacinplacanja', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getSredstvoPlacanja($content)
	{
		try {

			foreach ($content->SredstvoPlacanja->Data as $value) {
				
				DB::table('sredstvoplacanja')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/sredstvoplacanja', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getBankaKarticar($content)
	{
		try {
			//var_dump($content->BankaKarticar->Data);

			foreach ($content->BankaKarticar->Data as $value) {
				
				DB::table('bankakarticar')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'SretstvaPlacanjaOznaka' => $value->SretstvaPlacanjaOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/bankakarticar', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getVozac($content)
	{
		try {

			foreach ($content->Vozac->Data as $value) {
				
				DB::table('vozac')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'VrstaOsobeOznaka' => $value->VrstaOsobeOznaka]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/vozac', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getUvjeti($content)
	{
		try {

			foreach ($content->Uvjeti->Data as $value) {
				
				DB::table('uvjeti')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv]);

				
			}
				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/uvjeti', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getNaselje($content)
	{
		try {
			foreach ($content->Naselje->Data as $value) {
				
				DB::table('naselje')->insert(['Oznaka' => $value->Oznaka, 'Naziv' => $value->Naziv, 'PTBroj' => $value->PTBroj]);

				
			}

				/*$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/naselja', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);*/
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}




	
}

?>