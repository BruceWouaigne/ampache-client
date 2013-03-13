<?php

namespace Ampache\Xml;

class Parser
{
    public function parse($string)
    {
        try {
            $xml = new \SimpleXmlElement($string);
        } catch (\Exception $ex) {
            $xml = new \SimpleXmlElement('<root></root>');
        }

        return $xml;
    }
}
