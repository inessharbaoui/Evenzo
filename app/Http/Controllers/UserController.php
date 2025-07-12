<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::paginate(10);
        return view('dashboard.users', compact('users'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.dashboard.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }

    public function verify($id)
    {
        $user = User::findOrFail($id);
        $user->verified = true;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User verified successfully');
    }



    public function index()
    {
        $users = User::all();

        $totalUsers = $users->count();

        $usersLastWeek = User::where('created_at', '>=', now()->subWeek())->count();

        $userChange = $usersLastWeek;

        return view('events.profile', compact('users', 'totalUsers', 'userChange'));
    }


    public function profile()
    {
        $user = Auth::user();

        return view('events.profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo) {
                Storage::delete('public/' . $user->cover_photo);
            }

            $path = $request->file('cover_photo')->store('cover_photos', 'public');
            $user->cover_photo = $path;
        }

        $user->save();

        return redirect()->route('profile', $id)->with('success', 'Profile updated successfully!');
    }

}
