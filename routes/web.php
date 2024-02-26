<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClassroomController;

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\PreAddedEmailController;


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


// Home
Route::view('/', 'home');

// Forgot Password
Route::view('/forgot', 'forgot');

// About
Route::view('/about', 'about');

// library
Route::view('/library', 'library');
Route::view('/books', 'books');
Route::view('/bookDetail', 'bookDetail');

// Account Routes
Route::group(['middleware' => 'auth'], function () {
    // Account routes
    Route::get('/account/{id}', [AccountController::class, 'show'])->name('account.show');
    Route::get('/users/{id}/account', [AccountController::class, 'showOtherUserAccount'])->name('account.show.other');






    // // routes/web.php

    // Route::get('/teams', [TeamController::class, 'index']);
    // Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
});


// Team Routes



// Team routes for admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    // All teams
    Route::get('/teams', [TeamController::class, 'index']);
    // Show create form
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    // Store
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    // Show edit team form
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    // Update team
    Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    // Delete team
    Route::delete('/teams/{team}', [TeamController::class, 'destroy']);
    // Manage team
    Route::get('/teams/manage', [TeamController::class, 'manage'])->name('teams.manage');




    Route::get('/teams/{team}/users', [TeamController::class, 'showUsers'])->name('teams.users');
    // Single team  
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
});












Route::middleware(['auth', 'admin'])->group(function () {

    Route::post('/add/preadded/email', [PreAddedEmailController::class, 'store'])->name('add.preadded.email');




    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Update user note
Route::middleware(['auth'])->post('/users/updateNote', [UserController::class, 'updateNote'])->name('users.updateNote');




// Classroom Routes

// All classrooms
Route::get('/classrooms', [ClassroomController::class, 'index']);

// Classroom routes for admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Show create form
    Route::get('/classrooms/create', [ClassroomController::class, 'create'])->name('classrooms.create');
    // Store
    Route::post('/classrooms', [ClassroomController::class, 'store'])->name('classrooms.store');
    // Show edit classroom form
    Route::get('/classrooms/{classroom}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');
    // Update classroom
    Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update'])->name('classrooms.update');
    // Delete classroom
    Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy']);
    // Manage classroom
    Route::get('/classrooms/manage', [ClassroomController::class, 'manage'])->name('classrooms.manage');


    Route::get('/classrooms/{classroom}/students', [ClassroomController::class, 'showStudents'])->name('classrooms.students');
});

// Single classroom  
Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show'])->name('classrooms.show');








// Blog Routes

// All blogs
Route::get('/blogs', [BlogController::class, 'index']);

// Blog routes for admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Show create form
    Route::get('/blogs/create', [BlogController::class, 'create']);
    // Store
    Route::post('/blogs', [BlogController::class, 'store']);
    // Show edit blog form
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit']);
    // Update blog
    Route::put('/blogs/{blog}', [BlogController::class, 'update']);
    // Delete blog
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);
    // Manage blog
    Route::get('/blogs/manage', [BlogController::class, 'manage']);
});

// Single blogs
Route::get('/blogs/{blog}', [BlogController::class, 'show']);

// Event Routes

// All events
Route::get('/events', [EventController::class, 'index']);

// Event routes for admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Show create form
    Route::get('/events/create', [EventController::class, 'create']);
    // Store
    Route::post('/events', [EventController::class, 'store']);
    // Show edit event form
    Route::get('/events/{event}/edit', [EventController::class, 'edit']);
    // Update event
    Route::put('/events/{event}', [EventController::class, 'update']);
    // Delete event
    Route::delete('/events/{event}', [EventController::class, 'destroy']);
    // Manage event
    Route::get('/events/manage', [EventController::class, 'manage']);
});

// Single event
Route::get('/events/{event}', [EventController::class, 'show']);

// Tournament Routes

// All tournaments
Route::get('/tournaments', [TournamentController::class, 'index']);

// Tournament routes for admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Show create form
    Route::get('/tournaments/create', [TournamentController::class, 'create']);
    // Store
    Route::post('/tournaments', [TournamentController::class, 'store']);
    // Show edit tournament form
    Route::get('/tournaments/{tournament}/edit', [TournamentController::class, 'edit']);
    // Update tournament
    Route::put('/tournaments/{tournament}', [TournamentController::class, 'update']);
    // Delete tournament
    Route::delete('/tournaments/{tournament}', [TournamentController::class, 'destroy']);
    // Manage tournament
    Route::get('/tournaments/manage', [TournamentController::class, 'manage'])->name('tournaments.manage');
});

// Single tournament
Route::get('/tournaments/{tournament}', [TournamentController::class, 'show']);




// AUTH Routes

// Show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login user 
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Show admin dashboard
    Route::view('/admin', 'admin.dashboard');
});

Route::post('/users/updateNote', [UserController::class, 'updateNote'])->name('users.updateNote')->middleware('auth');
