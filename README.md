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
$alpaca = $polygon->account();
```

**[Get Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#order-entity)**: Get a specific order

```php
$alpaca = $polygon->orders()->get('ORDER_ID');
```

**[Get All Orders](https://docs.alpaca.markets/api-documentation/api-v2/orders/#order-entity)**: Get an array of all open orders

```php
$alpaca = $polygon->orders()->getAll();
```

**[Cancel An Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#cancel-all-orders)**: Cancel a specific order

```php
$alpaca = $polygon->orders()->cancel('ORDER_ID);
```

**[Cancel All Orders](https://docs.alpaca.markets/api-documentation/api-v2/orders/#cancel-all-orders)**: Cancel all open orders

```php
$alpaca = $polygon->orders()->cancelAll();
```

**[Create An Order](https://docs.alpaca.markets/api-documentation/api-v2/orders/#request-a-new-order)**: Create a new order

```php
$alpaca = $polygon->orders()->create([
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
$alpaca = $polygon->orders()->replace('ORDER_ID',[
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

There are more in the [Alpaca Documentation](https://docs.alpaca.markets/) than what is presented above, if you want to extend this, please send in a pull request or request features you'd like to see added. Thanks!

## Contributions

Anyone can contribute to **alpaca-php-sdk**. Please do so by posting issues when you've found something that is unexpected or sending a pull request for improvements.

## License

**alpaca-php-sdk** (This Repository) is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This SDK has no affiliation with alpaca.markets, Alpaca Securities LLC and AlpacaDB and acts as an unofficial SDK designed to be a simple solution with using PHP applications. Use at your own risk. If you have any issues with the SDK please submit an issue or pull request.
 