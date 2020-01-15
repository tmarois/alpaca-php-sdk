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
    public function __construct(\Alpaca\Alpaca $alpaca) {
        $this->alpaca = $alpaca;
    }

    /**
     * get()
     *
     * @return array
     */
    public function get($id) {
        return $this->alpaca->request('order',['id'=>$id],'GET')->results();
    }

    /**
     * create()
     *
     * @return array
     */
    public function create($options = []) {
        return $this->alpaca->request('orders',$options,'POST')->results();
    }

    /**
     * replace()
     *
     * @return array
     */
    public function replace($id, $options = []) {
        return $this->alpaca->request('order',array_merge(['id'=>$id],$options),'PATCH')->results();
    }

    /**
     * getAll()
     *
     * @return array
     */
    public function getAll($status = 'open', $limit = 50, $from = null, $to = null, $dir = 'desc')
    {
        return $this->alpaca->request('orders',[
            'status' => $status,
            'limit' => $limit,
            'after' => $from,
            'until' => $to,
            'direction' => $dir
        ])->results();
    }

    /**
     * cancel()
     *
     * @return array
     */
    public function cancel($id) {
        return $this->alpaca->request('order',['id'=>$id],'DELETE')->results();
    }

    /**
     * cancel()
     *
     * @return array
     */
    public function cancelAll() {
        return $this->alpaca->request('orders',[],'DELETE')->results();
    }
}
