<?php
function findDuplicates($dir) {
    $files = [];
    foreach (scandir($dir) as $file) {
        if ($file === '.' || $file === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_file($path)) {
            $hash = md5_file($path);
            $files[$hash][] = $path;
        }
    }

    $duplicates = [];
    foreach ($files as $hash => $paths) {
        if (count($paths) > 1) {
            $duplicates[] = $paths;
        }
    }
    return $duplicates;
}

$duplicates = findDuplicates(__DIR__);
if (empty($duplicates)) {
    echo "Дубликаты не найдены.\n";
} else {
    echo "Найденные дубликаты:\n";
    print_r($duplicates);
}
?>
