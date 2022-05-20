<?php

require_once 'vendor/autoload.php';

$client = new \Binance\Spot();

$response = $client->ticker24hr(['symbol' => 'BNBUSDT']);

# the example of the response from server:
# {"symbol":"BNBUSDT","priceChange":"12.10000000","priceChangePercent":"4.078","weightedAvgPrice":"303.75834905","prevClosePrice":"296.60000000","lastPrice":"308.80000000","lastQty":"1.03300000","bidPrice":"308.70000000","bidQty":"212.83300000","askPrice":"308.80000000","askQty":"137.37000000","openPrice":"296.70000000","highPrice":"312.00000000","lowPrice":"293.50000000","volume":"704357.57000000","quoteVolume":"213954492.60350000","openTime":1652940741208,"closeTime":1653027141208,"firstId":552332709,"lastId":552682724,"count":350016}
echo json_encode($response);

echo PHP_EOL;

# get the last price
$last_price = $response['lastPrice'];

echo "last price is : {$last_price}";