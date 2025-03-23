<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Promotion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUpload;


class PromotionController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view("Dashboard.Promotions.index",compact("promotions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.Promotions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            "name" => "required|string|unique:promotions,name",
            "description" => "required|string",
            "website_url" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg,webp|max:5120|"
        ],
        
    [
                        'name.required' => 'يجب إدخال الاسم.',
                        'name.string' => 'يجب أن يكون الأسم نصًا.',
                        'name.unique' => 'هذا الاسم مستخدم من قبل.',
                        'description.string' => 'يجب أن يكون الوصف نصًا.',
                        'description.required' => 'يجب إدخال وصف.',
                        'website_url.required' => 'يجب إدخال لينك.',
                        'image.required' => 'يجب إدخال صورة.',
                        'website_url.url' => 'الرابط المدخل غير صحيح.',
                        'image.image' => 'يجب أن يكون الملف المرفوع صورة.',
                        'image.mimes' => 'الصورة يجب أن تكون من نوع png, jpg, jpeg, أو webp.',
                        'image.max' => 'حجم الصورة يجب أن لا يتجاوز 5 ميجابايت.',
            ]
        
        );
        if (!str_starts_with($validated['website_url'], 'http://') && !str_starts_with($validated['website_url'], 'https://')) {
            $validated['website_url'] = 'https://' . $validated['website_url'];
        }
        // if($validated['image']) $validated['image'] = Storage::putFile("Promotions",$validated['image']);
        if ($request->hasFile('image')) {
            $validated['image'] = "storage/" . $this->uploadImage($validated['image'], 'Promotions/image');
        }
        Promotion::create($validated);
        return back()->with("success","تم إضافة العرض الترويجي بنجاح .");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        return view("Dashboard.Promotions.show",compact("promotion"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        return view("Dashboard.Promotions.edit",compact("promotion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => [ "string","required", Rule::unique('promotions', 'name')->ignore($id), ],
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
        $Promotion = Promotion::findOrFail($id);

           if ($request->hasFile('image')) {
            if ($Promotion->image) {
                $Promotion->image = str_replace('storage', '', $Promotion->image);
                $this->deleteImage($Promotion->image);
            }
    
            $validated['image'] = $this->uploadImage($request->file('image'), 'Promotions/image');
        } else {
            unset($validated['image']);
        }
        $Promotion->update($validated);
        return back()->with("success","تم تعديل العرض الترويجي بنجاح .");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->image) {
            $promotion->image = str_replace('storage', '', $promotion->image);
            $this->deleteImage($promotion->image);
        }
        $promotion->delete();
        return redirect()->route("promotions.index")->with("success","العرض الترويجي تم حذفه بنجاح");
    }
}
