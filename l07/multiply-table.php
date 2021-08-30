<?php

$minCol = $_GET['minCol'] ?? 2;
$maxCol = $_GET['maxCol'] ?? 9;

for ($col = $minCol; $col <= $maxCol; $col++) {
    for ($row = 1; $row <= 10; $row++) {
        $res = $col * $row;
        echo "{$col} x {$row} = {$res}<br>";
    }
    echo '<br>';
}