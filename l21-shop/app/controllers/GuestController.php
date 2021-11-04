<?php

namespace app\controllers;

use app\models\User;
use components\AbstractController;

class GuestController extends AbstractController
{
    public function actionLogin(): void
    {
        if ($this->request()->isPost()) {
            $user = User::findOne(['login' => $this->request()->post()->get('login')]);
            if ($user && $user->login($this->request()->post()->get('password'))) {
                $this->response()->redirect('/');
            }

            $this->session()->addFlash(
                'loginErrors', ['login' => 'Login or password is incorrect']
            );
        }
        echo $this->render('guest/login');
    }
}
