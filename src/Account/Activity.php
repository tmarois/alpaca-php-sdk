<?php namespace Alpaca\Account;

use Alpaca\Alpaca;

class Activity
{

    /**
     * Response array
     *
     * @var Alpaca\Alpaca
     */
    private $alp;

    /**
     *  __construct 
     *
     */
    public function __construct(Alpaca $alp) {
        $this->alp = $alp;
    }

    /**
     * get()
     *
     * @return array
     */
    public function get($type, $options=[]) {
        return $this->alp->request('activity',array_merge(['type'=>$type],$options))->results();
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
