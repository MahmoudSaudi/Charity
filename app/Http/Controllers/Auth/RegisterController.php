<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\LoginNotification;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $newUser = $request->validated();

        $newUser['role'] = 'user';
        $newUser['status'] = 'active';
        $newUser['password'] = Hash::make($newUser['password']);

        $user = User::create($newUser);

        //in this lien send token for all user register so wo write in this way {'user', ['app:all']}

        $success['token'] = $user->createToken('user', ['app:all'])->plainTextToken;

        $user['remember_token'] = $success['token'];

        $success['name'] = $user->first_name;
        $success['success'] = true;
        $user->notify(new LoginNotification());
        $user->save();
        return response()->json($success,200);
    }
}
