<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreAddedEmail; // Import the PreAddedEmail model

class PreAddedEmailController extends Controller
{
    // Method to check if the provided email is pre-added
    public function checkPreAddedEmail(Request $request)
    {
        // Retrieve the email from the form fields
        $email = $request->input('email');

        // Check if the provided email is in the pre-added emails list
        $preAddedEmail = PreAddedEmail::where('email', $email)->exists();

        // If the email is not pre-added, return back with error message
        if (!$preAddedEmail) {
            return back()->withErrors(['email' => 'You are not authorized to register with this email.'])->withInput($request->except('password', 'password_confirmation'));
        }

        // If the email is pre-added, continue with registration process
        // (You can add your registration logic here)
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'unique:pre_added_emails,email'],
        ]);

        // Create the pre-added email
        PreAddedEmail::create($validatedData);

        // Redirect back or to any appropriate page
        return redirect()->back()->with('message', 'Email added successfully.');
    }
}
