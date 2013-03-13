<?php

namespace Ampache\Factory;

class ErrorFactory implements FactoryInterface
{
    public function hydrateObject(\SimpleXmlElement $xml)
    {
        throw new \Ampache\Exception\AmpacheException(
            (string) $xml,
            (int) $xml['code']
        );
    }
}
