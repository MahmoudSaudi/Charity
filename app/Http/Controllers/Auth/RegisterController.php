<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $newUser = $request->validated();

        $newUser['role'] = 'admin';
        $newUser['status'] = 'active';
        $newUser['password'] = Hash::make($newUser['password']);

        $user = User::create($newUser);

        //in this lien send token for all user register so wo write in this way {'user', ['app:all']}

        $success['token'] = $user->createToken('user', ['app:all'])->plainTextToken;
        $success['name'] = $user->first_name;
        $success['success'] = true;

        return response()->json($success,200);
    }
}
