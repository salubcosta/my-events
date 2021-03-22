<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/queries', function () {
    $events = \App\Models\Event::all(); # select * from events;
    // $events = \App\Models\Event::all(['title', 'description']); # select title, description from events;
    
    /** 
     * get()        -> retorna uma colection
     * first()      -> retorna dado único
     * find($param) -> retorna dado único
     * 
     * $events = \App\Models\Event::whereId(1)->get(); # select * from events where id = 1;
     * $events = \App\Models\Event::where('id',1)->get(); # select * from events where id = 1;
     * $events = \App\Models\Event::where('id', 1)->first(); # select * from events where id = 1;
     * $events = \App\Models\Event::find(1); # select * from events where id = 1;
     */
    
    return $events;
});

Route::get('/hello-world', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);

Route::get('/hello/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);