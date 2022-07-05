<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attrs = \request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            //'username' => ['required', 'max:255', 'min:3', Rule::unique('users','username')],
            'password' => ['required', 'min:7', 'max:255'],
            'email' => 'required|max:255|unique:users,email'
        ]);
        $user = User::create($attrs);
        //session()->flash('success', 'Your account has been created.');
        auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
