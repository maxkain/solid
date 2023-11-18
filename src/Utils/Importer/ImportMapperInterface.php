<?php

namespace App\Utils\Importer;

interface ImportMapperInterface
{
    public function map(ImportableInterface $importable, array $data): void;
}
