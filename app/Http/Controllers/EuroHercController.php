<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

class EuroHercController extends Controller
{
    public function getSession()
    {
        try {
 
           $client = new GuzzleHttpClient();
 
           $apiRequest = $client->request('GET', 'https://prodaja.euroherc.hr/ws.ao/api/v1/session', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D']]);
 
          // echo $apiRequest->getStatusCode());
          // echo $apiRequest->getHeader('content-type'));
 
          $content = json_decode($apiRequest->getBody()->getContents());
          dd($content);
 
      } catch (RequestException $re) {
          //For handling exception
      }
    }
}
