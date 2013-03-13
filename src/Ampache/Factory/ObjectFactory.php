<?php

namespace Ampache\Factory;

class ObjectFactory
{
    public function build($action, $xml)
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

        $resultCount = count($datas);

        if ($resultCount > 0) {
            if ($resultCount === 1) {
                if (true === $this->isPluralAction($action)) {
                    return $datas;
                } else {
                    return $datas[0];
                }
            }
            return $datas;
        }

        return null;
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

    private function isPluralAction($action)
    {
        if (substr($action, -1) === 's') {
            return true;
        } else {
            return false;
        }
    }
}
