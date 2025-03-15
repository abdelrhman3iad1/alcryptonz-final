<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\Partner;
use App\Models\Post;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view("Dashboard.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $partners = Partner::all();
        return view("Dashboard.posts.create", compact("categories","partners"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate(
            [
                'title_ar' => ['required', 'string', 'bail'],
                'title_en' => ['required', 'string', 'bail'],
                'content_ar' => ['required', 'string', 'bail'],
                'content_en' => ['required', 'string', 'bail'],
                'image' => ['nullable', 'image', 'max:5000'], 
                'category_id' => ['required', 'exists:categories,id'],
                'partner_id' => ['nullable', 'exists:partners,id','bail'],
            ],
            [
                'title_ar.required' => 'يجب إدخال العنوان بالعربية.',
                'title_en.required' => 'يجب إدخال العنوان بالانجليزية.',
                'content_ar.required' => 'يجب إدخال المحتوى بالعربية.',
                'content_en.required' => 'يجب إدخال المحتوى بالانجليزية.',
                'image.image' => 'يجب أن يكون الملف المرفق صورة.',
                'image.mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif.',
                'image.max' => 'يجب ألا يتجاوز حجم الصورة 5 ميجابايت.',
                'category_id.required' => 'حقل التصنيف مطلوب.',
                'category_id.exists' => 'التصنيف المحدد غير موجود.',
                'partner_id.exists' => 'الشريك المحدد غير موجود.',
            ]
        );
    
        // $validated['user_id'] = auth()->id();
    
        if ($request->hasFile('image')) {
            $validated['image'] = "storage/" . $this->uploadImage($validated['image'], 'Posts/image');
        }
        $validated['user_id']=auth()->user()->id;
        Post::create($validated);
    
        return back()->with('success', 'تم إضافة المقال بنجاح');
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
        $partners = Partner::all();
        return view("Dashboard.posts.edit", compact("post","partners","categories"));
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
                'partner_id' => ['nullable', 'exists:partners,id','bail'],
            ],

            [
                'title_ar.required' => 'يجب إدخال العنوان بالعربية.',
                'title_en.required' => 'يجب إدخال العنوان بالانجليزية.',
                'content_ar.required' => 'يجب إدخال المحتوى بالعربية.',
                'content_en.required' => 'يجب إدخال المحتوى بالانجليزية.',
                'image.max' => 'يجب ألا يتجاوز حجم الصورة 5 ميجابايت.',
                'category_id.required' => 'حقل التصنيف مطلوب.',
                'category_id.exists' => 'التصنيف المحدد غير موجود.',
                'partner_id.exists' => 'الشريك المحدد غير موجود.',
            ]
        );

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($post->image) {
                $post->image = str_replace('storage', '', $post->image);
                $this->deleteImage($post->image);
            }
    
            $validated['image'] = $this->uploadImage($request->file('image'), 'Posts/image');
        } else {
            unset($validated['image']);
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
    
        if ($post->image) {
            $post->image = str_replace('storage', '', $post->image);
            $this->deleteImage($post->image);
        }
    
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'تم حذف المقال بنجاح');
    }
                    
    
    public function like(Post $post)
    {
        $user = auth()->user();
        $message = '';
    
        // Check if the user has already disliked the post
        if ($user->dislikes()->where('post_id', $post->id)->exists()) {
            // Remove the dislike
            $user->dislikes()->where('post_id', $post->id)->delete();
        }
    
        // Toggle the like
        if ($user->likes()->where('post_id', $post->id)->exists()) {
            // Remove the like
            $user->likes()->where('post_id', $post->id)->delete();
            $message = 'You removed your like.';
        } else {
            // Add the like
            $user->likes()->create(['post_id' => $post->id]);
            $message = 'You liked the post.';
        }
    
        return response()->json([
            'likes' => $post->likes()->count(),
            'dislikes' => $post->dislikes()->count(),
            'message' => $message
        ]);
    }
    
    public function dislike(Post $post)
    {
        $user = auth()->user();
        $message = '';
    
        // Check if the user has already liked the post
        if ($user->likes()->where('post_id', $post->id)->exists()) {
            // Remove the like
            $user->likes()->where('post_id', $post->id)->delete();
        }
    
        // Toggle the dislike
        if ($user->dislikes()->where('post_id', $post->id)->exists()) {
            // Remove the dislike
            $user->dislikes()->where('post_id', $post->id)->delete();
            $message = 'You removed your dislike.';
        } else {
            // Add the dislike
            $user->dislikes()->create(['post_id' => $post->id]);
            $message = 'You disliked the post.';
        }
    
        return response()->json([
            'likes' => $post->likes()->count(),
            'dislikes' => $post->dislikes()->count(),
            'message' => $message
        ]);
    } 
    public function search(Request $request)
    {
        $query = $request->input('query');    
        $posts = Post::where('title_ar', 'LIKE', '%' . $query . '%')
                     ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                     ->orWhere('content_ar', 'LIKE', '%' . $query . '%')
                     ->orWhere('content_en', 'LIKE', '%' . $query . '%')
                     ->orWhereHas('category', function ($q) use ($query) {
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                     ->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $partners = Partner::all();

        return view('Web.search-result', compact('posts','categories','partners'));
    }
    
}