<?php

namespace spec\Ampache\Exception;

use PHPSpec2\ObjectBehavior;

class AmpacheException extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Exception\AmpacheException');
    }
}
