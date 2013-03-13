<?php

namespace spec\Ampache\Factory;

use PHPSpec2\ObjectBehavior;

class AlbumFactory extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Factory\AlbumFactory');
    }

    function its_hydrateObject_should_return_null_when_id_is_empty()
    {
        $xml = new \SimpleXmlElement('<root id=""></root>');

        $this->hydrateObject($xml)->shouldReturn(null);
    }

    function its_hydrateObject_should_return_an_album_when_id_is_specify()
    {
        $xml = new \SimpleXmlElement('<root id="1"></root>');

        $this->hydrateObject($xml)->shouldReturnAnInstanceOf('\Ampache\Model\Album');
    }
}
