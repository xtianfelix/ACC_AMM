<?php
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=file.csv");
// Disable caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

function outputCSV($data) {
    $output = fopen("php://output", "w");
    foreach ($data as $row) {
        fputcsv($output, $row); // here you can change delimiter/enclosure
    }
    fclose($output);
}

outputCSV($rows);
?>