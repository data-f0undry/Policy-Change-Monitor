<?php
// PHP - REST API, no dependencies
$token = getenv("APIFY_TOKEN");
$actor = "data_foundry~policy-change-monitor";
$input = {"urls": ["https://policies.google.com/terms", "https://stripe.com/legal/terms"]};

$context = stream_context_create([
    "http" => [
        "method" => "POST",
        "header" => "Content-Type: application/json\r\n",
        "content" => json_encode($input),
    ],
]);

$run = json_decode(file_get_contents(
    "https://api.apify.com/v2/acts/$actor/runs?token=$token", false, $context
), true);

$datasetId = $run["data"]["defaultDatasetId"];
echo "dataset: $datasetId\n";
echo file_get_contents("https://api.apify.com/v2/datasets/$datasetId/items?token=$token&limit=5");
