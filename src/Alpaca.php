<?php namespace Alpaca;

use Alpaca\Request;

class Alpaca
{

    /**
     * API key
     *
     * @var string
     */
    private $key;

    /**
     * API secret
     *
     * @var string
     */
    private $secret;

    /**
     * Use paper account (true/false)
     *
     * @var bool
     */
    private $paper;

    /**
     * API Paper Path
     *
     * @var array
     */
    private $apiPaperPath = 'https://paper-api.alpaca.markets';

    /**
     * API Real Path
     *
     * @var array
     */
    private $apiPath = 'https://api.alpaca.markets';

    /**
     * API Paths
     *
     * @var array
     */
    private $paths = [
        "account"     => "/v2/account",
        "activities"  => "/v2/account/activities/{activity_type}",
        "orders"      => "/v2/orders",
        "order"       => "/v2/orders/{order_id}",
        "positions"   => "/v2/positions",
        "position"    => "/v2/positions/{symbol}"
    ];

    /**
     * Set Alpaca 
     *
     */
    public function __construct($key, $secret, $paper = false)
    {
        $this->setAuthKeys($key, $secret);

        $this->paper = $paper;
    }

    /**
     * setKey()
     *
     * @return self
     */
    public function setAuthKeys($key, $secret)
    {
        $this->key = $key;

        $this->secret = $secret;

        return $this;
    }

    /**
     * getAuthKeys()
     *
     * @return array
     */
    public function getAuthKeys()
    {
        return [$this->key, $this->secret];
    }

    /**
     * getRoot()
     *
     * @return string
     */
    public function getRoot()
    {
        if ($this->paper===true) {
            return $this->apiPaperPath;
        }

        return $this->apiPath;
    }

    /**
     * getPath()
     *
     * @return string
     */
    public function getPath($handle)
    {
        return $this->paths[$handle] ?? false;
    }
    
    /**
     * request()
     *
     * @return Alpaca\Request
     */
    public function request($handle, $params = [], $type = 'GET')
    {
        return (new Request($this))->send($handle, $params, $type);
    }

}
