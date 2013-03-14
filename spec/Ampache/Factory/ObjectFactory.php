<?php

namespace spec\Ampache\Factory;

use PHPSpec2\ObjectBehavior;

class ObjectFactory extends ObjectBehavior
{
    function its_build_should_return_SimpleXmlElement_if_factory_does_not_exists()
    {
        $xml = new \SimpleXmlElement('<root><fake></fake></root>');

        $this->build('plop', $xml)->shouldReturn($xml);
    }

    function its_build_should_return_a_loaded_array_when_action_is_plural_and_datas_are_not_empty()
    {
        $xml    = new \SimpleXmlElement('<root><artist id="1"></artist></root>');
        $artist = new \Ampache\Model\Artist;

        $artist->setId(1);

        $this->build('artists', $xml)->shouldBeLike(array($artist));
    }

    function its_build_should_return_an_empty_array_when_action_is_plural_and_datas_are_empty()
    {
        $xml = new \SimpleXmlElement('<root><artist></artist></root>');

        $this->build('artists', $xml)->shouldBeLike(array());
    }

    function its_build_should_return_an_object_when_action_is_plural_and_datas_are_not_empty()
    {
        $xml    = new \SimpleXmlElement('<root><artist id="1"></artist></root>');

        $this->build('artist', $xml)->shouldReturnAnInstanceOf('Ampache\Model\Artist');
    }

    function its_build_should_return_null_when_action_is_singular_and_datas_are_empty()
    {
        $xml    = new \SimpleXmlElement('<root><artist></artist></root>');

        $this->build('artist', $xml)->shouldReturn(null);
    }
}
