<?php

namespace App\Service\Product\ImportV2;

class ImportService
{
    public function __construct(
       private ImporterInterface $importer
    )
    {
    }

    public function import(): void
    {
        $this->importer->import();
        //...do other things
    }
}
