<?php
/**
 * This is an example to call the account method get details of your account, including assets, balance, etc.
 * It will fire a HTTP request to the API endpoint: GET /api/v3/account
 * The API document: https://github.com/binance/binance-spot-api-docs/blob/master/rest-api.md#account-information-user_data
 * Binance API key is required for this method, otherwise exception will be returned.
 *
 */
require_once 'vendor/autoload.php';

$key = '';
$secret = '';
$client = new \Binance\Spot([
    'key'  => $key,
    'secret'  => $secret
]);

$account_info = $client->account();

# print all asset info
// echo json_encode($account_info);


$balances = $account_info['balances'];

# print non-zero balance
foreach ($balances as $balance) {
	$locked = floatval($balance['locked']);
	$free = floatval($balance['free']);
	$asset = $balance['asset'];
	if ($locked > 0 || $free > 0) {
		echo "{$asset} has free: {$free} and locked {$locked} balance.".PHP_EOL;
	}
}