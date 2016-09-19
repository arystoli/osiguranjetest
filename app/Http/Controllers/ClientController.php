<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Client;

class ClientController extends Controller
{
    
    public function index()
    {
    	$clients = Client::all();
    	
    	return view('clients.index')->with('clients', $clients);
    	
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        /*$client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->save();
        */
        $inputs = $request->all();
        $client = Client::Create($inputs);

        return redirect()->action('ClientController@index');
        //return redirect()->route('client.index');
        
    }
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show')->with('client', $client);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('client.index');
    }

    public function edit($id)
    {

    }
}
