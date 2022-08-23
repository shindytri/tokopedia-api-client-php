<?php

namespace Ravi\TokopediaApiClientPhp\client;

use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;
use Ravi\TokopediaApiClientPhp\node\GeneralWithBodyRequest;
use Ravi\TokopediaApiClientPhp\node\GeneralWithOutBodyRequest;

class GeneralRequest
{
    public function httpGet($baseUrl, $apiPath, TokopediaConfigClient $apiConfig)
    {
        return GeneralWithOutBodyRequest::makeGetMethod("GET", $baseUrl, $apiPath, $apiConfig);
    }

    public function httpPost($baseUrl, $apiPath, $body, TokopediaConfigClient $apiConfig)
    {
        return GeneralWithBodyRequest::postMethod($baseUrl, $apiPath, $body, $apiConfig);
    }

    public function httpPatch($baseUrl, $apiPath, $body, TokopediaConfigClient $apiConfig)
    {
        return GeneralWithBodyRequest::makeMethod("PATCH", $baseUrl, $apiPath, $body, $apiConfig);
    }
}