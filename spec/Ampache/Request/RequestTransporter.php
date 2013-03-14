<?php

namespace spec\Ampache\Request;

use PHPSpec2\ObjectBehavior;

class RequestTransporter extends ObjectBehavior
{
    /**
     * @param HttpRequest $request
     * @param stdClass    $message
     */
    function its_sendRequest_should_return_body_on_success($request, $message)
    {
        $request->send()->willReturn($message);
        $message->getResponseCode()->willReturn(200);

        $this->sendRequest($request)->shouldReturn(null);
    }

    /**
     * @param HttpRequest $request
     * @param stdClass    $message
     */
    function its_sendRequest_should_throw_specific_exception_on_404($request, $message)
    {
        $url = 'http://localhost';
        $ex  = new \Exception(sprintf("Ressource not found (404) '%s'", $url));

        $request->send()->willReturn($message);
        $request->getUrl()->willReturn($url);
        $message->getResponseCode()->willReturn(404);

        $this->shouldThrow($ex)->duringSendRequest($request);
    }

    /**
     * @param HttpRequest $request
     * @param stdClass    $message
     */
    function its_sendRequest_should_throw_exception_on_failure($request, $message)
    {
        $responseCode = 12345;

        $ex = new \Exception(sprintf(
            "HTTP response code %d unsupported",
            $responseCode
        ));

        $request->send()->willReturn($message);
        $message->getResponseCode()->willReturn($responseCode);

        $this->shouldThrow($ex)->duringSendRequest($request);
    }

}
