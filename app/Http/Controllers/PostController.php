<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("Dashboard.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("Dashboard.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title_ar' => ['required', 'string','bail'],
                'title_en' => ['required', 'string','bail'],
                'content_ar' => ['required', 'string', 'bail'],
                'content_en' => ['required', 'string', 'bail'],
                'image' => ['nullable', 'max:5000', 'bail'],
                'category_id' => ['required', 'exists:categories,id'],
            ],
            [
                'title_ar.required' => 'يجب إدخال العنوان بالعربية.',
                'title_en.required' => 'يجب إدخال العنوان بالانجليزية.',
                'content_ar.required' => 'يجب إدخال المحتوى بالعربية.',
                'content_en.required' => 'يجب إدخال المحتوى بالانجليزية.',
                'image.max' => 'يجب ألا يتجاوز حجم الصورة 5 ميجابايت.',
                'category_id.required' => 'حقل التصنيف مطلوب.',
                'category_id.exists' => 'التصنيف المحدد غير موجود.',

            ]
        );
        $validated['user_id'] = auth()->id();

        if($validated['image']) $validated['image'] = Storage::putFile("Posts",$validated['image']);

        $post =  Post::create($validated);

        // if ($request->hasFile('image')) {
        //     $post->addMedia($request->file('image'))->toMediaCollection();
        // }
        
               // Debugging: Check if media was added successfully
            //    dd($post->getMedia('posts'));
        
        return back()->with("success", "تم إضافة المقال بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id); 
        return view('Dashboard.posts.show', compact('post'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view("Dashboard.posts.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'title_ar' => ['required', 'string', 'bail'],
                'title_en' => ['required', 'string', 'bail'],
                'content_ar' => ['required', 'string', 'bail'],
                'content_en' => ['required', 'string', 'bail'],
                'image' => ['nullable', 'max:5000',  'bail'],
                'category_id' => ['required', 'exists:categories,id'],
            ],

            [
                'title_ar.required' => 'يجب إدخال العنوان بالعربية.',
                'title_en.required' => 'يجب إدخال العنوان بالانجليزية.',
                'content_ar.required' => 'يجب إدخال المحتوى بالعربية.',
                'content_en.required' => 'يجب إدخال المحتوى بالانجليزية.',
                'image.max' => 'يجب ألا يتجاوز حجم الصورة 5 ميجابايت.',
                'category_id.required' => 'حقل التصنيف مطلوب.',
                'category_id.exists' => 'التصنيف المحدد غير موجود.',

            ]
        );

        $post = Post::findOrFail($id);

        if($validated['image']){
            Storage::delete($post->image);
            $validated['image'] = Storage::putFile("Posts",$validated['image']);
    }
        $post->update($validated);

        return back()->with("success", "تم تعديل المقال بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        // $post->clearMediaCollection("post");
        if($post->image){
            Storage::delete($post->image);
            }
        $post->delete();
        return redirect()->route("posts.index")->with("success", "تم حذف المقال بنجاح");
    }
}
