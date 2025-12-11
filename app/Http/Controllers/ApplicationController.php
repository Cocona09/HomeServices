<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validate form input
        $validatedData = $request->validate([
            'firstname'  => 'required|string|max:255',
            'lastname'   => 'required|string|max:255',
            'email'      => 'required|email',
            'gender'     => 'required|string',
            'phone'      => 'required|string|max:15',
            'job'        => 'required|string|max:255',
            'languages'  => 'required|string',
            'experience' => 'required|string|max:255',
            'age'        => 'required|integer|min:0',
            'address'    => 'required|string|max:255',
            'message'    => 'required|string',
            'image'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/worker'), $imageName);

        Application::create(array_merge($validatedData, ['image' => 'uploads/worker/' . $imageName]));

        return back()->with('apply', 'Таны хүсэлт амжилттай илгээгдлээ!');
    }
}
