<?php

namespace Ampache\Request;

class RequestFactory
{
    protected $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function buildGetRequest(array $params)
    {
        $request = new \HttpRequest($this->baseUrl);

        $request->addQueryData($params);

        return $request;
    }
}
