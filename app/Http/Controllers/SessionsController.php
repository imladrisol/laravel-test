<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $user = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!auth()->attempt($user)) {
            /*return back()
           ->withInput()
           ->withErrors(['email' => 'Your provided credentials could not be verified.']);*/
            throw ValidationException::withMessages(['email' => 'Your provided credentials could not be verified.']);
        }
        session()->regenerate(); // prevent session fixation attack
        return redirect('/')->with('success', 'Welcome back!');
    }
}
