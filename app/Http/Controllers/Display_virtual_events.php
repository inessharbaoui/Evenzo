<?php



namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Merchandise;
use Illuminate\Http\Request;


class Display_virtual_events extends Controller
{
public function index()
    {

            $events = Event::all();

            return view('events.virtual_events', ['events' => $events]);


    }}
