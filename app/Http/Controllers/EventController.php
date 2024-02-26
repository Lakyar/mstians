<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{

    //all  events
    public function index()
    {
        return view('events.index', [
            'events' => Event::latest()->filter(request(['tag', 'search']))->paginate(15)
        ]);
    }

    //manage  events
    public function manage()
    {
        return view('events.manage', [
            'events' => Event::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }


    //show single event
    public function show(Event $event)
    {
        return view('events.show', [
            'event' => $event
        ]);
    }


    //show create form
    public function create()
    {

        return view('events.create');
    }


    //store data
    public function store(Request $request)
    {
        $formFields = request()->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            'startDate' => '',
            'endDate' => '',
            'startTime' => '',
            'endTime' => '',
            'location' => '',


        ]);

        // if ($request->hasFile('images')) {
        //     $formField['images'] = $request->file('images')->store('images', 'public');
        // }

        $image = $request->file('images');
        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $formFields['images'] = $imageName;


        $formFields['user_id'] = auth()->id();


        Event::create($formFields);

        return redirect('/events/manage')->with('message', 'event posted successfully!');
    }

    //show edit form
    public function edit(Event $event)
    {


        //make sure user is owner
        if ($event->user_id != auth()->id()) {
            abort(403, 'Ma win ya!');
        }

        return view('events.edit', ['event' => $event]);
    }


    //update data
    public function update(Request $request, Event $event)
    {
        $formFields = request()->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'startDate' => '',
            'endDate' => '',
            'startTime' => '',
            'endTime' => '',
            'location' => '',
        ]);

        // if ($request->hasFile('images')) {
        //     $formField['images'] = $request->file('images')->store('images', 'public');
        // }

        $image = $request->file('images');
        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $formFields['images'] = $imageName;




        $event->update($formFields);

        return redirect('/events/manage')->with('message', 'event updated successfully!');
    }








    //delete event
    public function destroy(Event $event)
    {


        //make sure user is owner
        if ($event->user_id != auth()->id()) {
            abort(403, 'ma lote pr nae');
        }

        $event->delete();
        return redirect('/events/manage')->with('message', 'event deleted successfully!');
    }
}
