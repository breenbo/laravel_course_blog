<?php

namespace App\Http\Controllers;


class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    //
    public function destroy()
    {
        auth()->logout();

        // go to homepage with flash message on logout
        return redirect('/')->with('success', 'Goodbye!');
    }
    //
    public function store()
    {
        // validate the request
        $credentials = request()->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );
        // attempt to auth and log user based on credentials
        if (!auth()->attempt($credentials)) {
            // auth failed
            return back()
                ->withInput()
                ->withErrors(
                    [
                    'email' => 'The provided credentials are wrong.',
                    ]
                );
        }

        session()->regenerate();
        // redirect with flash message
        return redirect('/')->with('success', 'Welcome back!');
    }
}
