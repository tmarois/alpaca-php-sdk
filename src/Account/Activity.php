<?php namespace Alpaca\Account;

class Activity
{

    /**
     * Response array
     *
     * @var Alpaca\Alpaca
     */
    private $alpaca;

    /**
     *  __construct 
     *
     */
    public function __construct(\Alpaca\Alpaca $alpaca) {
        $this->alpaca = $alpaca;
    }

    /**
     * get()
     *
     * @return array
     */
    public function get($type, $options=[]) {
        return $this->alpaca->request('activity',array_merge(['type'=>$type],$options))->results();
    }

    /**
     * getFilledOrders()
     *
     * @return array
     */
    public function getFilledOrders($from, $to, $options = []) {
        return $this->get('FILL',array_merge(['after'=>$from,'until'=>$to],$options));
    }
}
