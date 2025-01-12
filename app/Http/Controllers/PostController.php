<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
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
                'title' => ['required', 'string','bail'],
                'content' => ['required', 'string', 'bail'],
                'image' => ['nullable', 'max:2048', 'dimensions:min_width=300,min_height=300', 'bail'],
                'category_id' => ['required', 'exists:categories,id'],
            ],
            [
                'title.required' => 'حقل العنوان مطلوب.',
                // 'title.regex' => 'يمكن أن يحتوي العنوان فقط على أحرف وأرقام ومسافات.',
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
            $post->addMedia($request->file('image'))->toMediaCollection();
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

    
    public function like(Post $post)
    {
        $user = auth()->user();
    
        if (!User::whereHas('likes', function ($query) use ($post) {
            $query->where('post_id', $post->id);
        })->where('id', $user->id)->exists()) {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
    
            if (User::whereHas('dislikes', function ($query) use ($post) {
                $query->where('post_id', $post->id);
            })->where('id', $user->id)->exists()) {
                Dislike::where('user_id', $user->id)
                      ->where('post_id', $post->id)
                      ->delete();
            }
    
            return back()->with('success', 'You liked the post.');
        } else {
            Like::where('user_id', $user->id)
                ->where('post_id', $post->id)
                ->delete();
    
            return back()->with('success', 'You removed your like.');
        }
    }
    /**
     * Dislike a post.
     */
    public function dislike(Post $post)
    {
        $user = auth()->user();
    
        if (!User::whereHas('dislikes', function ($query) use ($post) {
            $query->where('post_id', $post->id);
        })->where('id', $user->id)->exists()) {
            Dislike::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
    
            if (User::whereHas('likes', function ($query) use ($post) {
                $query->where('post_id', $post->id);
            })->where('id', $user->id)->exists()) {
                Like::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->delete();
            }
    
            return back()->with('success', 'You disliked the post.');
        } else {
            Dislike::where('user_id', $user->id)
                  ->where('post_id', $post->id)
                  ->delete();
    
            return back()->with('success', 'You removed your dislike.');
        }
    }

}


