<?php

namespace App\Utils\Importer;

use Doctrine\ORM\EntityManagerInterface;

class Importer
{
    public function __construct(
        private EntityManagerInterface $em,
    )
    {
    }

    public function import(
        ImportableRepositoryInterface $importableRepository,
        ImportableFactoryInterface $importableFactory,
        ImportMapperInterface $importMapper,
        ImportReceiverInterface $importReceiver,
        string $identityFieldName,
        int $blockSize = 100
    ): void
    {
        $em = $this->em;
        $importData = $importReceiver->receive();
        $i = 0;
        foreach ($importData as $importItemData) {
            $identityFieldValue = $importItemData[$identityFieldName];
            $importable = $importableRepository->findOneByImportIdentity($identityFieldValue);
            if (!$importable) {
                $importable = $importableFactory->create();
            }

            $importMapper->map($importable, $importItemData);
            $em->persist($importable);

            $i++;
            if ($i % $blockSize == 0) {
                $em->flush();
                $em->clear();
            }
        }

        $em->flush();
        $em->clear();
    }
}
