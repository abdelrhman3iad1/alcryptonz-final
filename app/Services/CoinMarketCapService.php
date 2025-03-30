<?php

namespace App\Services;

use GuzzleHttp\Client;

class CoinMarketCapService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pro-api.coinmarketcap.com/v1/',
            'headers' => [
                'Accept' => 'application/json',
                'X-CMC_PRO_API_KEY' => '2b79a321-9557-4129-8f3c-dae1c5a2449c',
                'User-Agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36'
            ],
            'verify' => false, // Disable SSL verification
        ]);
    }

    /**
     * Fetch the latest cryptocurrency listings.
     *
     * @return array
     */
    public function getCryptocurrencyListings()
    {
        $response = $this->client->get('cryptocurrency/listings/latest');
        return json_decode($response->getBody(), true);
    }

    /**
     * Convert a cryptocurrency amount to another currency.
     *
     * @param float $amount
     * @param string $fromSymbol
     * @param string $toSymbol
     * @return array
     */
    public function convertCurrency($amount, $fromSymbol, $toSymbol)
    {
        $response = $this->client->get('tools/price-conversion', [
            'query' => [
                'amount' => $amount,
                'symbol' => $fromSymbol,
                'convert' => $toSymbol,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }
    public function getCryptocurrencies()
{
    $response = $this->client->get('cryptocurrency/quotes/latest', [ 
        'query' => [
            'symbol' => 'CTSI,BTC,ETH,USDT,BNB,SOL,STETH,XRP,USDC,DOGE,ADA,AVAX,SHIB,DOT,TRX,LTC,MATIC,WBTC,BCH,LINK,UNI,LEO,ATOM,XLM,OKB,ETC,FIL,ICP,HBAR,VET,APT'
        ],
    ]);
    
    return json_decode($response->getBody(), true);
}
public function getFiatCurrencies()
{
    $response = $this->client->get('fiat/map');
    $allFiatCurrencies = json_decode($response->getBody(), true);

    $desiredFiatCurrencies = [ 
        'USD', 'EUR', 'JPY', 'GBP', 'AUD', 'CAD', 'CHF', 'CNY', 'HKD', 'NZD',
        'SEK', 'KRW', 'SGD', 'NOK', 'MXN', 'INR', 'RUB', 'ZAR', 'TRY', 'BRL',
        'TWD', 'DKK', 'PLN', 'THB', 'IDR', 'HUF', 'CZK', 'CLP', 'PHP',
        'AED', 'COP', 'SAR', 'MYR', 'RON', 'ARS', 'BGN', 'ISK', 'HRK', 'LTL',
        'KWD', 'BHD', 'OMR', 'JOD', 'QAR', 'CRC', 'VND', 'NGN', 'PKR', 'EGP',
    
        'DZD', 'MAD', 'LYD', 'TND', 'SDG', 'YER', 'SOS', 'MRO', 'SYP', 'LBP', 'IQD', 'SSP'
    ];
    

   
    $filteredFiatCurrencies = array_filter($allFiatCurrencies['data'], function ($fiat) use ($desiredFiatCurrencies) {
        return in_array($fiat['symbol'], $desiredFiatCurrencies);
    });

    return ['data' => $filteredFiatCurrencies];
}
public function getPreciousMetals()
{
    
    $response = $this->client->get('cryptocurrency/map', [
        'query' => [
            'symbol' => 'XAU,XAG,XPT,XPD',
        ],
    ]);
    return json_decode($response->getBody(), true);
}
}