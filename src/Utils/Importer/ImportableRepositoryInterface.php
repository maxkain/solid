<?php

namespace App\Utils\Importer;

interface ImportableRepositoryInterface
{
    public function findOneByImportIdentity(mixed $value): ?ImportableInterface;
}
