<?php

namespace Ampache\Factory;

class ObjectFactory
{
    public function build($xml)
    {
        $datas = array();

        if (false === $xml instanceOf \SimpleXmlElement) {
            throw new \InvalidArgumentException(sprintf('Expected parameter type %s got %s',
                'SimpleXmlElement',
                (is_object($xml) ? get_class($xml) : 'non object')
            ));
        }

        foreach ($xml->children() as $key => $element) {
            $factory = $this->getFactory($key);
            $datas[] = $factory->hydrateObject($element);
        }

        if (count($datas) === 1) {
            return $datas[0];
        }

        if (count($datas) === 0) {
            return null;
        }

        return $datas;
    }

    private function getFactory($xmlObjectName)
    {
        $className = sprintf('\Ampache\Factory\%sFactory', ucFirst($xmlObjectName));

        if (true === class_exists($className)) {
            return new $className;
        } else {
            throw new \Exception(sprintf('Factory \'%s\' does not exists', $className));
        }
    }
}
