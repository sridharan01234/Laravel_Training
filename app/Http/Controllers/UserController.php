<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;

class UserController extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function show()
    {
        Redis::set('key', 'value');
        $value = Redis::get('key');
        return view('user.show', ['user' => $value]);
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

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return response()->json($users); // Return as JSON
    }

    public function getUserById($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return response()->json($user);
    }

    public function createUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']); // Hash the password

        DB::table('users')->insert($data);

        return response()->json(['message' => 'User created successfully']);
    }

    public function updateUser($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:users,email,' . $id, // Ensure email is unique except for the current user
            'password' => 'sometimes|required',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        DB::table('users')->where('id', $id)->update($data);

        return response()->json(['message' => 'User updated successfully']);
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function countUsers()
    {
        $count = DB::table('users')->count();
        return response()->json(['count' => $count]);
    }
}
