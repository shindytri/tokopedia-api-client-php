<?php

namespace Ravi\TokopediaApiClientPhp\node;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;

class AuthorizationWithBodyRequest
{    
    /**
     * POST/PATCH/PUT/DELETE Request
     * @param string $httpMethod
     * @param string $baseUrl
     * @param string $apiPath
     * @param array $body
     * @param TokopediaConfigClient $apiConfig
     * @return mixed
     */
    public static function makeMethod($httpMethod, $baseUrl, $apiPath, $body, TokopediaConfigClient $apiConfig)
    {
        /** @var TokopediaConfigClient $apiConfig */
        if ($apiConfig->getPartnerId() == "") throw new Exception("Input of [partner_id] is empty");
        if ($apiConfig->getPartnerKey() == "") throw new Exception("Input of [partner_key] is empty");

        $requestUrl = $baseUrl.$apiPath;

        $rawString = $apiConfig->getPartnerId().":".$apiConfig->getPartnerKey();

        $authToken = base64_encode($rawString);

        $guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 3.0
        ]);

        $response = null;

        try 
        {
            $response = json_decode($guzzleClient->request($httpMethod, $requestUrl, ['json' => $body, 'headers' => ['Authorization' => 'Basic '.$authToken]])->getBody()->getContents());
        } catch (ClientException $e)
        {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        } catch(Exception $e)
        {
            $response = (object) array("error" => "GUZZLE_ERROR", "message" => $e->getMessage());
        }

        return $response;
    }
    
}