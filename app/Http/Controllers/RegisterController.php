<?php

namespace App\Http\Controllers;

use App\Events\UserWasCreated;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        DB::beginTransaction();
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
        $msg = 'Your account has been created.';
        try {
            event(new UserWasCreated($user));
        } catch (\Exception $e) {
            $msg = 'The user wasn\'t created!';
            DB::rollback();
        }
        DB::commit();
        return redirect('/')->with('success', $msg);
    }
}
