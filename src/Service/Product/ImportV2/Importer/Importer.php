<?php

namespace App\Service\Product\ImportV2\Importer;

use App\Entity\Product\Product;
use App\Utils\Importer\Importer as BaseImporter;
use App\Service\Product\ImportV2\ImporterInterface;
use App\Service\Product\EntityFactory\ProductFactory;

class Importer implements ImporterInterface
{
    public function __construct(
        private BaseImporter $importer,
        private Mapper $mapper,
        private Receiver $receiver,
        private ImportableProductRepository $productRepository,
        private ProductFactory $productFactory
    )
    {
    }

    public function import(): void
    {
        $this->importer->import($this->productRepository, $this->productFactory, $this->mapper,
            $this->receiver, Product::IMPORT_IDENTITY_FIELD, 200);
    }
}
