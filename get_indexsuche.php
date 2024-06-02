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
                // Extract 3-4 sentences around the search term
                $cleanLine = strip_tags($line);
                $sentences = preg_split('/([.!?])/', $cleanLine, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
                $resultSnippet = '';
                $found = false;

                foreach ($sentences as $i => $sentence) {
                    if (stripos($sentence, $search) !== false) {
                        $resultSnippet .= (isset($sentences[$i-2]) ? $sentences[$i-2] : '') . (isset($sentences[$i-1]) ? $sentences[$i-1] : '') . $sentence . (isset($sentences[$i+1]) ? $sentences[$i+1] : '') . (isset($sentences[$i+2]) ? $sentences[$i+2] : '');
                        $found = true;
                        break;
                    }
                }

                $highlightedSnippet = str_ireplace($query, "<mark>$query</mark>", $resultSnippet);
                $results[] = [
                    'line' => $highlightedSnippet,
                    'line_number' => $lineNumber + 1
                ];
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($results);
