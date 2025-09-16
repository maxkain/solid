<?php

namespace App\Service\Product\ImportV2\ImporterAdapter;

use App\Utils\Importer\ImportReceiverInterface;

class Receiver implements ImportReceiverInterface
{
    private const SOURCE_PATH = 'http://somedomain.com/products/';

    public function receive(): array
    {
        return json_decode(file_get_contents(self::SOURCE_PATH), true);
    }
}
