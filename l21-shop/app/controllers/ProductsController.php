<?php

namespace app\controllers;

use app\models\entities\ProductEntity;
use app\views\dto\products\ListDTO;
use app\views\dto\products\ViewDTO;
use components\AbstractController;
use exceptions\NotFoundException;

class ProductsController extends AbstractController
{
    public function actionView(int $id): void
    {
        echo $this->render(
            'products/view',
            new ViewDTO(['product' => $this->findProduct($id)])
        );
    }

    public function actionList(): void
    {
        $products = ProductEntity::findAll();

        echo $this->render(
            'products/list',
            new ListDTO(['products' => $products])
        );
    }

    public function actionAdd(): void
    {
        if ($this->request()->isPost()) {
            $product = new ProductEntity();
            $product->load($this->request()->post()->all());
            $product->save();

            $this->response()->redirect("/products/view/id/{$product->id}");
        }
        echo $this->render('products/add');
    }

    private function findProduct(int $id): ProductEntity
    {
        $product = ProductEntity::findOne(['id' => $id]);
        if (!$product) {
            throw new NotFoundException("Product #{$id} is undefined");
        }

        return $product;
    }
}
