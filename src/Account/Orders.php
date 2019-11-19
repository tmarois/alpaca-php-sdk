<?php namespace Alpaca\Account;

class Orders
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
    public function __construct(\Alpaca\Alpaca $alpaca)
    {
        $this->alpaca = $alpaca;
    }

    /**
     * get()
     *
     * @return array
     */
    public function get($id)
    {
        return $this->alpaca->request('order',['id'=>$id],'GET')->contents();
    }

    /**
     * create()
     *
     * @return array
     */
    public function create($options = [])
    {
        return $this->alpaca->request('orders',$options,'POST')->contents();
    }

    /**
     * replace()
     *
     * @return array
     */
    public function replace($id, $options = [])
    {
        return $this->alpaca->request('order',array_merge(['id'=>$id],$options),'PATCH')->contents();
    }

    /**
     * getAll()
     *
     * @return array
     */
    public function getAll()
    {
        return $this->alpaca->request('orders')->contents();
    }

    /**
     * cancel()
     *
     * @return array
     */
    public function cancel($id)
    {
        return $this->alpaca->request('order',['id'=>$id],'DELETE')->contents();
    }

    /**
     * cancel()
     *
     * @return array
     */
    public function cancelAll()
    {
        return $this->alpaca->request('orders',[],'DELETE')->contents();
    }
}
