<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view("Dashboard.Partners.index",compact("partners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.Partners.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            "name" => "required|string|unique:partners,name",
            "description" => "nullable|string|bail",
            "website_url" => "nullable|bail",
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp|max:5120|bail"
        ],
        
    [
                        'name.required' => 'يجب إدخال الاسم.',
                        'name.string' => 'يجب أن يكون الأسم نصًا.',
                        'name.unique' => 'هذا الاسم مستخدم من قبل.',
                        'description.string' => 'يجب أن يكون الوصف نصًا.',
                        'website_url.url' => 'الرابط المدخل غير صحيح.',
                        'image.image' => 'يجب أن يكون الملف المرفوع صورة.',
                        'image.mimes' => 'الصورة يجب أن تكون من نوع png, jpg, jpeg, أو webp.',
                        'image.max' => 'حجم الصورة يجب أن لا يتجاوز 5 ميجابايت.',
            ]
        
        );
        if (!str_starts_with($validated['website_url'], 'http://') && !str_starts_with($validated['website_url'], 'https://')) {
            $validated['website_url'] = 'https://' . $validated['website_url'];
        }
        Partner::create($validated);
        return back()->with("success","تم إضافة الشريك بنجاح .");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view("Dashboard.Partners.show",compact("partner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view("Dashboard.Partners.edit",compact("partner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => [ "string","required", Rule::unique('partners', 'name')->ignore($id), ],
            "description" => "nullable|string|bail",
            "website_url" => "nullable|bail", 
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp|max:5120|bail" 
],
[
            'name.required' => 'يجب إدخال الاسم.',
            'name.string' => 'يجب أن يكون الأسم نصًا.',
            'name.unique' => 'هذا الاسم مستخدم من قبل.',
            'description.string' => 'يجب أن يكون الوصف نصًا.',
            'website_url.url' => 'الرابط المدخل غير صحيح.',
            'image.image' => 'يجب أن يكون الملف المرفوع صورة.',
            'image.mimes' => 'الصورة يجب أن تكون من نوع png, jpg, jpeg, أو webp.',
            'image.max' => 'حجم الصورة يجب أن لا يتجاوز 5 ميجابايت.',
]
        
            
        
        );
        if (!str_starts_with($validated['website_url'], 'http://') && !str_starts_with($validated['website_url'], 'https://')) {
            $validated['website_url'] = 'https://' . $validated['website_url'];
        }
        $partner = Partner::findOrFail($id);
        $partner->update($validated);
        return back()->with("success","تم تعديل تفاصيل الشريك بنجاح .");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->route("partners.index")->with("success","الشريك تم حذفه بنجاح");
    }
}