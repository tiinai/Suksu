<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Hobune;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hobused', 'SuksuController@suksulist')->name ('hobused');

Route::get('/hobune/{hobune}', 'SuksuController@suksu')->name ('hobune');

    //uue hobuse lisamine
Route::post('/hobune', 'SuksuController@lisamine');

//hobuse kustutamine
Route::put('/hobune', 'SuksuController@kustutamine');
//Route::delete('/hobune/{hobune}', function(Hobune $hobune){
  //  $hobune->delete();
    //return redirect('/hobused');
//});
Route::get('/edit/{id}', 'SuksuController@muutmine');
//Route::delete('/hobune', 'SuksuController@delete');

Route::get('/edit/{id}', 'SuksuController@varskenda');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/meist', 'SuksuController@meist')->name ('meist');

Route::get('/hobune',function(){
return view ('hobune');

});
