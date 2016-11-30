
<?php 
namespace  App\MyLib;

use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

class EurohercAPI {
	
	public function getSession()
	{
		try {

			$client = new GuzzleHttpClient(['base_uri' => 'https://prodaja.euroherc.hr/ws.ao', 'verify' => false]);
			//$client->setDefaultOption('verify', false);
			$apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/session', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D']]);

			//echo $apiRequest->getStatusCode();
			//echo $apiRequest->getHeader('content-type');
			//echo $apiRequest->getBody();

			//echo "Test";
			$content = json_decode($apiRequest->getBody()->getContents());
			dd($content);

		} catch (RequestException $re) {
          //For handling exception
			echo "Test exception";
			echo $re;
		}
	}
}

?>