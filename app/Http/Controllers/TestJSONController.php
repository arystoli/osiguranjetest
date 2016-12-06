<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client as GuzzleHttpClient;

use GuzzleHttp\Exception\RequestException;

use App\MyLib\EurohercAPI as EHAPI;


class TestJSONController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try {
           $eh = new EHAPI();
           echo "<h2>Test</h2>";
           $eh->test();
           echo "<h2>Session Testing</h2>";
           //$eh->getSession();
           echo "<h2>Sifarnici</h2>";
           $eh->getSifarnici();

           //return view('test');

           /*echo "TestEcho";
           $client = new GuzzleHttpClient();
 
           $apiRequest = $client->request('GET', 'http://jsonplaceholder.typicode.com/posts/1');
 
          // echo $apiRequest->getStatusCode());
          // echo $apiRequest->getHeader('content-type'));
 
          $content = json_decode($apiRequest->getBody()->getContents());

          dd($content);*/

          

 
      } catch (RequestException $re) {
          //For handling exception
      }
    }

    public function showSession()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
