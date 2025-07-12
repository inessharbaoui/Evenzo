

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

use App\Models\Event;

use App\Models\Concert;
use App\Models\User;
use App\Models\Merchandise;
use App\Models\Comment;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('events.main');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class);
});

Route::get('/dashboard_user', function () {
    return view('layouts.master');
})->name('dashboard_user');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard_admin');





Route::get('/upcoming-events', function () {
    return view('events.upcoming-events');
})->name('upcoming-events');


Route::get('/test-db', function () {
    $events = \App\Models\Event::all();
    return $events;
});

Route::get('/home', function () {
    return view('home');
})->name('home');



Route::get('/events/{id}', [EventController::class, 'showEventDetail'])->name('event.detail');



Route::get('/events', function () {
    return view('events');
});

















use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/events', [AdminController::class, 'dashboard'])->name('admin.events');

     Route::get('/gallery', [AdminController::class, 'manageGallery'])->name('admin.gallery');

     Route::get('/merchandise', [AdminController::class, 'manageMerchandise'])->name('admin.merchandise');

     Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
});











Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard_admin');


Route::get('/test-db', function () {
    try {
        $events = DB::table('events')->get();
        return response()->json($events);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});








Route::post('/events/store', [EventController::class, 'store'])->name('events.store');


Route::put('/events/update', [EventController::class, 'update'])->name('events.update');





Route::get('/dashboard', [UserController::class, 'showUsers'])->name('admin.dashboard');

Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('admin.events.delete');











Route::get('/dashboard', [AdminController::class, 'dashboard']);



Route::get('/dashboard', [AdminController::class, 'dashboard']);



Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');

Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::post('/users/{id}/verify', [AdminController::class, 'verify'])->name('admin.users.verify');





use App\Http\Controllers\MerchandiseController;
Route::resource('merchandise', MerchandiseController::class);

Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
Route::post('/merchandise/store', [MerchandiseController::class, 'store'])->name('merchandise.store');
Route::put('merchandise/{id}', [MerchandiseController::class, 'update'])->name('merchandise.update');
Route::delete('/merchandise/{id}', [MerchandiseController::class, 'destroy']);
use App\Http\Controllers\ConcertController;

Route::resource('concerts', ConcertController::class);

Route::get('/concerts', [ConcertController::class, 'index'])->name('concerts.index');

Route::post('/concerts', [ConcertController::class, 'store'])->name('concerts.store');

Route::delete('/concerts/{id}', [ConcertController::class, 'destroy'])->name('concerts.destroy');

Route::put('/concerts/{id}', [ConcertController::class, 'update'])->name('concerts.update');
use App\Http\Controllers\Display;

Route::get('/events', [Display::class, 'index']);

Route::get('/virtual-events', function () {
    $events = Event::all();
    return view('events.virtual_events', compact('events'));
});



Route::get('/events_gallery', function () {
    $events = Concert::all();

    return view('events.gallery', compact('events'));
});
use App\Http\Controllers\CommentController;

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');


Route::get('/merchandise', [MerchandiseController::class, 'showMerchandise']);

Route::get('/merch', function () {
    $merchandise = Merchandise::all();

    return view('events.merchandise', compact('merchandise'));
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/profile', function () {
    $users = User::all();

    return view('events.profile',compact('users'));
});
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::match(['put', 'post'], '/profile/update/{id}', [UserController::class, 'update'])->name('profile.update');

use App\Http\Controllers\FeedbackController;


Route::post('/analyze-feedback', [FeedbackController::class, 'analyzeFeedback']);
Route::get('/feed', function () {

    return view('events.feedback');
});
Route::get('/analyze-comments', [FeedbackController::class, 'analyzeComments'])->name('comments.analyze');
Route::get('/dashboard-comments', [FeedbackController::class, 'analyzeAllComments'])->name('dashboard-comments');
Route::get('/dashboard', function () {
    $events = \App\Models\Event::all();
    $merchandise = \App\Models\Merchandise::all();
    $concerts = \App\Models\Concert::all();
    $users = \App\Models\User::all();


    return view('admin.dashboard', compact(
        'events',
        'merchandise',
        'concerts',
        'users'
    ));
})->name('dashboard_admin');


Route::get('/comments', function () {
    $recentComments = Comment::latest()->take(5)->get(['text']);
    return response()->json($recentComments);
});
