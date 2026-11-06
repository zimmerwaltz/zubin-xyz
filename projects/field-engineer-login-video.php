<?php
$videoPath = __DIR__ . '/../assets/images/streamlining-service-operations-for-field-engineers/login.mp4';

if (!is_file($videoPath) || !is_readable($videoPath)) {
    http_response_code(404);
    exit;
}

$fileSize = filesize($videoPath);
if ($fileSize === false || $fileSize === 0) {
    http_response_code(500);
    exit;
}

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if ($requestMethod !== 'GET' && $requestMethod !== 'HEAD') {
    header('Allow: GET, HEAD');
    http_response_code(405);
    exit;
}

$start = 0;
$end = $fileSize - 1;
$rangeHeader = $_SERVER['HTTP_RANGE'] ?? null;

if ($rangeHeader !== null) {
    if (preg_match('/^bytes=(\d*)-(\d*)$/', trim($rangeHeader), $matches) !== 1 || ($matches[1] === '' && $matches[2] === '')) {
        header('Content-Range: bytes */' . $fileSize);
        http_response_code(416);
        exit;
    }

    if ($matches[1] === '') {
        $suffixLength = (int) $matches[2];
        if ($suffixLength === 0) {
            header('Content-Range: bytes */' . $fileSize);
            http_response_code(416);
            exit;
        }
        $start = max(0, $fileSize - $suffixLength);
    } else {
        $start = (int) $matches[1];
        if ($matches[2] !== '') {
            $end = (int) $matches[2];
        }
    }

    if ($start >= $fileSize || $start > $end) {
        header('Content-Range: bytes */' . $fileSize);
        http_response_code(416);
        exit;
    }

    $end = min($end, $fileSize - 1);
    http_response_code(206);
    header('Content-Range: bytes ' . $start . '-' . $end . '/' . $fileSize);
}

$video = fopen($videoPath, 'rb');
if ($video === false || fseek($video, $start) !== 0) {
    if (is_resource($video)) {
        fclose($video);
    }
    http_response_code(500);
    exit;
}

$responseLength = $end - $start + 1;
header('Content-Type: video/mp4');
header('Accept-Ranges: bytes');
header('Content-Length: ' . $responseLength);

if ($requestMethod === 'HEAD') {
    fclose($video);
    exit;
}

$remaining = $responseLength;
while ($remaining > 0) {
    $chunk = fread($video, min(8192, $remaining));
    if ($chunk === false || $chunk === '') {
        fclose($video);
        error_log('Unable to read the complete field engineer login video.');
        exit;
    }

    echo $chunk;
    $remaining -= strlen($chunk);
}

fclose($video);
