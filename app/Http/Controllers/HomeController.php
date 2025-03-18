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
        extract($this->allSideVaribles());
        return view('Web.Post', get_defined_vars());
    }
    public function privacy()
    {
        extract($this->allSideVaribles());
        return view('Web.privcy', get_defined_vars());
    }



    public function QA()
    {
        $qas = Qa::orderBy('created_at', 'desc')->get();
        extract($this->allSideVaribles());
        return view('web.qa', get_defined_vars());
    }

    /**
     * Search for Q&A entries
     */
    public function search(Request $request)
    {

        $validated = $request->validate([
            'searched' => 'required|string|max:190',
        ]);



        $searchQuery = $validated['searched'];
        $searchResults = Qa::where('question_ar', 'like', '%' . $searchQuery . '%')
            ->orderBy('id', 'desc')
            ->get();
        $qas = Qa::orderBy('id', 'desc')->get();
        // unset($searchQuery,$validated);
        // extract($this->allSideVaribles());
        // return redirect()->route('qa.index')
        // ->with(get_defined_vars());

        $categories = Category::all();
        $partners = Partner::all();
        return redirect()->route('qa.index')
            ->with('searchResults', $searchResults)
            ->with(compact('qas', 'categories', 'partners'));
    }
    public function AllPosts()
    {
        $posts =  Post::all();
        extract($this->allSideVaribles());
        return view('Web.show-all-posts', get_defined_vars());
    }

    public function categoriesRelated($id)
    {
        $categoryPosts = Post::where('category_id', "=", $id)->get();
        extract($this->allSideVaribles());
        return view("Web.categories-related", get_defined_vars());
    }
    public function cryptoNews()
    {
        $posts =  Post::where('category_id', 3)->get();
        extract($this->allSideVaribles());
        return view('Web.alcrypto-news', get_defined_vars());
    }
    public function AllPartnersPosts()
    {
        $partnerPosts = Post::whereNotNull('partner_id')->get();
        extract($this->allSideVaribles());
        return view("Web.show-all-partners-posts", get_defined_vars());
    }
    private function latestPartnerPosts(){
        $partnerPosts = Post::whereNotNull('partner_id')->orderBy('created_at','desc')->take(5)->get();
        return $partnerPosts;
    }
    private function latestLearningPosts(){
        $learningPosts = Post::where('category_id',"=",2)->orderBy('created_at','desc')->take(5)->get();
        return $learningPosts;
    }
    private function latestCryptoNewsPosts(){
        $cryptoNewsPosts = Post::where('category_id',"=",3)->orderBy('created_at','desc')->take(5)->get();
        return $cryptoNewsPosts;
    }
    private function getCategories(){
        $categories =  Category::all();
        return $categories;
    }

    private function allSideVaribles(){
        $cryptoNewsPosts = $this->latestCryptoNewsPosts();
        $learningPosts = $this->latestLearningPosts();
        $partnerPosts = $this->latestPartnerPosts();
        $categories = $this->getCategories();
        $data = [
            "cryptoNewsPosts"=>$cryptoNewsPosts,
            "learningPosts"=>$learningPosts,
            "partnerPosts"=>$partnerPosts,
            "categories"=>$categories,
        ];
        return $data; 
    }
}
