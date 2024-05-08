<?php

namespace App\Http\Controllers\SuperAdmin\Dashboard;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuperAdmin\OrganizationRequest;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['route'] = 'organization';
        $data['role'] = 'super admin';
        $data['organizations'] = Organization::paginate(4);
        return view('admin.organization.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['route'] = 'organization';
        $data['role'] = 'super admin';
        return view('admin.organization.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationRequest $request)
    {

        // return $request;
        $validated = $request->validated();
        $image = $request->file('image')->store('public/assets/uploads/Organization');

        // return($request);
        $organization = new Organization;

        $organization->name = $request->name;
        $organization->email = $request->email;
        $organization->address = $request->address;
        $organization->description =  $request->description;
        $organization->phone_number = $request->phone_number;
        $organization->password =  Hash::make($request->password);
        $organization->established_year = $request->established_year;
        $organization->registration_date = $request->registration_date;
        $organization->is_active = $request->is_active ? 1 : 0;
        $organization->has_delegate = $request->has_delegate ? 1 : 0;
        $organization->image = $image;

        $organization->save();

        return redirect()->route('organization.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data['route'] = 'organization';
        $data['organization'] = Organization::findOrFail($id);
        return view('admin.organization.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['route'] = 'organization';
        $data['organization'] = Organization::findOrFail($id);
        return view('admin.organization.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $request->validate([
                'name' =>             'required|string',
                'email' =>            'required|email',
                'address' =>          'required|string',
                'description' =>      'required|string',
                'phone_number' =>     'required|string',
                'image'    =>         'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
                'established_year' => 'required',
                'registration_date' => 'required',
                'is_active' =>         'nullable',
                'has_delegate' =>      'nullable'
            ]);
            // return $request;

                $organization = Organization::findAndFail($id);
                $image = $organization->image;
                if ($request->hasFile('image')) {
                    Storage::delete($image);
                    $image = $request->file('image')->store('public/assets/uploads/Organization');
                }
                $organization->update([
                    'name'  => $request->name,
                    'email' => $request->email,
                    'address'   => $request->address,
                    'description'   => $request->description,
                    'phone_number'  => $request->phone_number,
                    'established_year'  => $request->established_year,
                    'registration_date' => $request->registration_date,
                    'is_active' => $request->is_active ? 1 : 0,
                    'has_delegate'  => $request->has_delegate ? 1 : 0,
                    'image' => $image,
                ]);
                return redirect()->route('organization.index');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors('error', $e->getMessage());
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

          // return $id;
          $organization = Organization::findOrFail($id);
          Storage::delete($organization->image);
          $organization->delete();

          return redirect()->route('organization.index');

    }
}
