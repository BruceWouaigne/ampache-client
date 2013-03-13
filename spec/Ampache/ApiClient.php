<?php

namespace spec\Ampache;

use PHPSpec2\ObjectBehavior;

class ApiClient extends ObjectBehavior
{
    /**
     * @param Ampache\Request\RequestFactory     $requestFactory
     * @param Ampache\Request\RequestTransporter $transporter
     * @param Ampache\Factory\ObjectFactory      $objectFactory
     * @param HttpRequest                        $request
     */
    function let(
        $requestFactory, $transporter, $objectFactory, $request
    )
    {
        $this->beConstructedWith(ANY_ARGUMENT);

        $this->setRequestFactory($requestFactory);
        $this->setRequestTransporter($transporter);
        $this->setObjectFactory($objectFactory);

        $requestFactory->buildGetRequest(ANY_ARGUMENT)->willReturn($request);
        $transporter->sendRequest(ANY_ARGUMENT)->willReturn('');
    }

    /**
     * @param Ampache\Xml\Parser $xmlParser
     */
    function its_processLogin_should_not_throw_exception_on_success($xmlParser)
    {
        $xmlParser->parse(ANY_ARGUMENT)->willReturn(new \SimpleXmlElement(
<<<XML
        <root>
            <auth>1234</auth>
        </root>
XML
        ));

        $this->setXmlParser($xmlParser);
        $this->processLogin(ANY_ARGUMENT, ANY_ARGUMENT);
        $this->getAuthenticationToken()->shouldReturn('1234');
    }

    function its_processLogin_should_throw_exception_on_failure()
    {
        $ex = new \Ampache\Exception\AmpacheAuthenticationException("Authentication failure.");

        $this->shouldThrow($ex)->duringProcessLogin(ANY_ARGUMENT, ANY_ARGUMENT);
    }

    function its_request_should_throw_an_exception_when_no_action_given()
    {
        $ex = new \Ampache\Exception\AmpacheException('You must specify an action.');

        $this->shouldThrow($ex)->duringRequest(null);
    }

    function its_request_should_return_null_when_no_datas_found()
    {
        $this->request(ANY_ARGUMENT)->shouldReturn(null);
    }

    function its_request_should_return_array_when_several_datas_found($objectFactory)
    {
        $objectFactory->build(ANY_ARGUMENTS)->willReturn(array());
        $this->request(ANY_ARGUMENT)->shouldBeLike(array());
    }

    function its_request_should_return_an_object_when_single_data_found($objectFactory)
    {
        $objectFactory->build(ANY_ARGUMENTS)->willReturn(new \Ampache\Model\Artist);
        $this->request(ANY_ARGUMENT)->shouldReturnAnInstanceOf('\Ampache\Model\Artist');
    }
}
