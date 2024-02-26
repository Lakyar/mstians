<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TournamentController extends Controller
{

    //all  tours
    public function index()
    {
        return view('tournaments.index', [
            'tournaments' => Tournament::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //manage  tours
    public function manage()
    {
        return view('tournaments.manage', [
            'tournaments' => Tournament::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }


    //show single tour
    public function show(Tournament $tournament)
    {
        return view('tournaments.show', [
            'tournament' => $tournament
        ]);
    }


    //show create form
    public function create()
    {
        return view('tournaments.create');
    }


    //store data
    public function store(Request $request)
    {
        $formFields = request()->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'startDate' => 'required',
            'endDate' => '',
            'location' => 'required',

            //  'prize_pool' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'schedule' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->hasFile('images')) {
        //     $formField['images'] = $request->file('images')->store('images', 'public');
        // }

        $image = $request->file('images');
        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $formFields['images'] = $imageName;


        $formFields['user_id'] = auth()->id();


        Tournament::create($formFields);

        return redirect('/tournaments/manage')->with('message', 'tournament posted successfully!');
    }



    //show edit form
    public function edit(Tournament $tournament)
    {


        //make sure user is owner
        if ($tournament->user_id != auth()->id()) {
            abort(403, 'Ma win ya!');
        }
        $allTeams = Team::all();
        return view('tournaments.edit', compact('tournament', 'allTeams'));
    }


    public function update(Request $request, Tournament $tournament)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('images')) {
            // Upload the new image
            $image = $request->file('images');
            $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['images'] = $imageName;
        }

        // Update the tournament record with the validated data
        $tournament->update($validatedData);

        // Sync the teams associated with the tournament
        if ($request->has('teams')) {
            $tournament->teams()->sync($request->input('teams'));
        } else {
            // If no teams are selected, detach all existing associations
            $tournament->teams()->detach();
        }

        // Redirect the user to the tournament details page or any other appropriate page
        return redirect()->route('tournaments.manage', $tournament)->with('message', 'Tournament details updated successfully');
    }





    //delete tournament
    public function destroy(Tournament $tournament)
    {


        //make sure user is owner
        if ($tournament->user_id != auth()->id()) {
            abort(403, 'ma lote pr nae');
        }
        $tournament->delete();
        return redirect('/tournaments/manage')->with('message', 'tournament deleted successfully!');
    }
}
