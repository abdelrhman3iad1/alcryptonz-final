<?php
namespace   App\Http\Controllers;

use App\Models\Partner;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\Team;

class HomeController extends Controller
{   
    public function index()
    {
        $posts = Post::all();
        $promotions = Promotion::all();
        $partners = Partner::all();
        $posts = Post::all();
        $teams = Team::all();
        return view('Web.index', compact('posts'));    
    }
}
