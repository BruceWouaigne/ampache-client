<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class Album extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Model\Album');
    }

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

    function it_should_have_an_artist_mutator()
    {
        $this->setArtist('plop');
        $this->getArtist()->shouldReturn('plop');
    }

    function it_should_have_a_year_mutator()
    {
        $this->setYear(2010);
        $this->getYear()->shouldReturn(2010);
    }

    function it_should_have_a_trackNumber_mutator()
    {
        $this->setTrackNumber(1);
        $this->getTrackNumber()->shouldReturn(1);
    }

    function it_should_have_a_disk_mutator()
    {
        $this->setDisk(1);
        $this->getDisk()->shouldReturn(1);
    }

    function it_should_have_an_artUrl_mutator()
    {
        $this->setArtUrl('plop');
        $this->getArtUrl();
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
