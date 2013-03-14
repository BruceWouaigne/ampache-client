<?php

namespace spec\Ampache\Factory;

use PHPSpec2\ObjectBehavior;

class SongFactory extends ObjectBehavior
{
    function its_hydrateObject_should_return_null_when_time_is_empty()
    {
        $xml = new \SimpleXmlElement('<root time=""></root>');

        $this->hydrateObject($xml)->shouldReturn(null);
    }

    function its_hydrateObject_should_return_a_song_when_time_is_specify()
    {
        $xml = new \SimpleXmlElement('<root><time>12</time></root>');

        $this->hydrateObject($xml)->shouldReturnAnInstanceOf('\Ampache\Model\Song');
    }

}
