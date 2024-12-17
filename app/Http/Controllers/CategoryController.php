<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("Dashboard.Categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.Categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name',
        ],[
                        'name.required' => 'يجب إدخال الاسم.',
                        'name.string' => 'يجب أن يكون الأسم نصًا.',
                        'name.unique' => 'هذا الاسم مستخدم من قبل.',
        ]);

        Category::create($validated);
        return back()->with("success","تم إضافة التصنيف بنجاح .");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $category = Category::findOrFail($id);
        return view('Dashboard.Categories.show', compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {

        $category = Category::findOrFail($id);
        return view("Dashboard.Categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => [ "string","required", Rule::unique('categories', 'name')->ignore($id), ],
        ],[
            
                'name.required' => 'يجب إدخال الاسم.',
                'name.string' => 'يجب أن يكون الأسم نصًا.',
                'name.unique' => 'هذا الاسم مستخدم من قبل.',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);
        return back()->with("success","تم تعديل التصنيف بنجاح .");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("categories.index")->with("success","التصنيف تم حذفه بنجاح");
    }
}
