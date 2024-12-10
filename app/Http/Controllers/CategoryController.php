<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect(url("dashboard/categories"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $category= Category::findOrFail($id);
        return view('Dashboard.Categories.show' , compact("category"));
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        $categories = Category::all();
        return view("Dashboard.Categories.index" ,compact("categories"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(url("dashboard/categories"));
    }
}
