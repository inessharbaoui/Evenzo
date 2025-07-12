<?php



namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Merchandise;
use App\Models\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::select('name', 'type')->get();
        $users = User::all();
        $merchandise = Merchandise::all();
        $comments = Comment::all();
        $totalEvents = Event::count();
        $eventsLastWeek = Event::where('created_at', '>=', Carbon::now()->subWeek())->count();

        return view('admin.dashboard', compact('events', 'users','merchandise', 'comments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer',
            'type' => 'required|string|in:VIP,Regular,Premium',
            'max_attendees' => 'required|integer',
            'price' => 'required|numeric',
            'photo_path' => 'nullable|image|max:2048',
            'artist' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo_path')) {
            $imagePath = $request->file('photo_path')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $event = Event::create(array_merge($validated, ['photo_path' => $imagePath]));

        return response()->json(['success' => true, 'event' => $event]);
    }



    public function showUsers()
    {
        $users = User::paginate(10);
        $events = Event::all();
        return view('admin.dashboard', compact('users', 'events'));
    }




    public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Event deleted successfully');
}


public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'artist' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'duration' => 'nullable|integer|min:1',
        'type' => 'nullable|string|in:VIP,Regular',
        'max_attendees' => 'nullable|integer|min:1',
        'price' => 'nullable|numeric|min:0',
        'photo_path' => 'nullable|file|image|max:2048',
    ]);

    $event->update($validatedData);

    if ($request->hasFile('photo_path')) {
        $event->photo_path = $request->file('photo_path')->store('photos', 'public');
    }

    $event->save();

    return redirect()->back()->with('success', 'Event updated successfully.');
}


}
