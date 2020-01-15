<?php namespace Alpaca\Account;

class Positions
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
    public function get($stock) {
        return $this->alpaca->request('position',['stock'=>$stock])->results();
    }

    /**
     * getAll()
     *
     * @return array
     */
    public function getAll() {
        return $this->alpaca->request('positions',[])->results();
    }

    /**
     * close()
     *
     * @return array
     */
    public function close($stock) {
        return $this->alpaca->request('position',['stock'=>$stock],'DELETE')->results();
    }

    /**
     * closeAll()
     *
     * @return array
     */
    public function closeAll() {
        return $this->alpaca->request('positions',[],'DELETE')->results();
    }
}
