<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class LightAlbum extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(ANY_ARGUMENT, ANY_ARGUMENT);
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
