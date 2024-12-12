<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view("Dashboard.Departments.index",compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.Departments.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            "name" => "required|string|unique:departments,name",
        ],
        
    [
                        'name.required' => 'يجب إدخال الاسم.',
                        'name.string' => 'يجب أن يكون الأسم نصًا.',
                        'name.unique' => 'هذا الاسم مستخدم من قبل.',
            ]
        
        );
        Department::create($validated);
        return back()->with("success","تم إضافة القسم بنجاح .");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return view("Dashboard.Departments.show",compact("department"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view("Dashboard.Departments.edit",compact("department"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => [ "string","required", Rule::unique('departments', 'name')->ignore($id), ],
],
[
            'name.required' => 'يجب إدخال الاسم.',
            'name.string' => 'يجب أن يكون الأسم نصًا.',
            'name.unique' => 'هذا الاسم مستخدم من قبل.',
]
        
            
        
        );
        
        $department = Department::findOrFail($id);
        $department->update($validated);
        return back()->with("success","تم تعديل القسم بنجاح .");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route("departments.index")->with("success","القسم تم حذفه بنجاح");
    }
}