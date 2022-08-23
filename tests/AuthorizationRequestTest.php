<?php

use PHPUnit\Framework\TestCase;
use Ravi\TokopediaApiClientPhp\client\AuthorizationRequest;
use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;

use function PHPUnit\Framework\assertStringContainsString;

class AuthorizationRequestTest extends TestCase
{
    public function testGetAccessTokenAndReturnSuccess()
    {
        $this->markTestSkipped("AVOID API ERROR");
        $tokopediaAuthRequest = new AuthorizationRequest();
        $tokopediaConfig = new TokopediaConfigClient();
        $tokopediaConfig->setPartnerId($_ENV["TOKOPEDIA_PARTNER_ID"]);
        $tokopediaConfig->setPartnerKey($_ENV["TOKOPEDIA_PARTNER_KEY"]);

        $baseUrl = $_ENV["TOKOPEDIA_AUTH_HOST"];
        $apiPath = "/token";

        $body = [];

        $response = $tokopediaAuthRequest->httpPost($baseUrl, $apiPath, $body, $tokopediaConfig);

        assertStringContainsString("Bearer", $response);
    }
}