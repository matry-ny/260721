<?php

namespace app\views\dto\products;

use app\views\dto\AbstractViewDTO;

class ViewDTO extends AbstractViewDTO
{
    public string $name;
    public string $gender;
    public int $age;
}
