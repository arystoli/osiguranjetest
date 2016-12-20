<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [
	'as' => '/',
	'uses' => 'PagesController@getIndex']);

Route::get('about', [
	'as' => 'about',
	'uses' => 'PagesController@getAbout']);

Route::get('contact', function () {
    return view('pages.contact');
});

Route::get('admin', function(){
	return view('pages.admin');
});

Route::get('help', function () {
    return view('pages.help');
});

Route::get('test', function () {
    return view('pages.test');
});

Route::get('polica', array('as' => 'polica', 'uses' => 'PolicaController@index'))->middleware('auth');
Route::post('polica', array('as' => 'polica', 'uses' => 'PolicaController@store'))->middleware('auth');

//Testni dio za komunikaciju sa eurohercom/////
Route::get('eurohercsession', ['as' => 'eurohercsession', 'uses' => 'EuroHercController@getSession']);
// Kraj testnog djela Euroherc/////////////////

//Dio za dohvat dinamičkih podataka za popunjavanje formi za policu
Route::get('/baza/tarifnapodgrupa',function()
{
    $tarifnaGrupaID = Input::get('Oznaka');
    $tarifnaPodGrupa = DB::table('tarifnapodgrupa')->where('TarifnaGrupaOznaka','=',$tarifnaGrupaID)->get();
    return $tarifnaPodGrupa;
 
});

//////////////////////////////////////////////////////////////////

//Testni REST Guzzle Client
Route::resource('json','TestJSONController');
///////////////////////////////////////////////

Route::resource('client','ClientController');
Auth::routes();
Route::get('/home', 'HomeController@index');

