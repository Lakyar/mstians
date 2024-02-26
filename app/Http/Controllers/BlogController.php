<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{

    //all  blog
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()->filter(request(['tag', 'search']))->paginate(11)
        ]);
    }

    //all  blog
    public function manage()
    {
        return view('blogs.manage', [
            'blogs' => Blog::latest()->filter(request(['tag', 'search']))->paginate(5)
        ]);
    }


    //show single blog
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }


    //show create form
    public function create()
    {
        return view('blogs.create');
    }


    //store data
    public function store(Request $request)
    {
        $formFields = request()->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->hasFile('images')) {
        //     $formField['images'] = $request->file('images')->store('images', 'public');
        // }

        $image = $request->file('images');
        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $formFields['images'] = $imageName;


        $formFields['user_id'] = auth()->id();

        Blog::create($formFields);

        return redirect('/blogs/manage')->with('message', 'blog posted successfully!');
    }


    //show edit form
    public function edit(Blog $blog)
    {

        //make sure user is owner
        if ($blog->user_id != auth()->id()) {
            abort(403, 'Ma win ya!');
        }
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, Blog $blog)
    {


        $formFields = request()->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->hasFile('images')) {
        //     $formField['images'] = $request->file('images')->store('images', 'public');
        // }

        $image = $request->file('images');
        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $formFields['images'] = $imageName;




        $blog->update($formFields);

        return redirect('/blogs/manage')->with('message', 'blog updated successfully!');
    }


    //delete blog
    public function destroy(Blog $blog)
    {

        //make sure user is owner
        if ($blog->user_id != auth()->id()) {
            abort(403, 'ma lote pr nae');
        }

        $blog->delete();
        return redirect('/blogs/manage')->with('message', 'blog deleted successfully!');
    }


    // //manage blog
    // public function manage()
    // {
    //     return view('blogs.manage', ['blogs' => auth()->user()->blogs()->get()]);
    // }
}
