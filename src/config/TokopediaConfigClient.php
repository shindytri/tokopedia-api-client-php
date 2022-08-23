<?php

namespace Ravi\TokopediaApiClientPhp\config;

class TokopediaConfigClient
{
    private $partnerId; // FS Id
    private $accessToken; // Access Token
    private $shopId; // Shop Id
    private $partnerKey; // Client Secret
    
    public function __construct($partnerId = "", $accessToken = "", $shopId = "", $partnerKey = "")
    {
        $this->partnerId = $partnerId;
        $this->accessToken = $accessToken;
        $this->shopId = $shopId;
        $this->partnerKey = $partnerKey;
    }
    
    /**
     * Get the value of partnerId
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * Set the value of partnerId
     */
    public function setPartnerId($partnerId): self
    {
        $this->partnerId = $partnerId;

        return $this;
    }

    /**
     * Get the value of accessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set the value of accessToken
     */
    public function setAccessToken($accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Get the value of shopId
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set the value of shopId
     */
    public function setShopId($shopId): self
    {
        $this->shopId = $shopId;

        return $this;
    }

    /**
     * Get the value of partnerKey
     */
    public function getPartnerKey()
    {
        return $this->partnerKey;
    }

    /**
     * Set the value of partnerKey
     */
    public function setPartnerKey($partnerKey): self
    {
        $this->partnerKey = $partnerKey;

        return $this;
    }
}