<?php

namespace Ravi\TokopediaApiClientPhp\client;

use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;
use Ravi\TokopediaApiClientPhp\node\AuthorizationWithBodyRequest;

class AuthorizationRequest
{
    public function httpPost($baseUrl, $apiPath, $body, TokopediaConfigClient $apiConfig)
    {
        return AuthorizationWithBodyRequest::makeMethod("POST", $baseUrl, $apiPath, $body, $apiConfig);
    }
}