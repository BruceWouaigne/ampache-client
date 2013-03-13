<?php

namespace Ampache;

class ApiClient
{
    private $baseUrl;
    private $login;
    private $password;
    private $authenticationToken;

    public function __construct($baseUrl, $login, $password)
    {
        $this->baseUrl  = sprintf('%s/server/xml.server.php?', rtrim($baseUrl, '/'));
        $this->login    = $login;
        $this->password = $password;

        $this->setAuthenticationToken();
    }

    public function request($action, array $params = array())
    {
        if (false === isset($action)) {
            throw new Exception\AmpacheException('You must specify an action.');
        }

        $params['action'] = $action;
        $xml              = $this->processRequest($params);

        $factory = new Factory\ObjectFactory;
        $datas = $factory->build($action, $xml);

        return $datas;
    }

    public function reconnect() {
        $this->setAuthenticationToken();
    }

    private function setAuthenticationToken()
    {
        $time       = time();
        $key        = hash('sha256', $this->password);
        $passphrase = hash('sha256', $time . $key);

        $datas = $this->processRequest(array(
            'action'    => 'handshake',
            'auth'      => $passphrase,
            'timestamp' => $time,
            'version'   => '350001',
            'user'      => $this->login
        ), false);

        if (false === isset($datas->auth)) {
            throw new Exception\AmpacheAuthenticationException('Authentication failure.');
        }

        $this->authenticationToken = (string) $datas->auth;
    }

    private function processRequest(array $params, $protected = true)
    {
        if (true === $protected) {
            $params['auth'] = $this->authenticationToken;
        }

        $url     = $this->baseUrl . http_build_query($params);
        $request = new \HttpRequest($url);

        $request->send();

        switch ($request->getResponseCode()) {
        case 200:
            try {
                $xml = new \SimpleXmlElement($request->getResponseBody());
            } catch (\Exception $ex) {
                $xml = new \SimpleXmlElement('<root></root>');
            }
            if (true === isset($xml->error)) {
                throw new Exception\AmpacheException(sprintf('Ampache error code %s: %s.',
                    $xml->error['code'],
                    (string) $xml->error
                ));
            }
            return $xml;
        case 404:
            throw new \Exception('Ampache server not found (404). You should check the base url.');
        default:
            throw new \Exception(sprintf('HTTP response code %d unsupported.',
                $request->getResponseCode()
            ));
        }
    }
}
