<?php

namespace spec\Ampache\Model;

use PHPSpec2\ObjectBehavior;

class Video extends ObjectBehavior
{
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

    function it_should_have_a_mime_mutator()
    {
        $this->setMime('plop');
        $this->getMime()->shouldReturn('plop');
    }

    function it_should_have_a_resolution_mutator()
    {
        $this->setResolution('plop');
        $this->getResolution()->shouldReturn('plop');
    }

    function it_should_have_a_size_mutator()
    {
        $this->setSize(1);
        $this->getSize()->shouldReturn(1);
    }

    function it_should_have_a_url_mutator()
    {
        $this->setUrl('plop');
        $this->getUrl()->shouldReturn('plop');
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
