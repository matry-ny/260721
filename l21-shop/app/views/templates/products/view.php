<?php

use components\Template;
use app\views\dto\products\ViewDTO;

$variables = $this->getVariables();

/**
 * @var Template $this
 * @var ViewDTO $variables
 */

?>
<h1>PRODUCT VIEW</h1>
<?= $variables->name ?>
<?= $variables->age ?>
<?= $variables->gender ?>