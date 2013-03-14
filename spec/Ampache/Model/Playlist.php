<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class Playlist extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Model\Playlist');
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

    function it_should_have_an_owner_mutator()
    {
        $this->setOwner('plop');
        $this->getOwner()->shouldReturn('plop');
    }

    function it_should_have_a_type_mutator()
    {
        $this->setType('plop');
        $this->getType()->shouldReturn('plop');
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
