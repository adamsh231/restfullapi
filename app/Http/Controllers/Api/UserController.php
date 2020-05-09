<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\user;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function user()
    {
        $user = User::paginate(10);
        return response()->json($user);
        // return new UserResource($user);
    }

    public function userById(User $user)
    {
        return response()->json($user);
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json("created!");
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8'],
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json("updated!");
    }

    public function deleteUser(User $user){
        $user->delete();
        return response()->json("deleted!");
    }
}
