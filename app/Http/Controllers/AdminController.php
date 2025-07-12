<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Merchandise;
use App\Models\Concert;


use App\Models\Comment;


class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::all();
        $users = User::all();

        $merchandise = Merchandise::all();

        $concerts = Concert::all();
        return view('admin.dashboard', compact('events', 'users','merchandise','concerts'));
    }





    public function destroy($id)
{
    $user = User::find($id);

    if ($user) {
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully!');
    } else {
        return redirect()->route('admin.dashboard')->with('error', 'User not found!');
    }
}



public function verify($id)
{
    $user = User::find($id);

    if ($user) {
        $user->verified = true;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User verified successfully!');
    }

    return redirect()->route('admin.dashboard')->with('error', 'User not found.');
}
}
