<?php
// Repository: php-apcu-cache
// New Feature: Cache expiration check

$cacheTime = apcu_fetch("cache_time");
if ($cacheTime && time() - $cacheTime < 60) {
    echo "Data fetched from cache.\n";
} else {
    $data = ["value" => "This is fresh data"];
    apcu_store("cached_data", $data, 60);
    apcu_store("cache_time", time(), 60);
    echo "Data refreshed and cached.\n";
}
?>
