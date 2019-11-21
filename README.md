# Alpaca Trading PHP SDK

This package acts as the PHP SDK for the [Alpaca Trading API](https://docs.alpaca.markets/).

## Installation

Use [Composer](http://getcomposer.org/) to install package.

Run `composer require tmarois/alpaca-php-sdk:^1.0`

## Getting Started

First you need to instantiate the `Alpaca` object.

```php
use Alpaca\Alpaca;

$alpaca = new Alpaca("YOUR_API_KEY_ID", "YOUR_API_SECRET_KEY");
```

## Example Usage

**[Get Account](https://docs.alpaca.markets/api-documentation/api-v2/account/)**: Get the account details

```php
// this will pull a request from alpaca to get account details
$account = $alpaca->account();

// here are some helper methods to quickly get the details
$number = $account->number();
$id = $account->id();
$status = $account->status();
$buyingPower = $account->buyingPower();
$cash = $account->cash();
$longValue = $account->longValue();
$shortValue = $account->shortValue();
$portfolioValue = $account->portfolioValue();

// gets the raw array from Alpaca
// view documentation for the correct keys
$raw = $account->raw();
```

**[Get Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#order-entity)**: Get a specific order

```php
$order = $alpaca->orders()->get('ORDER_ID');
```

**[Get All Orders](https://docs.alpaca.markets/api-documentation/api-v2/orders/#order-entity)**: Get an array of all open orders

```php
// get all open orders
$orders = $alpaca->orders()->getAll();

// get orders of specific types
// type: open, closed, or all
$orders = $alpaca->orders()->getAll($type,$limit,$dateFrom,$dateTo,$direction);
```

**[Cancel An Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#cancel-all-orders)**: Cancel a specific order

```php
$orders = $alpaca->orders()->cancel('ORDER_ID);
```

**[Cancel All Orders](https://docs.alpaca.markets/api-documentation/api-v2/orders/#cancel-all-orders)**: Cancel all open orders

```php
$orders = $alpaca->orders()->cancelAll();
```

**[Create An Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#request-a-new-order)**: Create a new order

```php
$alpaca->orders()->create([
    // stock to purchase
    'symbol' => 'AAPL',

    // how many shares
    'qty' => 1,

    // buy or sell
    'side' => 'buy',

    // market, limit, stop, or stop_limit
    'type' => 'market',

    // day, gtc, opg, cls, ioc, fok.
    // @see https://docs.alpaca.markets/orders/#time-in-force
    'time_in_force' => 'day',

    // required if type is limit or stop_limit
    // 'limit_price' => 0,

    // required if type is stop or stop_limit
    // 'stop_price' => 0,

    'extended_hours' => false,

    // optional if adding custom id
    // 'client_order_id' => ''
]);
```

**[Replace An Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#replace-an-order)**: Replaces an existing order

```php
$alpaca->orders()->replace('ORDER_ID',[
    'qty' => 1,

    // required if type is limit or stop_limit
    // 'limit_price' => 0,

    // required if type is stop or stop_limit
    // 'stop_price' => 0,

    // day, gtc, opg, cls, ioc, fok.
    // @see https://docs.alpaca.markets/orders/#time-in-force
    'time_in_force' => 'day',

    // optional if adding custom id
    // 'client_order_id' => ''
]);
```

**[Get Activity](https://docs.alpaca.markets/api-documentation/api-v2/account-activities/)**: Get the account activity, like order fills, dividends etc.

```php
// type can be many, such as FILL, DIV, TRANS etc
// view on this page https://docs.alpaca.markets/api-documentation/api-v2/account-activities/
$activity = $alpaca->activity()->get('TYPE');
```

There are more in the [Alpaca Documentation](https://docs.alpaca.markets/) than what is presented above, if you want to extend this, please send in a pull request or request features you'd like to see added. Thanks!

## Contributions

Anyone can contribute to **alpaca-php-sdk**. Please do so by posting issues when you've found something that is unexpected or sending a pull request for improvements.

## License

**alpaca-php-sdk** (This Repository) is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This SDK has no affiliation with alpaca.markets, Alpaca Securities LLC and AlpacaDB and acts as an unofficial SDK designed to be a simple solution with using PHP applications. Use at your own risk. If you have any issues with the SDK please submit an issue or pull request.
 