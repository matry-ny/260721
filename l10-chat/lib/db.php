<?php

function getDBConnection(): mysqli
{
    static $db;

    if ($db === null) {
        $db = mysqli_connect(
            'db',
            'skillup_user',
            'skillup_pwd',
            'skillup_db'
        );
    }

    return $db;
}
