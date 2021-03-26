<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store()
    {
        $event = [
            'title' => rand(1, 100).'Evento Mas Assignment',
            'description' => 'Descrição ...',
            'body' => 'conteúdo do evento',
            'start_event' => date('Y-m-d H:i:s'),
            'slug' => Str::slug('Evento Mas Assignment'),
        ];
        return Event::create($event);
    }

    public function update($event)
    {
        $eventData = [
            'title' => rand(1, 1000).'Evento Mas Assignment',
        ];
        
        $event = Event::find($event);
        return $event->update($eventData);
    }

    public function destroy($event)
    {
        $event = Event::find($event);
        return $event->delete();
    }
}
