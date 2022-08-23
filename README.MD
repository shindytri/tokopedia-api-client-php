# Unofficial Tokopedia Api Client for PHP

Composer library for Tokopedia Open API. Please found something related with the Open API in this [link](https://developer.tokopedia.com/openapi/guide/#/)

## How to install

`composer install ravi/tokopedia-api-client-php`

## How to use
```
$tokopediaAuthRequest = new AuthorizationRequest();
$tokopediaConfig = new TokopediaConfigClient();
$tokopediaConfig->setPartnerId($_ENV["TOKOPEDIA_PARTNER_ID"]);
$tokopediaConfig->setPartnerKey($_ENV["TOKOPEDIA_PARTNER_KEY"]);

$baseUrl = $_ENV["TOKOPEDIA_AUTH_HOST"];
$apiPath = "/token";

$body = [];

$response = $tokopediaAuthRequest->httpPost($baseUrl, $apiPath, $body, $tokopediaConfig);


$tokopediaGeneralRequest = new GeneralRequest();
$tokopediaConfig = new TokopediaConfigClient();
$tokopediaConfig->setPartnerId($_ENV["TOKOPEDIA_PARTNER_ID"]);
$tokopediaConfig->setAccessToken($_ENV["TOKOPEDIA_ACCESS_TOKEN"]);

$baseUrl = $_ENV["TOKOPEDIA_API_HOST"];
$apiPath = "/inventory/v1/fs/".$tokopediaConfig->getPartnerId()."/product/info?product_id=15341594";

$response = $tokopediaGeneralRequest->httpGet($baseUrl, $apiPath, $tokopediaConfig);
```
