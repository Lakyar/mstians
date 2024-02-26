<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // All teams
    public function index()
    {
        return view('teams.index', [
            'teams' => Team::all()
        ]);
    }

    // Show single team
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    // Show users of a team
    public function showUsers(Team $team)
    {
        $users = $team->users;
        return view('teams.users', compact('team', 'users'));
    }

    // Show create form
    public function create()
    {
        return view('teams.create');
    }

    // Store data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'game' => 'required',
        ]);

        Team::create($validatedData);

        return redirect()->route('teams.manage')->with('message', 'Team created successfully!');
    }

    // TeamController.php
    public function manage()
    {
        $teams = Team::latest()->paginate(9); // Fetch teams from the latest to the oldest and paginate the results
        return view('teams.manage', compact('teams'));
    }

    // Show edit form
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    // Update team
    public function update(Request $request, Team $team)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'game' => 'required',
        ]);

        $team->update($validatedData);

        return redirect()->route('teams.manage')->with('message', 'Team updated successfully!');
    }

    // Delete team
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.manage')->with('message', 'Team deleted successfully!');
    }
}
