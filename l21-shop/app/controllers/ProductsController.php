<?php

namespace app\controllers;

use app\views\dto\products\ViewDTO;
use components\AbstractController;

class ProductsController extends AbstractController
{
    public function actionView(int $id, string $filter, ?string $eeee = null): void
    {
        echo $this->render(
            'products/view',
            new ViewDTO(['name' => 'Dmytro', 'gender' => 'male', 'age' => 32])
        );
    }

    public function actionList(): void
    {
        echo $this->render('products/list');
    }
}