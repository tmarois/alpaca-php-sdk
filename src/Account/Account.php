<?php namespace Alpaca\Account;

class Account
{

    /**
     * Response array
     *
     * @var array
     */
    private $raw = [];

    /**
     *  __construct 
     *
     */
    public function __construct($raw = []) {
        $this->raw = $raw;
    }

    /**
     * number()
     *
     * @return mixed
     */
    public function number() {
        return $this->raw['account_number'] ?? 'unknown';
    }

    /**
     * id()
     *
     * @return mixed
     */
    public function id() {
        return $this->raw['id'] ?? 'unknown';
    }

    /**
     * cash()
     *
     * @return float
     */
    public function cash() {
        return (float) $this->raw['cash'] ?? 0;
    }

    /**
     * buyingPower()
     *
     * @return float
     */
    public function buyingPower() {
        return (float) $this->raw['buying_power'] ?? 0;
    }

    /**
     * longValue()
     *
     * @return float
     */
    public function longValue() {
        return (float) $this->raw['long_market_value'] ?? 0;
    }

    /**
     * shortValue()
     *
     * @return float
     */
    public function shortValue() {
        return (float) $this->raw['short_market_value'] ?? 0;
    }

    /**
     * portfolioValue()
     *
     * @return float
     */
    public function portfolioValue() {
        return (float) $this->raw['portfolio_value'] ?? 0;
    }

    /**
     * status()
     *
     * @return string
     */
    public function status() {
        return $this->raw['status'] ?? 'UNKNOWN';
    }

    /**
     * raw()
     *
     * @return array
     */
    public function raw() {
        return $this->raw;
    }

}
