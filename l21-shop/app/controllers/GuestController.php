<?php

namespace app\controllers;

use components\AbstractController;

class GuestController extends AbstractController
{
    public function actionLogin(): void
    {
        if ($this->request()->isPost()) {
//            $user = new User();
//            $user->name = 'Dmytro';
//            $user->age = 18;
//            $user->save();
//
//            $user = User::findOne(['name' => 'Dmytro']);
//            $user->name = 'Dmytro 2';
//            $user->save();
//
//            $user->delete();


            var_dump($this->db()->getConnection());
            var_dump($this->request()->post()->all());
        }
        echo $this->render('guest/login');
    }
}
