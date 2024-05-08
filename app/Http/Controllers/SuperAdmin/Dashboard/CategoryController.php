<?php

namespace App\Http\Controllers\SuperAdmin\Dashboard;

use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SuperAdmin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   $data['categories'] = Category::paginate(8);
        $data['categories'] = Category::with('organization')->select('id', 'organization_id', 'name', 'description', 'image')->paginate(5);
        //   return $data;
        $data['route'] = 'category';
        $data['role'] = 'admin';
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'category';
        $data['role'] = 'admin';
        $data['organizations'] = Organization::select('id', 'name')->get();
        return view('admin.category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image')->store('public/assets/uploads/Category');

        $category = new Category;

        $category->organization_id = $request->organization_id;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $image;

        $category->save();

        return redirect()->route('category.index');
        // return redirect()->route('category.index')->with('success','Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['category'] = Category::findOrFail($id);
        return redirect()->route('category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['category'] = Category::findOrFail($id);
        return redirect()->route('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes'
        ]);

        $category = Category::findOrFail($id);

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/category/';
            $file->move($path, $filename);

            if (File::exists($category->image)) {
                File::delete($category->image);
            }
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path . $filename,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);

        return redirect()->route('category.index')->with('message', 'Category Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if (File::exists($category->image)) {
            File::delete($category->image);
        }

        $category->delete();

        return redirect()->route('category.index')->with('message', 'Category Deleted');
    }
}
