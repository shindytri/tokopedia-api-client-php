<?php

namespace Ravi\TokopediaApiClientPhp\node;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Ravi\TokopediaApiClientPhp\config\TokopediaConfigClient;

class GeneralWithBodyRequest
{    
    /**
     * PUT/PATCH/DELETE Request
     *
     * @param string $httpMethod
     * @param string $baseUrl
     * @param string $apiPath
     * @param array $body
     * @param TokopediaConfigClient $apiConfig
     * @return mixed
     */
    public static function makeMethod($httpMethod, $baseUrl, $apiPath, $body, TokopediaConfigClient $apiConfig)
    {
        if ($apiConfig->getPartnerId() == "") throw new Exception("Input of [partner_id] is empty");
        if ($apiConfig->getAccessToken() == "") throw new Exception("Input of [access_token] is empty");

        // Set Header
        $header = array(
            "Content-type : application/json"
        );

        $requestUrl = $baseUrl.$apiPath;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $httpMethod,
            CURLOPT_HTTPHEADER => $header
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = json_decode(utf8_encode($response));

        if ($err) 
        {
            return $err;
        } 
        else 
        {
            return $data;
        }
    }

    /**
     * POST Request
     *
     * @param string $baseUrl
     * @param string $apiPath
     * @param array $body
     * @param TokopediaConfigClient $apiConfig
     * @return mixed
     */
    public static function postMethod($baseUrl, $apiPath, $body, TokopediaConfigClient $apiConfig)
    {
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
            $response = json_decode($guzzleClient->request("POST", $requestUrl, ['json' => $body, 'headers' => ['Authorization' => 'Bearer '.$apiConfig->getAccessToken()]])->getBody()->getContents());
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