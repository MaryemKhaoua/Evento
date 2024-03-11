<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

//admin
Route::middleware(['admin', 'auth'])->group(function () {

//routes for categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
//routes for dashboard admin
Route::get('/adminDashbord', [AdminDashboard::class, 'create'])->name('admin.dashboard');
Route::get('/admincatg', [AdminDashboard::class, 'createCat'])->name('categoryAjouter');
Route::get('/Accept/event', [AdminDashboard::class, 'acceptation'])->name('acceptaion.event');
Route::post('/accepted/{eventId}', [AdminDashboard::class, 'acceptEvent'])->name('event.accept');
Route::get('/statistics', [AdminDashboard::class, 'statistics'])->name('admin.statistics');

//users ban
Route::get('/users', [UserController::class, 'ShowUsers'])->name('users');
Route::post('/updateUser/{id}', [UserController::class, 'updateUserRole'])->name('updateUser');
Route::post('/banuser/{id}', [UserController::class, 'BanUser'])->name('banuser');
});


//organisateur
Route::middleware(['organisateur', 'auth'])->group(function () {

    Route::post('/events', [EventController:: class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::post('/acceptTicket/{reservation}', [TicketController::class, 'acceptTicket'])->name('acceptTicket');
    Route::post('/refuseTicket/{reservation}', [TicketController::class, 'refuseTicket'])->name('refuseTicket');

    Route::get('/myevents', [EventController::class, 'EventsUser'])->name('myevents');
    Route::get('/myeventstatus/{id}', [EventController::class, 'EventUserStats'])->name('myeventstatus');

});

//route for events

Route::get('/index', [EventController:: class, 'index'])->name('events.index');



//route for details event
Route::get('/details/{id}', [EventController::class, 'details'])->name('details');
//route for ticket
Route::get('/ticket/{id}', [TicketController::class, 'ShowAddTickets'])->name('ticket.create');
Route::post('/ticket/{id}', [TicketController::class, 'createTickets'])->name('ticket.store');


//routes for search
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
//route for reservation
Route::post('/createreservation', [ReservationController::class, 'createReservation'])->name('createReservation');
Route::get('/myreservations', [ReservationController::class, 'ShowReservations'])->name('myreservations');
