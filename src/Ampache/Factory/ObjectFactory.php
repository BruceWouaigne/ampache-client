<?php

namespace Ampache\Factory;

class ObjectFactory
{
    public function build($action, \SimpleXmlElement $xml)
    {
        $datas = array();

        foreach ($xml->children() as $key => $element) {
            $factory = $this->getFactory($key);
            $object  = $factory->hydrateObject($element);

            if (null !== $object) {
                $datas[] = $object;
            }
        }

        $resultCount = count($datas);

        if ($resultCount > 0) {
            if ($resultCount === 1) {
                if (false === $this->isPluralAction($action)) {
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
