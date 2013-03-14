<?php

namespace spec\Ampache\Request;

use PHPSpec2\ObjectBehavior;

class RequestFactory extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('http://localhost/');
    }

    function its_buildGetRequest_should_return_an_httpRequest_based_on_given_parameters()
    {
        $params = array('auth' => '1234');

        $request = $this->buildGetRequest($params);

        $request->shouldBeAnInstanceOf('HttpRequest');
        $request->getQueryData()->shouldReturn(http_build_query($params));
        $request->getUrl()->shouldReturn('http://localhost/');
    }
}
