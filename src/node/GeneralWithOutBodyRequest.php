<?php

namespace Ravi\TokopediaApiClientPhp\node;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;

class GeneralWithOutBodyRequest
{    
    /**
     * GET Request
     * @param string $httpMethod [explicite description]
     * @param string $baseUrl [explicite description]
     * @param string $apiPath [explicite description]
     * @param TokopediaConfigClient $apiConfig [explicite description]
     * @return mixed
     */
    public static function makeGetMethod($httpMethod, $baseUrl, $apiPath, TokopediaConfigClient $apiConfig){
        // Validate Input
        if ($apiConfig->getPartnerId() == "") throw new Exception("Input of [partner_id] is empty");
        if ($apiConfig->getAccessToken() == "") throw new Exception("Input of [access_token] is empty");
        
        $requestUrl = $baseUrl.$apiPath;

        $guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 3.0
        ]);

        $response = null;

        try 
        {
            $request = $guzzleClient->request($httpMethod, $requestUrl, ["headers" => ["Authorization" => "Bearer ".$apiConfig->getAccessToken()]]);
            $response_body = $request->getBody()->getContents();
            $response_header = $request->getHeaders();
            isset($response_header['Content-Type'][0]) && $response_header['Content-Type'][0] == 'application/json' ? $response = json_decode($response_body) : $response = $response_body;
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