<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    // $events = \App\Models\Event::all(); # select * from events;
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
    
    # Active record - insert
    // return insert();

    # Active record - update
    // return update();

    #Atribuição em massa ou Mass Assignment - criação
    // $event = [
    //     'title' => 'Evento Mas Assignment',
    //     'description' => 'Descrição ...',
    //     'body' => 'conteúdo do evento',
    //     'start_event' => date('Y-m-d H:i:s'),
    //     'slug' => Str::slug('Evento Mas Assignment'),
    // ];
    // return \App\Models\Event::create($event);

    #Atribuição em massa ou Mass Assignment - update
    // $eventData = [
    //     'title' => 'Evento Mas Assignment',
    //     'description' => 'Descrição ...',
    //     'body' => 'conteúdo do evento atualizado com mass assignment',
    //     'start_event' => date('Y-m-d H:i:s'),
    //     'slug' => Str::slug('Evento Mas Assignment'),
    // ];
    // $event = \App\Models\Event::find(3);

    // return $event->update($eventData);

    #Atribuição em massa ou Mass Assignment - delete
    // $event = \App\Models\Event::find(3);
    // return $event->delete();

    // return \App\Models\Event::findOrFail(3);

    # Delete models via ids: [2, 4, 6, 7];
    return \App\Models\Event::destroy([2, 4, 6, 7]);
});

function insert()
{
    $event = new \App\Models\Event();
    
    $event->title = 'Exemplo de Inserção de Evento via Eloquent e Active Record';
    $event->description = 'Descrição do evento...';
    $event->body = 'Conteúdo do evento...';
    $event->start_event = now();
    $event->slug = Str::slug($event->title);

    return $event->save();
}

function update()
{
    $event = \App\Models\Event::find(1);
    $event->title = 'Evento atualizado...';
    $event->slug = Str::slug($event->title);
    return $event->save();
}

Route::get('/hello-world', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);

Route::get('/hello/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);