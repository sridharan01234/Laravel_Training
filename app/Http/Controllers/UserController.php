<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserController extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public function show()
    {
        return view('user.show');
    }

    /**
     * Show the profile for the given user.
     */
    public function profile(Request $request)
    {
        session()->put('id', 34);
        $value = session()->get('id');
        return view('user.profile', ['user' => $value]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = $request->only('email', 'password');
        $user['password'] = bcrypt($request->password);

        return $user;
    }

    public function GetDbConnection()
    {
        return view('user.dbConnection');
    }

    public function CSRFProtection()
    {
        return view('user.csrfform');
    }
}
