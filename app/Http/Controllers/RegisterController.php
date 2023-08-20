<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }
    //
    //
    public function store()
    {
        // dd(request()->all());
        // create the user - validate the user input
        // if validation fail, laravel go back to the form
        $attributes = request()->validate(
            [
            'name' => ['required', 'max:255'],
            'username' => [
                'required',
                'max:255',
                'min:3',
                Rule::unique('users', 'username'),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email'),
            ],
            'password' => ['required', 'max:255', 'min:7']
            ]
        );

        // if validate success, create the user with the attributes returned by the validation
        $user = User::create($attributes);

        // login the user
        auth() -> login($user);


        // display a quick success message
        // display managed in layout component
        return redirect('/')->with('success', 'Your account has been created!');
    }
}
