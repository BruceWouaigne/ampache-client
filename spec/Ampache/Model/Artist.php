<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class Artist extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Model\Artist');
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

    function it_shoul_have_an_albumNumber_mutator()
    {
        $this->setAlbumNumber(1);
        $this->getAlbumNumber()->shouldReturn(1);
    }

    function it_should_have_a_songNumber_mutator()
    {
        $this->setSongNumber(1);
        $this->getSongNumber()->shouldReturn(1);
    }

    function it_should_have_a_tags_mutator()
    {
        $this->setTags('plop');
        $this->getTags()->shouldReturn('plop');
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

    function its_construct_should_instanciate_tags()
    {
        $this->getTags()->shouldReturn(array());
    }
}
