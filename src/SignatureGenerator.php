<?php

namespace Rusmanab\Shopee;

use function hash_hmac;

class SignatureGenerator implements SignatureGeneratorInterface
{
    private $partnerKey;

    public function __construct(string $partnerKey)
    {
        $this->partnerKey = $partnerKey;
    }

    public function generateSignature(string $baseString): string
    {


        return hash_hmac('sha256', $baseString, $this->partnerKey, false);
    }
}
