<?php

require_once 'vendor/autoload.php';

$client = new \Binance\Spot(
	[
		'showWeightUsage' => true, # optional, only if you need to display weight usage.
	]
);

# send a request to endpoint to GET /api/v3/time to check the server time
# see the document: https://github.com/binance/binance-spot-api-docs/blob/master/rest-api.md#check-server-time

$response = $client->time();

echo json_encode($response);