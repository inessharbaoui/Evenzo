<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    public function index()
    {
        $merchandise = Merchandise::paginate(10);

    return view('admin.dashboard', compact('merchandise'));
    }

    public function store(Request $request)
{
    $request->validate([
        'merchName' => 'required|string|max:255',
        'merchDescription' => 'required|string|max:255',
        'merchPrice' => 'required|numeric',
        'merchStock' => 'required|integer',
        'merchImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('merchImage')) {
        $photoPath = $request->file('merchImage')->store('images', 'public');
    } else {
        return response()->json(['error' => 'Image not uploaded.'], 400);
    }

    try {
        $merchandise = new Merchandise();
        $merchandise->name = $request->input('merchName');
        $merchandise->description = $request->input('merchDescription');
        $merchandise->price = $request->input('merchPrice');
        $merchandise->stock = $request->input('merchStock');
        $merchandise->photo_path = $photoPath;
        $merchandise->save();

        if ($request->ajax()) {
            return response()->json(['data' => $merchandise], 201);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Merchandise added successfully!');
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error adding merchandise: ' . $e->getMessage()], 500);
    }
}


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $merchandise = Merchandise::findOrFail($id);

        $merchandise->name = $validated['name'];
        $merchandise->description = $validated['description'];
        $merchandise->price = $validated['price'];
        $merchandise->stock = $validated['stock'];

        if ($request->hasFile('photo_path')) {
            if ($merchandise->photo_path && file_exists(storage_path('app/public/' . $merchandise->photo_path))) {
                unlink(storage_path('app/public/' . $merchandise->photo_path));
            }

            $photoPath = $request->file('photo_path')->store('photos', 'public');
            $merchandise->photo_path = $photoPath;
        }

        $merchandise->save();

        return redirect()->route('admin.dashboard')->with('success', 'Merchandise updated successfully!');
    }

    public function destroy($id)
    {
        $merchandise = Merchandise::find($id);

        if (!$merchandise) {
            return redirect()->route('admin.dashboard')->with('error', 'Item not found');
        }

        $merchandise->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Item deleted successfully');
    }
    public function showMerchandise()
    {
        $merchandise = Merchandise::all();

        return view('events.merchandise', compact('merchandise'));
    }


}
