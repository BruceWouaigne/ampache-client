<?php

namespace Ampache\Factory;

interface FactoryInterface
{
    public function hydrateObject(\SimpleXmlElement $xml);
}
