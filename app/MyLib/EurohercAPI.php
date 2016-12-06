<?php
namespace  App\MyLib;


use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

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
			dd($content);

		} catch (RequestException $re) {
          //For handling exception
			echo "Test exception";
			echo $re;
		}
	}
	///TESTNA SESSION GET FUNKCIJA
	public function getSessionTest()
	{
		try {

			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			//$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/sifarnici', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => '0ab399a6-d6ea-41b1-804f-3a4b7271ff82']]);

			//echo "Test";
			/*$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			echo $content->Data->SessionId;*/
			//var_dump($content);
			//dd($content);
			  
			

		} catch (RequestException $re) {
          //For handling exception
			echo "Test exception";
			echo $re;
		}
	}
	public function getSifarnici()
	{
		try {

			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/zonavrstaputnika', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D', 'SessionID' => 'b1ad8db6-1d54-4c22-96cc-06dd460c1b69']]);

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			var_dump($content);
			try {echo $content->Data->SessionId;}
			catch(Exception $e){}
			//var_dump($content);
			//dd($content);

		} catch (RequestException $re) {
          //For handling exception
			echo "Test exception";
			echo $re;
		}
	}


	
}

?>