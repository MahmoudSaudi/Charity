<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization; // Assuming your Organization model is named Org
use App\Models\Category;


class LoginAuthController extends Controller
{

    public function loginAuth(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        // SUPER Admin
        // Check if the email is equal to "tarek@gmail.com"

        if ($request->email === 'saudimahmoud7878@gmail.com' && $request->password === 'password') {
            // Email and password are correct for admin, return admin dashboard
            $data['route'] = 'organization';
            $data['role'] = 'super admin';
            $data['organizations'] = Organization::paginate(4);
            return view('admin.organization.index', $data);
        }



        // Admin // Organization
        $Org = Organization::where('email', $request->email)->first();

        if ($Org) {
            // Org exists, check password
            if (password_verify($request->password, $Org->password)) {
                $data['categories'] = Category::select('id', 'organization_id', 'name', 'description', 'image')->paginate(5);
                //   return $data;
                $data['route'] = 'category';
                $data['role'] = 'admin';
                return view('admin.category.index', $data);
            }
        }

        // Email or password is incorrect, return some other view or redirect to a different page
        return view('auth.login2'); // You can replace 'login' with your actual login view name
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('auth.login2'); // Redirect to any page after logout
    }
}
