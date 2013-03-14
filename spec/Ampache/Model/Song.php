<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class Song extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Model\Song');
    }

    function it_should_have_an_id_mutator()
    {
        $this->setId(1);
        $this->getId()->shouldReturn(1);
    }

    function it_should_have_a_title_mutator()
    {
        $this->setTitle('plop');
        $this->getTitle()->shouldReturn('plop');
    }

    function it_shoul_have_an_album_mutator()
    {
        $this->setAlbum('plop');
        $this->getAlbum()->shouldReturn('plop');
    }

    function it_should_have_a_track_mutator()
    {
        $this->setTrack(1);
        $this->getTrack()->shouldReturn(1);
    }

    function it_should_have_a_time_mutator()
    {
        $this->setTime(1);
        $this->getTime()->shouldReturn(1);
    }

    function it_should_have_a_url_mutator()
    {
        $this->setUrl('plop');
        $this->getUrl()->shouldReturn('plop');
    }

    function it_should_have_a_size_mutator()
    {
        $this->setSize(1);
        $this->getSize()->shouldReturn(1);
    }

    function it_should_have_an_artUrl_mutator()
    {
        $this->setArtUrl('plop');
        $this->getArtUrl()->shouldReturn('plop');
    }

    function it_should_have_a_preciseRating_mutator()
    {
        $this->setPreciseRating(1);
        $this->getPreciseRating()->shouldReturn(1);
    }

    function it_should_have_a_rating_mutator()
    {
        $this->setRating(1);
        $this->getRating()->shouldReturn(1);
    }

    function it_should_have_a_tags_mutator()
    {
        $this->setTags('plop');
        $this->getTags()->shouldReturn('plop');
    }

    function its_construct_should_instanciate_tags()
    {
        $this->getTags()->shouldReturn(array());
    }
}
