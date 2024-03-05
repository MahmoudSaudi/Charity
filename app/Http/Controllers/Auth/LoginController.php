<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Faker\Provider\UserAgent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\LoginNotification;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials=[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(auth()->attempt($credentials))
        {
            $user = Auth::user();

            $user->tokens()->delete();
            //in this lien send token for current user so wo write in this way  {request()->userAgent()}
            $success['token'] = $user->createToken(request()->userAgent())->plainTextToken;

            $success['name'] = $user->first_name;
            $success['success'] = true;

            $user->notify(new LoginNotification());


            return response()->json($success,200);
        }
        else{
            return response()->json(['error'=>'error email or password' , 'message' => 'check email or password'], 401);
        }

    }
}
