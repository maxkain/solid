<?php

namespace App\Utils\Importer;

interface ImportReceiverInterface
{
    public function receive(): array;
}
