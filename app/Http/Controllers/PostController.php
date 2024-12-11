<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

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
                'title' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/', 'bail'],
                'content' => ['required', 'string', 'bail'],
                'image' => ['nullable', 'max:2048', 'dimensions:min_width=300,min_height=300', 'bail'],
                'category_id' => ['required', 'exists:categories,id'],
            ],
            [
                'title.required' => 'حقل العنوان مطلوب.',
                'title.regex' => 'يمكن أن يحتوي العنوان فقط على أحرف وأرقام ومسافات.',
                'content.required' => 'المحتوى مطلوب.',
                'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',
                'image.dimensions' => 'يجب أن تكون أبعاد الصورة على الأقل 300x300 بكسل.',
                'category_id.required' => 'حقل التصنيف مطلوب.',
                'category_id.exists' => 'التصنيف المحدد غير موجود.',

            ]
        );
        $validated['user_id'] = auth()->id();
        $post =  Post::create($validated);

        if ($request->hasFile('image')) {
            // $post->addMediaFromRequest('image')->toMediaCollection('images');
            $post->addMedia($request['image'])->toMediaCollection('posts');

            // $post->addMedia($request['image'])->toMediaCollection('images');

        }
               // Debugging: Check if media was added successfully
            //    dd($post->getMedia('posts'));
        
        return back()->with("success", "تم إضافة منشورك بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id); // Find the post
        // $mediaUrl = $post->getFirstMediaUrl('Posts'); // Get the URL of
     // Get the URL of the first image attached to the post
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
                'title' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/', 'bail'],
                'content' => ['required', 'string', 'bail'],
                'image' => ['nullable', 'max:2048',  'bail'],
                'category_id' => ['required', 'exists:categories,id'],
            ],

            //'dimensions:min_width=300,min_height=300',
            [
                'title.required' => 'حقل العنوان مطلوب.',
                'title.regex' => 'يمكن أن يحتوي العنوان فقط على أحرف وأرقام ومسافات.',
                'content.required' => 'المحتوى مطلوب.',
                'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',
                // 'image.dimensions' => 'يجب أن تكون أبعاد الصورة على الأقل 300x300 بكسل.',
                'category_id.required' => 'حقل التصنيف مطلوب.',
                'category_id.exists' => 'التصنيف المحدد غير موجود.',

            ]
        );

        $post = Post::findOrFail($id);
        $post->update($validated);

        if ($request->hasFile('image')) {
            $post->clearMediaCollection('posts');
            $post->addMedia($request->file('image'))->toMediaCollection("posts");
        }

        return back()->with("success", "تم تعديل منشورك بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->clearMediaCollection("post");
        $post->delete();
        return redirect(url("dashboard/posts"))->with("success", "تم حذف منشورك بنجاح");
    }
}
