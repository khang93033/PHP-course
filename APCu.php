<?php
if (!apcu_exists('cached_data')) {
    $data = "Это кэшированные данные!";
    apcu_store('cached_data', $data, 60); // Кэш на 60 секунд
    echo "Данные сохранены в кэше.\n";
} else {
    echo "Данные из кэша: " . apcu_fetch('cached_data');
}
?>
