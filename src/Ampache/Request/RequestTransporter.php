<?php

namespace Ampache\Request;

class RequestTransporter
{
    public function sendRequest(\HttpRequest $request)
    {
        $message = $request->send();

        switch ($message->getResponseCode()) {
        case 200:
            return $message->getBody();
        case 404:
            throw new \Exception(sprintf(
                'Ressource not found (404) \'%s\'',
                $request->getUrl()
            ));
        default:
            throw new \Exception(sprintf(
                'HTTP response code %d unsupported',
                $message->getResponseCode()
            ));
        }
    }
}
