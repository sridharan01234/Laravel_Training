<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the password for the user.
     */
    public function hashPassword(Request $request)
    {
        $hashed = Hash::make($request->input('password'), [
            'rounds' => 12,
        ]);

        return [
            'password' => $request->input('password'),
            'hashed_password' => $hashed,
        ];
    }
}
