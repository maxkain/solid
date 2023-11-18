<?php

namespace App\Service\Product\Import;

use App\Entity\Product\Product;
use App\Repository\Product\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

class ImportService
{
    private const SOURCE_PATH = 'http://somedomain.com/products/';

    public function __construct(
        private EntityManagerInterface $em,
        private ProductRepository $productRepository
    )
    {
    }

    public function import(): void
    {
        $em = $this->em;
        $productsData = json_decode(file_get_contents(self::SOURCE_PATH), true);
        $i = 0;
        foreach ($productsData as $productData) {
            $product = $this->productRepository->findOneBy(['sku' => $productData['sku']]);
            if (!$product) {
                $product = new Product();
            }

            $product->setSku($productData['sku']);
            $product->setName($productData['name']);
            //...set other fields

            $em->persist($product);

            $i++;
            if ($i % 100 == 0) {
                $em->flush();
                $em->clear();
            }
        }

        $em->flush();
        $em->clear();
    }
}
