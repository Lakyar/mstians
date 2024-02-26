<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();

        // Check if the authenticated user's ID matches the provided ID
        if ($user && $user->id == $id) {
            return view('account.show', compact('user'));
        } else {
            abort(403, 'br lote chin tr ll?'); // Or redirect to a different page
        }
    }

    public function showOtherUserAccount($id)
    {
        // Retrieve the authenticated user
        $authenticatedUser = Auth::user();

        // Check if the provided user ID matches the authenticated user's ID
        if ($authenticatedUser && $authenticatedUser->id == $id) {
            // If they match, redirect the user to their own account page
            return redirect()->route('account.show', ['id' => $authenticatedUser->id]);
        }

        // Retrieve the user whose account is being visited
        $user = User::findOrFail($id);

        // Return the view with the other user's data
        return view('account.show_other', compact('user'));
    }
}
