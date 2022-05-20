<?php
/**
 * This is an example to call the account method to place or get order. This may be one of the most common methods used in clients.
 *
 * Binance API key is required for this method, otherwise exception will be returned.
 *
 */
require_once 'vendor/autoload.php';

$key = '';
$secret = '';

$client = new \Binance\Spot([
    'key'  => $key,
    'secret'  => $secret,
    'baseURL' => 'https://testnet.binance.vision' // this is for testnet; Set to  https://api.binance.com for production, or just omit this parameter.
]);

# place a new order.
# see more parameters from https://github.com/binance/binance-spot-api-docs/blob/master/rest-api.md#new-order--trade
$response = $client->newOrder('BNBUSDT', 'BUY', 'LIMIT',
    [
        'quantity' => 1,
        'price' => 200,
        'timeInForce' => 'GTC',
        'newOrderRespType' => 'FULL',
        'recvWindow' => 5000
    ]
);

# example of response:
# {"symbol":"BNBUSDT","orderId":2183808,"orderListId":-1,"clientOrderId":"Z7nH7ZKfqDWxyiyxw8B3Zc","transactTime":1653032863485,"price":"200.00000000","origQty":"1.00000000","executedQty":"0.00000000","cummulativeQuoteQty":"0.00000000","status":"NEW","timeInForce":"GTC","type":"LIMIT","side":"BUY","fills":[]}
echo "Placing a new order, and get response:".PHP_EOL;
echo json_encode($response);
echo PHP_EOL;

$orderId = $response['orderId'];

# get an order details
$order_details = $client->getOrder('BNBUSDT', ['orderId' => $orderId]);
echo "Getting order details:".PHP_EOL;
echo json_encode($order_details);

# cancel an order. Please note that if the order is cancelled, filled or even expired, then cancellation can fail.
echo "Cancelling order with orderId: {$orderId}".PHP_EOL;
try {
    $cancel_result = $client->cancelOrder('BNBUSDT', ['orderId' => $response['orderId']]);
} catch (\Binance\Exception\ClientException $e) {
    echo $e->getMessage();
}

echo "order details after cancel:".PHP_EOL;
echo json_encode($cancel_result);