<?php

require_once 'vendor/autoload.php';

$client = new \Binance\Spot(
	[
		'showWeightUsage' => true, # optional, only if you need to display weight usage.
	]
);

$response = $client->time();

echo json_encode($response);