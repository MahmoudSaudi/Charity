<?php

namespace App\Http\Controllers\Auth;

use Ichtrojan\Otp\Otp;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class ResetPasswordController extends Controller
{
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }
    public function resetPassword(ResetPasswordRequest $request)
    {
        $newOtp = $this->otp->validate($request->email , $request->otp);

        if(!$newOtp->status){
            return response()->json(['error' => $newOtp] , 401);
        }
        $user = User::where('email', '=', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $user->tokens()->delete();
        $success['success'] = true;
        $success['message'] = 'Password resetting successfully';
        return response()->json($success, 200);

    }
}
