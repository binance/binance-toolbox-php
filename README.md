# Binance ToolBox in PHP

A collection of PHP scripts that demostrates the usage of [binance-connector-php](https://github.com/binance/binance-connector-php).


## Preparation

- [Composer](https://getcomposer.org/doc/00-intro.md) is required.
- PHP 7.4 +


## Installation

```php

composer install

composer dump-auto

```

## How to run

### Market data endpoints
The market data endpoints can be executed straightaway:

```php

php src/time.php

```

### User data endpoints
API key and secret is required.

```php
php src/order.php

```


## See issues?
- If the issue is about the library itself, please open a github issue.
- If it's a general issue about the API, please open a topic at [Binance developer forum](https://dev.binance.vision).