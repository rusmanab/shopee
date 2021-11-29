<?php

namespace Shopee;

interface SignatureGeneratorInterface
{
    public function generateSignature(string $baseString): string;
}
