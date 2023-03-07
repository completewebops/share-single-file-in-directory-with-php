<?php
if (isset($_GET['file']) && $_GET['file'] === 'upload.7z') {
    $file = 'upload.7z';
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    } else {
        echo "File not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Download Example</title>
</head>
<body>
    <h1>Download Files:</h1>
    <ul>
        <li>
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?file=upload.7z"; ?>">upload.7z</a>
        </li>
    </ul>
</body>
</html>
