<?php namespace Alpaca;

use GuzzleHttp\Client;
use Alpaca\Response;

class Request
{
    /**
     * Polygon access
     *
     * @return Polygon
     */
    private $alpaca;

    /**
     * Guzzle Client
     *
     * @return GuzzleHttp\Client
     */
    private $client;

    /**
     * Start the class()
     *
     */
    public function __construct(Alpaca $alpaca, $timeout = 4)
    {
        $this->alpaca = $alpaca;

        $this->client = new Client([
            'base_uri' => $this->alpaca->getRoot(),
            'timeout'  => $timeout
        ]);
    }

    /**
     * send()
     *
     * Send request
     *
     */
    public function send($handle, $params = [], $type = 'GET')
    {
        // build and prepare our full path rul
        $url = $this->prepareUrl($handle, $params);

        return (new Response($this->alpaca, $this->client->request($type, $url, [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'APCA-API-KEY-ID' => $this->alpaca->getAuthKeys()[0] ?? '',
            'APCA-API-SECRET-KEY' => $this->alpaca->getAuthKeys()[1] ?? '',
        ])));
    }

    /**
     * prepareUrl()
     *
     * Get and prepare the url
     *
     * @return string
     */
    private function prepareUrl($handle, $segments = [])
    {
        $url = $this->alpaca->getPath($handle);

        foreach($segments as $segment=>$value) {
            $url = str_replace('{'.$segment.'}', $value, $url);
        }

        return $url;
    }
}
