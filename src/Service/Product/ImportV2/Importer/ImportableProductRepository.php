<?php

namespace App\Service\Product\ImportV2\Importer;

use App\Entity\Product\Product;
use App\Repository\Product\ProductRepository;
use App\Utils\Importer\ImportableInterface;
use App\Utils\Importer\ImportableRepositoryInterface;

class ImportableProductRepository implements ImportableRepositoryInterface
{
    public function __construct(
        private ProductRepository $productRepository,
    )
    {
    }

    public function findOneByImportIdentity(mixed $value): ?ImportableInterface
    {
        return $this->productRepository->findOneBy([Product::IMPORT_IDENTITY_FIELD => $value]);
    }
}
