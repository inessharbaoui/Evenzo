<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Comment;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = Concert::all();
        return view('admin.dashboard', compact('concerts'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'concertName' => 'required|string|max:255',
            'concertArtist' => 'required|string|max:255',
            'concertDate' => 'required|date',
            'concertImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $concert = new Concert();
        $concert->name = $validated['concertName'];
        $concert->artist = $validated['concertArtist'];
        $concert->date = $validated['concertDate'];

        if ($request->hasFile('concertImages')) {
            $photos = [];
            foreach ($request->file('concertImages') as $image) {
                $path = $image->store('concert_photos', 'public');
                $photos[] = $path;
            }
            $concert->photos = $photos;
        }

        $concert->save();

        return redirect()->route('admin.dashboard')->with('success', 'Concert added successfully!');
    }

    public function edit($id)
    {
        $concert = Concert::findOrFail($id);
        return view('admin.dashboard', compact('concert'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'artist' => 'required|string',
            'date' => 'required|date',
            'pictures' => 'array',
        ]);

        $concert = Concert::findOrFail($id);
        $concert->name = $request->name;
        $concert->artist = $request->artist;
        $concert->date = $request->date;
        $concert->pictures = $request->pictures;
        $concert->save();

        return redirect()->route('admin.dashboard')->with('success', 'Concert updated successfully');
    }

    public function destroy($id)
    {
        $concert = Concert::findOrFail($id);
        $concert->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Concert deleted successfully');
    }





    public function showConcertGallery()
    {
        $concerts = Concert::with('photos')->get();

        return view('events.gallery', compact('concerts'));
    }
}
