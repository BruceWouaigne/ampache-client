<?php

namespace spec\Ampache\Factory;

use PHPSpec2\ObjectBehavior;

class PlaylistFactory extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Factory\PlaylistFactory');
    }

    function its_hydrateObject_should_return_null_when_id_is_empty()
    {
        $xml = new \SimpleXmlElement('<root id=""></root>');

        $this->hydrateObject($xml)->shouldReturn(null);
    }

    function its_hydrateObject_should_return_a_playlist_when_id_is_specify()
    {
        $xml = new \SimpleXmlElement('<root id="1"></root>');

        $this->hydrateObject($xml)->shouldReturnAnInstanceOf('\Ampache\Model\Playlist');
    }
}
