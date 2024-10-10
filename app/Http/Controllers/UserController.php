<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:255'],

        ]);

        if  ($request->hasFile('profile')) {
            $filenameWithExtension = $request->file('profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('profile')->storeAs('Uploads/users-profile', $filenameToStore);
            $validated['profile'] = $filenameToStore;
        }

        $user = User::create($validated);

        return redirect(route('users'));


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
