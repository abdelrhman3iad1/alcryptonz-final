<?php

namespace   App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\Qa;
use App\Models\Team;
use App\Services\CoinMarketCapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $coinMarketCapService;

    public function __construct(CoinMarketCapService $coinMarketCapService)
    {
        $this->coinMarketCapService = $coinMarketCapService;
    }
    public function index()
    {
        $posts = Post::all();
        $promotions = Promotion::all();
        $partners = Partner::all();
        $teams = Team::all();

        $cryptocurrencies = $this->coinMarketCapService->getCryptocurrencies();


        $fiatCurrencies = $this->coinMarketCapService->getFiatCurrencies();


        $preciousMetals = $this->coinMarketCapService->getPreciousMetals();


        $currencyOptions = [];


        if (isset($cryptocurrencies['data'])) {
            foreach ($cryptocurrencies['data'] as $symbol => $crypto) {
                $currencyOptions[$symbol] = $crypto['name'] . ' (' . $symbol . ')';
            }
        }


        if (isset($fiatCurrencies['data'])) {
            foreach ($fiatCurrencies['data'] as $fiat) {
                $currencyOptions[$fiat['symbol']] = $fiat['name'] . ' (' . $fiat['symbol'] . ')';
            }
        }


        if (isset($preciousMetals['data'])) {
            foreach ($preciousMetals['data'] as $metal) {
                $currencyOptions[$metal['symbol']] = $metal['name'] . ' (' . $metal['symbol'] . ')';
            }
        }


        asort($currencyOptions);

        return view('Web.index', compact('posts', 'currencyOptions', 'promotions', 'teams', 'partners'));
    }
    public function post($id)
    {
        $post = Post::with(['category', 'partner', 'user'])->findOrFail($id);

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(5)
            ->get();

        $categories = Category::all();
        $partners = Partner::all();
        $posts =  Post::all();
        return view('Web.Post', compact('post', 'relatedPosts', 'categories', 'partners', 'posts'));
    }
    public function privacy()
    {

        $categories = Category::all();
        $partners = Partner::all();
        $posts =  Post::all();
        return view('Web.privcy', compact('categories', 'partners', 'posts'));
    }



    public function QA()
    {
        $qas = Qa::orderBy('id', 'desc')->get();
        $categories = Category::all();
        $partners = Partner::all();
        $posts =  Post::all();

        return view('web.qa', compact('qas', 'categories', 'partners', 'posts'));
    }

    /**
     * Search for Q&A entries
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'searched' => 'required|string|max:190',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'الذي بحثت عنة كبير جدا');
        }

        $searchQuery = $request->input('searched');
        $searchResults = Qa::where('question_ar', 'like', '%' . $searchQuery . '%')
            ->orderBy('id', 'desc')
            ->get();
        $qas = Qa::orderBy('id', 'desc')->get();
        $categories = Category::all();
        $partners = Partner::all();

        return redirect()->route('qa.index')
            ->with('searchResults', $searchResults)
            ->with(compact('qas', 'categories', 'partners'));
    }
}
