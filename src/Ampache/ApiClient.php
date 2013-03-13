<?php

namespace Ampache;

class ApiClient
{
    protected $requestFactory;
    protected $requestTransporter;
    protected $xmlParser;
    protected $objectFactory;
    protected $authenticationToken;

    public function __construct($baseUrl)
    {
        $this->requestTransporter  = new Request\RequestTransporter;
        $this->xmlParser           = new Xml\Parser;
        $this->objectFactory       = new Factory\ObjectFactory;
        $this->requestFactory      = new Request\RequestFactory(sprintf(
            '%s/server/xml.server.php?',
            rtrim($baseUrl, '/')
        ));
    }

    public function processLogin($login, $password)
    {
        $this->authenticationToken = $this->retrieveAuthenticationToken(
            $login,
            $password
        );
    }

    public function request($action, array $params = array())
    {
        if (false === isset($action)) {
            throw new Exception\AmpacheException('You must specify an action.');
        }

        $params['action'] = $action;
        $params['auth']   = $this->authenticationToken;

        $request = $this->requestFactory->buildGetRequest($params);
        $datas   = $this->requestTransporter->sendRequest($request);
        $xml     = $this->xmlParser->parse($datas);
        $object  = $this->objectFactory->build($action, $xml);

        return $object;
    }

    public function setRequestTransporter($requestTransporter)
    {
        $this->requestTransporter = $requestTransporter;
    }

    public function setXmlParser($xmlParser)
    {
        $this->xmlParser = $xmlParser;
    }

    public function setObjectFactory($objectFactory)
    {
        $this->objectFactory = $objectFactory;
    }

    public function setRequestFactory($requestFactory)
    {
        $this->requestFactory = $requestFactory;
    }

    public function getAuthenticationToken()
    {
        return $this->authenticationToken;
    }

    private function retrieveAuthenticationToken($login, $password)
    {
        $time       = time();
        $key        = hash('sha256', $password);
        $passphrase = hash('sha256', $time . $key);

        $params = array(
            'action'    => 'handshake',
            'auth'      => $passphrase,
            'timestamp' => $time,
            'version'   => '350001',
            'user'      => $login
        );

        $request = $this->requestFactory->buildGetRequest($params);
        $datas   = $this->requestTransporter->sendRequest($request);
        $xml     = $this->xmlParser->parse($datas);

        if (false === isset($xml->auth)) {
            throw new Exception\AmpacheAuthenticationException('Authentication failure.');
        }

        return (string) $xml->auth;
    }
}
