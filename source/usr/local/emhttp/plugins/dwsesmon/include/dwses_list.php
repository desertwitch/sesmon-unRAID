<?php

header('Content-Type: application/json');

$baseDir = '/var/lib/sesmon';
$result = [];

$subdirs = array_filter(glob($baseDir . '/*'), 'is_dir');

foreach ($subdirs as $subdir) {
    $folderName = basename($subdir);
    $folderData = [
        'raw' => null,
        'parsed' => null,
        'alerts' => []
    ];

    $files = scandir($subdir);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;

        if ($file === 'current.json') {
            $folderData['raw'] = $file;
        } elseif ($file === 'current_parsed.json') {
            $folderData['parsed'] = $file;
        } elseif (strpos($file, 'change-') === 0) {
            $folderData['alerts'][] = $file;
        }
    }

    rsort($folderData['alerts']);

    $result[$folderName] = $folderData;
}

echo json_encode($result, JSON_PRETTY_PRINT);

?>
