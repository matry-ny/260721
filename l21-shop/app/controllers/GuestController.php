<?php

namespace app\controllers;

use components\AbstractController;
use components\db\Delete;
use components\db\Insert;
use components\db\Select;
use components\db\Update;

class GuestController extends AbstractController
{
    public function actionLogin(): void
    {
//        $delete = (new Delete())
//            ->from('users')
//            ->where([
//                'id' => 9
//            ])
//            ->limit(1)
//            ->execute();
//        var_dump($delete);
//
//        exit;

//        $update = (new Update('users'))
//            ->set([
//                'name' => 'Test Edited 4',
//                'login' => 'test_edited 4'
//            ])
//            ->where([
//                'id' => 10
//            ])
//            ->limit(1)
//            ->execute();
//        var_dump($update);
//
//        exit;
//
//        $rand = mt_rand();
//        $rand2 = mt_rand();
//        $rand3 = mt_rand();
//        $insert = (new Insert())
//            ->into('users')
//            ->fields(['name', 'login', 'password'])
//            ->values([
//                ["Test {$rand}", "test_{$rand}", "pass_{$rand}"],
//                ["Test {$rand2}", "test_{$rand2}", "pass_{$rand2}"],
//                ["Test {$rand3}", "test_{$rand3}", "pass_{$rand3}"],
//            ])
//            ->execute()
//            ;
//
//        var_dump($insert);
//        exit;

        $select = (new Select(['id', 'name', 'login', 'password']))
            ->from('users')
//            ->where([
//                'id' => 1,
//                'login' => 'dkotenko'
//            ])
            ->limit(3)
            ->orderBy([
                'name' => SORT_ASC,
            ])
            ;
        var_dump($select->all(), $select->one());
        exit;

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
