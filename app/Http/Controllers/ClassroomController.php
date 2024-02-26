<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    // All classes
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    // Show single classroom
    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    // Show users of a classroom
    public function showUsers(Classroom $classroom)
    {
        $users = $classroom->users;
        return view('classrooms.users', compact('classroom', 'users'));
    }

    // Show create form
    public function create()
    {
        return view('classrooms.create');
    }

    // Store data
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required',
            'level' => 'nullable|integer',
            'batch' => 'nullable|integer',
            'education' => 'required|string',
            'course' => 'nullable|string',
            'city' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rule for images
        ]);

        // Handle the uploaded image
        $image = $request->file('images');
        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        // Add the image name to the validated data
        $validatedData['images'] = $imageName;

        // Create a new Classroom instance with the validated data
        Classroom::create($validatedData);

        // Redirect the user to the manage classrooms page with a success message
        return redirect()->route('classrooms.manage')->with('message', 'Classroom created successfully!');
    }




    public function manage()
    {
        $classrooms = Classroom::latest()->paginate(9);
        return view('classrooms.manage', compact('classrooms'));
    }
    // Show edit form
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }
    // Update class
    public function update(Request $request, Classroom $classroom)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required',
            'level' => 'nullable|integer',
            'batch' => 'nullable|integer',
            'education' => 'required|string',
            'course' => 'nullable|string',
            'city' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('images')) {
            // Handle the uploaded image
            $image = $request->file('images');
            $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Add the image name to the validated data
            $validatedData['images'] = $imageName;
        }

        // Update the classroom record with the validated data
        $classroom->update($validatedData);

        // Redirect the user to the manage classrooms page with a success message
        return redirect()->route('classrooms.manage')->with('message', 'Classroom updated successfully!');
    }


    // Delete class
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.manage')->with('message', 'classroom deleted successfully!');
    }
}
