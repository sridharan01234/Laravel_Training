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
}
