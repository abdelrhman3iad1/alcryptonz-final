<?php
namespace   App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\Team;
use App\Services\CoinMarketCapService;

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
    
        return view('Web.index', compact('posts','currencyOptions' , 'promotions' ,'teams', 'partners'));    
    }

}
