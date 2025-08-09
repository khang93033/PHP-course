<?php
// Repository: php-apcu-cache
// Description: A script to demonstrate caching using APCu.

$key = "cached_data";
$data = apcu_fetch($key);

if ($data === false) {
    // Simulate expensive operation
    $data = ["value" => "This is cached data"];
    apcu_store($key, $data, 60); // Cache for 60 seconds
    echo "Data fetched and cached.\n";
} else {
    echo "Data fetched from cache.\n";
}

print_r($data);
?>
