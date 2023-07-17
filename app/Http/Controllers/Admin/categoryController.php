<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::latest('id')->paginate(10);

        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $img_name = time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $img_name);
        category::create([
            'name' => $request->name,
            'image' => $img_name,
        ]);

        return redirect()
        ->route('admin.caregory.index')
        ->with('msg', 'Category added successfully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::find($id);

        return view('admin.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::find($id);

        $img_name = $category->image;
        if($request->hasFile('image')) {
            File::delete(public_path('uploads/'.$category->image));
            $img_name = time().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $img_name);
        }


        $category->update([
            'name' => $request->title,
            'image' => $img_name
        ]);

        return redirect()
        ->route('admin.categories.index')
        ->with('msg', 'Category updated successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id);
        // $category = category::destroy($id);
        // File::delete(public_path('uploads/'.$category->image));
        // $category->delete;

        return redirect()
        ->route('admin.caregory.index')
        ->with('msg', 'Category Deleted successfully')
        ->with('type', 'danger');
    }
}
