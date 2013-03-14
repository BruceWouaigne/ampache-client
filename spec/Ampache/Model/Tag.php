<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class Tag extends ObjectBehavior
{
    function it_should_have_an_id_mutator()
    {
        $this->setId(1);
        $this->getId()->shouldReturn(1);
    }

    function it_should_have_a_name_mutator()
    {
        $this->setName('plop');
        $this->getName()->shouldReturn('plop');
    }

    function it_should_have_an_albumNumber_mutator()
    {
        $this->setAlbumNumber(1);
        $this->getAlbumNumber()->shouldReturn(1);
    }

    function it_should_have_an_artistNumber_mutator()
    {
        $this->setArtistNumber(1);
        $this->getArtistNumber()->shouldReturn(1);
    }

    function it_should_have_a_songNumber_mutator()
    {
        $this->setSongNumber(1);
        $this->getSongNumber()->shouldReturn(1);
    }

    function it_should_have_a_videoNumber_mutator()
    {
        $this->setVideoNumber(1);
        $this->getVideoNumber()->shouldReturn(1);
    }

    function it_should_have_a_playlistNumber_mutator()
    {
        $this->setPlaylistNumber(1);
        $this->getPlaylistNumber()->shouldReturn(1);
    }

    function it_should_have_a_streamNumber_mutator()
    {
        $this->setStreamNumber(1);
        $this->getStreamNumber()->shouldReturn(1);
    }
}
