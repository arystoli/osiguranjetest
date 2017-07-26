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

//Admin page routes
Route::get('admin', function(){
	return view('pages.admin');
});

Route::get('getAllPolicas', 'ListaPolicaController@index');


Route::get('help', function () {
    return view('pages.help');
});

Route::get('test', function () {
    return view('pages.test');
});
/////////////////////////////////////////////////Blagajna routes

Route::get('blagajna', 'BlagajnaController@index')->middleware('Active');

Route::get('blagajna/list', 'BlagajnaController@showList')->middleware('Active');

Route::get('blagajna/unosNovca', 'BlagajnaController@unosNovca')->middleware('Active');

Route::post('blagajna', 'BlagajnaController@store')->middleware('Active');

Route::post('blagajna/unosNovca' , 'BlagajnaController@unosNovcaStore')->middleware('Active');

Route::resource('blagajna','BlagajnaController');



////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////Police routes
Route::get('polica', array('as' => 'polica', 'uses' => 'PolicaController@index'))->middleware('Active');
//Route::post('polica', array('as' => 'polica', 'uses' => 'PolicaController@store'))->middleware('auth');
Route::post('polica', 'PolicaController@store')->middleware('Active');

Route::get('getPolicaKorakDrugi', 'PolicaController@getPolicaKorakDrugi')->middleware('Active');

Route::get('getPolicaOnePage', array('as' => 'getPolicaOnePage', 'uses' => 'PolicaController@getPolicaOnePage'))->middleware('Active');

Route::get('sendPostData', 'PolicaController@sendPostData');

Route::get('sendPostData', array('as' => 'sendPostData', function()
{
   
}));
///////////////////////////////////////////////


//////////////////////////////////////////////Izvještaji

/*Route::get('izvjestaji/promet', function () {
    return view('izvjestaji.promet');
});*/

Route::get('izvjestaji/police', function () {
    return view('izvjestaji.police');
});

Route::get('izvjestaji/radnici', function () {
    return view('izvjestaji.radnici');
});

Route::get('izvjestaji/promet', 'IzvjestajController@promet');
















/////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////Administracija itd..
Route::get('interniNacinPlacanja/{id}/delete', ['as' => 'interni.delete', 'uses' => 'InterniNacinPlacanjaController@delete']);
Route::resource('interniNacinPlacanja','InterniNacinPlacanjaController');



////////////////////////////////

//Testni dio za komunikaciju sa eurohercom/////
Route::get('eurohercsession', ['as' => 'eurohercsession', 'uses' => 'EuroHercController@getSession']);
// Kraj testnog djela Euroherc/////////////////

//Dio za dohvat dinamičkih podataka za popunjavanje formi za policu
Route::get('/baza/tarifnapodgrupa',function()
{
    $tarifnaGrupaID = Input::get('Oznaka');
    $tarifnaPodGrupa = DB::table('tarifnapodgrupa')->where('TarifnaGrupaOznaka','=',$tarifnaGrupaID)->pluck('Naziv', 'Oznaka');
    return $tarifnaPodGrupa;
 
});

Route::get('/baza/tarifnipopust',function()
{
    $tarifnaGrupaID = Input::get('Oznaka');
    $tarifniPopust = DB::table('tarifnipopust')->where('TarifnaGrupaOznaka','=',$tarifnaGrupaID)->pluck('Naziv', 'Oznaka');
    return $tarifniPopust;
 
});

Route::get('/baza/tarifnidoplatak',function()
{
    $tarifnaGrupaID = Input::get('Oznaka');
    $tarifniDoplatak = DB::table('tarifnidoplatak')->where('TarifnaGrupaOznaka','=',$tarifnaGrupaID)->pluck('Naziv', 'Oznaka');
    return $tarifniDoplatak;
 
});

Route::get('/baza/bonus',function()
{
    $tarifnaGrupaID = Input::get('Oznaka');
    $bonus = DB::table('bonus')->where('TarifnaGrupaOznaka','=',$tarifnaGrupaID)->pluck('Naziv', 'Oznaka');
    return $bonus;
 
});

Route::get('/baza/malus',function()
{
    $tarifnaGrupaID = Input::get('Oznaka');
    $malus = DB::table('malus')->where('TarifnaGrupaOznaka','=',$tarifnaGrupaID)->pluck('Naziv', 'Oznaka');
    return $malus;
 
});

Route::get('/baza/zonasvota',function()
{
    $zonaOznaka = Input::get('Oznaka');
    $zonasvota = DB::table('zonasvota')->where('ZonaOznaka','=',$zonaOznaka)->pluck('Naziv', 'Oznaka');
    return $zonasvota;
 
});

Route::get('/baza/zonavrstavozaca',function()
{
    $zonaOznaka = Input::get('Oznaka');
    $zonavozac = DB::table('zonavrstavozaca')->where('ZonaOznaka','=',$zonaOznaka)->pluck('Naziv', 'Oznaka');
    return $zonavozac;
 
});

Route::get('/baza/zonavrstaputnika',function()
{
    $zonaOznaka = Input::get('Oznaka');
    $zonavozac = DB::table('zonavrstaputnika')->where('ZonaOznaka','=',$zonaOznaka)->pluck('Naziv', 'Oznaka');
    return $zonavozac;
 
});

Route::get('/baza/vozac',function()
{
    $vrsteOsobeOznaka = Input::get('Oznaka');
    $vozac = DB::table('vozac')->where('VrstaOsobeOznaka','=',$vrsteOsobeOznaka)->pluck('Naziv', 'Oznaka');
    return $vozac;
 
});


//////////////////////////////////////////////////////////////////

//Testni REST Guzzle Client
Route::resource('json','TestJSONController');
///////////////////////////////////////////////

Route::resource('client','ClientController');
Auth::routes();
Route::get('/home', 'HomeController@index');

