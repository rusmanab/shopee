<?php

namespace Rusmanab\Shopee;

interface SignatureGeneratorInterface
{
    public function generateSignature(string $baseString): string;
}
