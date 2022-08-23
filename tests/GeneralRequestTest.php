<?php

use PHPUnit\Framework\TestCase;
use Ravi\TokopediaApiClientPhp\client\GeneralRequest;
use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;

use function PHPUnit\Framework\assertStringContainsString;

class GeneralRequestTest extends TestCase
{
    public function testGetProductInfoByProductIdShouldReturnSuccess()
    {
        $this->markTestSkipped("AVOID API ERROR");
        $tokopediaGeneralRequest = new GeneralRequest();
        $tokopediaConfig = new TokopediaConfigClient();
        $tokopediaConfig->setPartnerId($_ENV["TOKOPEDIA_PARTNER_ID"]);
        $tokopediaConfig->setAccessToken($_ENV["TOKOPEDIA_ACCESS_TOKEN"]);

        $baseUrl = $_ENV["TOKOPEDIA_API_HOST"];
        $apiPath = "/inventory/v1/fs/".$tokopediaConfig->getPartnerId()."/product/info?product_id=15341594";

        $response = $tokopediaGeneralRequest->httpGet($baseUrl, $apiPath, $tokopediaConfig);

        assertStringContainsString("productID", $response);
    }
}