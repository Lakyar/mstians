<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PreAddedEmail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Pass the $users variable to the view
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Pass the $user variable to the view
        return view('users.show', compact('user'));
    }




    // Show create form
    public function create()
    {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Check if the provided email exists in the pre-added emails list
        $preAddedEmail = PreAddedEmail::where('email', $formFields['email'])->exists();

        // If the email is not pre-added, return back with error message
        if (!$preAddedEmail) {
            return back()->withErrors(['email' => 'You are not authorized to register with this email.'])->withInput($request->except('password', 'password_confirmation'));
        }

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect("/account/" . auth()->user()->id)->with('message', "Welcome! You're a MSTian now.");
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', "You've been logged out.");
    }

    //show login form
    public function login()
    {
        return view('users.login');
    }

    //auth user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect("/account/" . auth()->user()->id)->with('message', "Welcome to MSTians Portal!");
        }

        return back()->withErrors(['email' => 'Something tot something pl'])->onlyInput('email');
    }

    //show edit form
    public function edit(User $user)
    {
        $teams = Team::all();
        $classrooms = Classroom::all();
        // Return the edit view with the user data
        return view('users.edit', compact('user', 'teams', 'classrooms'));
    }


    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            // Add more validation rules as needed
        ]);

        // Update the user record with the validated data
        $user->update($validatedData);

        // Sync the classrooms associated with the user
        $user->classrooms()->sync($request->input('classrooms'));

        // Sync the teams associated with the user
        $user->teams()->sync($request->input('teams'));

        // Convert the checkbox value to boolean and update "verified" field
        $user->update(['verified' => $request->has('verified')]);

        // Redirect the user to their profile page or any other appropriate page
        return redirect()->route('users.show', $user)->with('message', 'User details updated successfully');
    }


    public function destroy(User $user)
    {
        // Delete the user from the database
        $user->delete();

        // Redirect to the index page with a success message
        return redirect('/users/')->with('message', 'User deleted successfully.');
    }


    public function updateNote(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = User::find($userId); // Retrieve the User model instance by ID

        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update the user's note
        $user->update(['note' => $request->input('note')]);

        return redirect("/account/" . $userId)->with('message', 'Note updated successfully.');
    }
}
