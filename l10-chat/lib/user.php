<?php

function login(string $login, string $password, &$error): bool
{
//    password_hash('1111111',  PASSWORD_ARGON2ID)
    $users = [
        [
            'login' => 'test@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$NHBNNkdwUTBJbXExSGdvZA$E72C8wQvrHnaioH0SLgkg4eXzpWqhaZNvmP/3Z6IpE0',
            // test123
            'name' => 'Test User',
        ],
        [
            'login' => 'd.kotenko@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$R0VhVzFiM092TE9Tc0NEYQ$pIiQt844uuO0slqrlbaeMiZNCbWIvWNWuGawxc3e73k',
            // qwerty
            'name' => 'Dmytro Kotenko',
        ],
        [
            'login' => 'b.simpson@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$LkhQaS85Y3FGRDFxRU5ybA$p8QJnPnsij/bhJNCISNI4UEx3VixD5ueHwpRI51vSbY',
            // 1111111
            'name' => 'Bart Simpson',
        ],
    ];

    $user = current(
        array_filter(
            $users,
            static fn ($item) => $item['login'] === $login
        )
    );
    if (empty($user)) {
        $error = 'Login or password is incorrect';
        return false;
    }

    $isValidPassword = password_verify($password, $user['password']);
    if (!$isValidPassword) {
        $error = 'Login or password is incorrect';
        return false;
    }

    session_start();
    $_SESSION['user'] = $user;

    return true;
}
