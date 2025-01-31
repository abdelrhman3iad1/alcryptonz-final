<?php

namespace App\Http\Controllers;

use App\Services\CoinMarketCapService;
use Illuminate\Http\Request;

class CryptoConverterController extends Controller
{
    protected $coinMarketCapService;

    public function __construct(CoinMarketCapService $coinMarketCapService)
    {
        $this->coinMarketCapService = $coinMarketCapService;
    }
    public function index()
    {
       
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
    
        return view('converter', [
            'currencyOptions' => $currencyOptions,
        ]);
    }

    public function convert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'from' => 'required|string',
            'to' => 'required|string',
        ]);

        $amount = $request->input('amount');
        $fromSymbol = $request->input('from');
        $toSymbol = $request->input('to');

        $result = $this->coinMarketCapService->convertCurrency($amount, $fromSymbol, $toSymbol);

       
        $cryptocurrencies = $this->coinMarketCapService->getCryptocurrencies();
        $fiatCurrencies = $this->coinMarketCapService->getFiatCurrencies();
        $preciousMetals = $this->coinMarketCapService->getPreciousMetals();

        $currencyOptions = [];

       
        foreach ($cryptocurrencies['data'] as $crypto) {
            $currencyOptions[$crypto['symbol']] = $crypto['name'] . ' (' . $crypto['symbol'] . ')';
        }

       
        foreach ($fiatCurrencies['data'] as $fiat) {
            $currencyOptions[$fiat['symbol']] = $fiat['name'] . ' (' . $fiat['symbol'] . ')';
        }

        foreach ($preciousMetals['data'] as $metal) {
            $currencyOptions[$metal['symbol']] = $metal['name'] . ' (' . $metal['symbol'] . ')';
        }

        
        asort($currencyOptions);

        // return view('converter', [
        //     'result' => $result,
        //     'amount' => $amount,
        //     'from' => $fromSymbol,
        //     'to' => $toSymbol,
        //     'currencyOptions' => $currencyOptions,
        // ]);
        return response()->json([
            'result' => $result
        ]);
    }
}