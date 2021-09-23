<?php

session_start();

$user = $_SESSION['user'] ?? null;
if (empty($user)) {
    header('Location: /l10-chat/auth.php');
}
