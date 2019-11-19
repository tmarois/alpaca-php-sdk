<?php namespace Alpaca;

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
     * Set polygon 
     *
     */
    public function __construct($key, $secret)
    {
        $this->setAuthKeys($key, $secret);
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

}
