<?php
// get_indexsuche.php
$query = $_GET['query'];
$search = strtolower($query);
$indexPath = realpath(dirname(__FILE__) . '/index.php');
$results = [];

if ($indexPath !== false && file_exists($indexPath)) {
    $indexContent = file_get_contents($indexPath);

    if ($indexContent !== false) {
        // Split the content into lines and check for the search term in each line
        $lines = explode("\n", $indexContent);
        foreach ($lines as $lineNumber => $line) {
            if (stripos($line, $search) !== false) {
                $results[] = [
                    'line' => $line,
                    'line_number' => $lineNumber + 1
                ];
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($results);
