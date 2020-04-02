<?php namespace Alpaca;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

class Response
{
    /**
     * Guzzle Request
     *
     * @return GuzzleHttp\Psr7\Response
     */
    private $request;

    /**
     * Speed of request in seconds
     *
     * @return float
     */
    private $seconds = 0;

    /**
     * Start the class()
     *
     */
    public function __construct(GuzzleResponse $request, $seconds = 0)
    {
        $this->request = $request;
        $this->seconds = $seconds;
        $this->body    = json_decode($this->request->getBody()->getContents(),true);
    }

    /**
     * contents()
     *
     * get contents
     *
     */
    public function contents() {
        return $this->body;
    }

    /**
     * seconds()
     *
     * get seconds for request
     *
     */
    public function seconds() {
        return $this->seconds;
    }

    /**
     * results()
     *
     * get the results and time of response
     *
     */
    public function results()
    {
        return [
            'response' => $this->contents(),
            'seconds' => $this->seconds()
        ];
    }
}
