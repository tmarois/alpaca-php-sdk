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

There are more in the [Alpaca Documentation](https://docs.alpaca.markets/) than what is presented above, if you want to extend this, please send in a pull request or request features you'd like to see added. Thanks!

## Contributions

Anyone can contribute to **alpaca-php-sdk**. Please do so by posting issues when you've found something that is unexpected or sending a pull request for improvements.

## License

**alpaca-php-sdk** (This Repository) is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This SDK has no affiliation with alpaca.markets, Alpaca Securities LLC and AlpacaDB and acts as an unofficial SDK designed to be a simple solution with using PHP applications. Use at your own risk. If you have any issues with the SDK please submit an issue or pull request.
 