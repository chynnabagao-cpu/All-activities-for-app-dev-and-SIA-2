<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryFormController extends Controller
{
    public function create()
    {
        return view('story-form');
    }

    public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'age' => 'required|numeric|min:10|max:120',
            'genre' => 'required',
            'story' => 'required|min:10|max:500',
        ], [
            'name.required' => 'Please enter your name.',
            'age.min' => 'You must be at least 10 years old.',
            'story.min' => 'Your story must be at least 10 characters long.',
        ]);

        // Normally, you'd save to DB, but for this activity:
        // return success message
        return redirect('/story-form')->with('success', 'Thank you for sharing your favorite series!');
    }
}
