<?php

session_start();
session_destroy();

header('Location: /l10-chat/auth.php');
