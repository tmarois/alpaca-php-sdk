<?php namespace Alpaca;

class Response
{
    /**
     * Alpaca access
     *
     * @return Alpaca
     */
    private $alpaca;

    /**
     * Guzzle Request
     *
     * @return GuzzleHttp\Psr7\Response
     */
    private $request;

    /**
     * Start the class()
     *
     */
    public function __construct(Alpaca $alpaca, \GuzzleHttp\Psr7\Response $request)
    {
        $this->alpaca = $alpaca;

        $this->request = $request;
    }

    /**
     * contents()
     *
     * get contents
     *
     */
    public function contents()
    {
        return json_decode($this->request->getBody()->getContents(),true);
    }
}
