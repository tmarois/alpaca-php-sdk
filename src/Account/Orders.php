<?php namespace Alpaca\Account;

use Alpaca\Alpaca;

class Orders
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
    public function get($id) {
        return $this->alp->request('order',['id'=>$id],'GET')->results();
    }

    /**
     * create()
     *
     * @return array
     */
    public function create($options = []) {
        return $this->alp->request('orders',$options,'POST')->results();
    }

    /**
     * replace()
     *
     * @return array
     */
    public function replace($id, $options = []) {
        return $this->alp->request('order',array_merge(['id'=>$id],$options),'PATCH')->results();
    }

    /**
     * getAll()
     *
     * @return array
     */
    public function getAll($status = 'open', $limit = 50, $from = null, $to = null, $dir = 'desc')
    {
        return $this->alp->request('orders',[
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
        return $this->alp->request('order',['id'=>$id],'DELETE')->results();
    }

    /**
     * cancel()
     *
     * @return array
     */
    public function cancelAll() {
        return $this->alp->request('orders',[],'DELETE')->results();
    }
}
