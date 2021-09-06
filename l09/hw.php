<?php

$array = [
    'test' => 123123,
    'qwerty' => 'qqqq',
    'qwerty2' => 'qqqq',
    'data' => [
        1,
        2,
        3,
        ['test', 123],
    ],
    'q' => [
        'w' => [1, 2],
        'r' => [1, 2],
    ],
];

function countRecursive(array $array): int
{
    $count = 0;
    foreach ($array as $value) {
        $count++;

        if (is_array($value)) {
            $count += countRecursive($value);
        }
    }

    return $count;
}

var_dump(
    count($array, COUNT_RECURSIVE),
    countRecursive($array)
);

function printRecursive(array $array, int $tabs = 0): string
{
    $tabSymbol = '    ';
    $tab = str_repeat($tabSymbol, $tabs);

    $result = 'Array' . PHP_EOL;

    $result .= $tab . '(' . PHP_EOL;

    $keyTab = $tab . $tabSymbol;
    foreach ($array as $key => $value) {
        $result .= "{$keyTab}[{$key}] => ";
        if (is_array($value)) {
            $result .= printRecursive($value, $tabs + 2);
        } else {
            $result .= $value . PHP_EOL;
        }
    }

    $result .= $tab . ')' . PHP_EOL. PHP_EOL;

    return $result;
}

echo '<hr>';

echo '<table border="1" cellpadding="20"><tr>';
echo '<td valign="top"><pre>' . print_r($array, true) . '</pre></td>';
echo '<td valign="top"><pre>' . printRecursive($array) . '</pre></td>';
echo '</tr></table>';
