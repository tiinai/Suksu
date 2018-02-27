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

Route::get('/hobused', 'PageController@suksulist')->name ('hobused');

Route::get('/hobune/{hobune}', 'PageController@suksu')->name ('hobune');

    //uue hobuse lisamine
Route::post('/hobune', 'SuksuController@lisamine');

//hobuse kustutamine
Route::delete('/hobune/{id}', 'SuksuController@kustutamine');
//Route::delete('/hobune/{hobune}', function(Hobune $hobune){
  //  $hobune->delete();
    //return redirect('/hobused');
//});
Route::get('/edit/{id}', 'SuksuController@muutmine');
//Route::delete('/hobune', 'SuksuController@delete');
Route::patch('/hobune/{id}', 'SuksuController@varskenda');
//Route::get('/edit/{id}', 'SuksuController@varskenda');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/meist', 'PageController@meist')->name ('meist');

Route::get('/hobune',function(){
return view ('hobune');

Route::get('resizeImage', 'ImageController@resizeImage');

Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);
});
