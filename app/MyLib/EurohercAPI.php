<?php
namespace  App\MyLib;


use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\MyLib\EurohercAPI as EHAPI;

class EurohercAPI {

	/*Testna klasa u kojoj možemo testirat ifunkcioniranje klase*/
	public function test()
	{

		echo "Radi klasa";
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
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifnaGrupa()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnagrupa', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifnaPodGrupa()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnapodgrupa', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifniDoplatak()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnidoplatak', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getTarifniPopust()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/tarifnipopust', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getBonus()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/bonus', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getMalus()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/malus', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getVrstaOsobe()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/vrstaosobe', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getSpol()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/spol', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}


	public function getZona()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zona', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getZonaSvota()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonasvota', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getZonaVrstaPutnika()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonavrstaputnika', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getZonaVrstaVozaca()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonavrstavozaca', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getKilometaraGodisnje()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/kilometaragodisnje', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getRezijskiDodatak()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/rezijskidodatak', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getVrstaIzjave()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/vrstaizjave', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getOsobaZaObracun()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/osobazaobracun', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getPopustiKorporativni()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/popustikorporativni', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getPopustVisaVozila()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/popustvisavozila', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getPosebanPopust()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/posebanpopust', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getNacinPlacanja()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/nacinplacanja', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getSredstvoPlacanja()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/sredstvoplacanja', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getBankaKarticar()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/bankakarticar', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getVozac()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/vozac', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getUvjeti()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/uvjeti', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}

	public function getNaselja()
	{
		try {
				$eh = new EHAPI();

				$eh->getSession();

				$session_key=DB::table('session')
				->select('session_key')
				->where('Naziv', 'Euroherc')->get();
			
			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/naselja', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => $session_key]]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			
		} catch (RequestException $re) {
          //For handling exception
			echo "Exception kod dohvata podataka (Sifarnika)";
			echo $re;
		}
	}




	
}

?>