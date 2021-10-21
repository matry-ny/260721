<?php

namespace app\controllers;

use components\AbstractController;

class ProductsController extends AbstractController
{
    public function actionView(int $id, string $filter, ?string $eeee = null)
    {
        var_dump('I AM ALIVE!!!', $id, $filter, $eeee);
    }
}
