<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Validation\Rule;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view("Dashboard.Teams.index",compact("teams"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view("Dashboard.Teams.create",compact("departments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            "name" => "required|string|unique:teams,name",
            "department_id" => "required|exists:departments,id",
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp|max:5120|bail"
        ],
        
    [
                        'name.required' => 'يجب إدخال الاسم.',
                        'name.string' => 'يجب أن يكون الأسم نصًا.',
                        'name.unique' => 'هذا الاسم مستخدم من قبل.',
                        'department_id.required' => 'يجب تحديد قسم العضو',
                        'department_id.exists' => 'القسم المحدد غير موجود في قاعدة البيانات.',
                        'image.image' => 'يجب أن يكون الملف المرفوع صورة.',
                        'image.mimes' => 'الصورة يجب أن تكون من نوع png, jpg, jpeg, أو webp.',
                        'image.max' => 'حجم الصورة يجب أن لا يتجاوز 5 ميجابايت.',
            ]
        
        );
        Team::create($validated);
        return back()->with("success","تم إضافة العضو بنجاح .");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        return view("Dashboard.Teams.show",compact("team"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        $departments = Department::all();
        return view("Dashboard.Teams.edit",compact("team","departments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => [ "string","required", Rule::unique('teams', 'name')->ignore($id), ],
            "department_id" => "required|exists:departments,id",
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp|max:5120|bail"
],
[
                        'name.required' => 'يجب إدخال الاسم.',
                        'name.string' => 'يجب أن يكون الأسم نصًا.',
                        'name.unique' => 'هذا الاسم مستخدم من قبل.',
                        'department_id.required' => 'يجب تحديد قسم العضو',
                        'department_id.exists' => 'القسم المحدد غير موجود في قاعدة البيانات.',
                        'image.image' => 'يجب أن يكون الملف المرفوع صورة.',
                        'image.mimes' => 'الصورة يجب أن تكون من نوع png, jpg, jpeg, أو webp.',
                        'image.max' => 'حجم الصورة يجب أن لا يتجاوز 5 ميجابايت.',
]
        );
        $team = Team::findOrFail($id);
        $team->update($validated);
        return back()->with("success","تم تعديل تفاصيل العضو بنجاح .");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route("teams.index")->with("success","العضو تم حذفه بنجاح");
    }
}