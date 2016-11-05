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
 
           $apiRequest = $client->request('GET', 'http://jsonplaceholder.typicode.com/posts/1', ['headers' => ['API-Key' => 'B4274F11-EE28-48BF-BCB9-925275CD244D']]);
 
          // echo $apiRequest->getStatusCode());
          // echo $apiRequest->getHeader('content-type'));
 
          $content = json_decode($apiRequest->getBody()->getContents());
          dd($content);
 
      } catch (RequestException $re) {
          //For handling exception
      }
    }
}
