<?php

namespace App\Service\Product\EntityFactory;

use App\Entity\Product\Product;
use App\Utils\Importer\ImportableFactoryInterface;

class ProductFactory implements ImportableFactoryInterface
{
    public function create(): Product
    {
        return new Product();
    }
}
