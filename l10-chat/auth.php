<?php

require_once __DIR__ . '/lib/db.php';

$error = '';

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;

    if (empty($login) || empty($password)) {
        $error = 'Login and password are required';
    } else {
        require_once __DIR__ . '/lib/user.php';
        $isAuthenticated = login($login, $password, $error);
        if ($isAuthenticated) {
            header('Location: /l10-chat/index.php');
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>LogIn</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="./css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <div class="form-floating">
            <input type="email"
                   class="form-control"
                   id="floatingInput"
                   name="login"
                   placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password"
                   class="form-control"
                   id="floatingPassword"
                   name="password"
                   placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021–<?= date('Y') ?></p>
    </form>
</main>

</body>
</html>
