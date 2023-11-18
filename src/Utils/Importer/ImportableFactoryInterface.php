<?php

namespace App\Utils\Importer;

interface ImportableFactoryInterface
{
    public function create(): ImportableInterface;
}
