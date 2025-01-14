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
                'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_API_KEY'),
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
            // 'limit' => 100, // Adjust the limit as needed
             'symbol' => 'BTC,ETH,USDT,XRP,BNB,SOL,DOGE,USDC,ADA,STETH'
        ],
    ]);
    return json_decode($response->getBody(), true);
}
public function getFiatCurrencies()
{
    $response = $this->client->get('fiat/map');
    $allFiatCurrencies = json_decode($response->getBody(), true);

    $desiredFiatCurrencies = ['USD', 'ALL', 'DZD', 'ARS', 'AMD', 'AUD', 'AZN', 'BHD', 'BDT', 'BYN'];

   
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