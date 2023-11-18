<?php

namespace App\Service\Product\ImportV2\Importer;

use App\Entity\Product\Product;
use App\Utils\Importer\ImportableInterface;
use App\Utils\Importer\ImportMapperInterface;

class Mapper implements ImportMapperInterface
{
    public function map(ImportableInterface $importable, array $data): void
    {
        if (!$importable instanceof Product) {
            throw new \LogicException();
        }

        $importable->setSku($data['sku']);
        $importable->setName($data['name']);
    }
}
