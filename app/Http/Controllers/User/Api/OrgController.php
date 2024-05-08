<?php

namespace App\Http\Controllers\User\Api;

use App\Models\Campaign;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrgController extends Controller
{
    public function getAllOrg()
    {
        $success['organizations'] = Organization::select('id', 'name', 'phone_number', 'email','image')->get();
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function showOrg($id)
    {
        $success['organization'] =  Organization::select('id', 'name', 'description','phone_number', 'address', 'email','image','is_active','has_delegate')->find($id);
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function showOrgs($id)
    {
        $categories = Category::where('organization_id', $id)->select('name', 'description', 'image')->get();
        return response()->json($categories, 200);

    }

    // category

    public function showCategories()
    {
        $success['allCategory'] = Category::select('id', 'name', 'description','image')->get();
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function showCampaigns()
    {
        $success['allCampaign'] = Campaign::select('id','title','description','image','target_amount','end_date')->get();
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function showOneCampaign($id)
    {
        // $categories = Category::where('organization_id', $id)->select('name', 'description', 'image')->get();
        // $success['reviews'] = Review::where('user_id', $user_id)->select('text')->get();
        $success['campaign'] = Campaign::where('id', $id)->select('id','title','description','image','target_amount','end_date')->get();
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function showOneCategory($id)
    {
        $success['category'] = Category::where('id', $id)->select('id','name','description','image')->get();
        $success['success'] = true;
        return response()->json($success, 200);
    }

}
