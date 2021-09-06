<?php

$name = $_POST['username'] ?? null;
$comment = $_POST['comment'] ?? null;

if (empty($name) || empty($comment)) {
    exit('Comment and Name are required');
}

$time = time();
$message = getMessageString($name, $comment, $time);
writeComment($message, $time);
redirect('index.php');

function getMessageString(string $name, string $comment, int $time): string
{
    $data = [
        'time' => $time,
        'name' => $name,
        'comment' => $comment,
    ];

    return serialize($data);
}

function getDirectory(): string
{
    $dir = __DIR__ . '/storage/' . date('Y-m-d');
    if (!is_dir($dir)) {
        mkdir($dir);
    }

    return $dir;
}

function writeComment(string $message, int $time): void
{
    $hash = md5($message);
    $dir = getDirectory();
    $file = "{$dir}/{$time}_{$hash}.log";

    file_put_contents($file, $message);
}

function redirect(string $url, int $status = 301, bool $terminate = true): void
{
    header("Location: {$url}", true, $status);
    if ($terminate) {
        exit;
    }
}
