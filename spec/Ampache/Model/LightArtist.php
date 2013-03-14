<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class LightArtist extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(ANY_ARGUMENT, ANY_ARGUMENT);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Model\LightArtist');
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
}
