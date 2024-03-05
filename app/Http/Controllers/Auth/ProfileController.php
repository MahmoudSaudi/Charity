<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function updateProfile(ProfileUpdateRequest $request)
    {
        
        $user = $request->user();

        $validateData = $request->validated();

        $user->update($validateData);
        $user = $user->refresh();

        $success['user'] = $user;
        $success['success'] = true;
        $success['message'] = 'profile updated successfully';

        return response()->json($success,200);

    }
}
