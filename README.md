# ApiDQ API PHP Client

[![Latest Stable Version](http://poser.pugx.org/nikitaksv/apidq-client-php/v)](https://packagist.org/packages/nikitaksv/apidq-client-php) 
[![Total Downloads](http://poser.pugx.org/nikitaksv/apidq-client-php/downloads)](https://packagist.org/packages/nikitaksv/apidq-client-php) 
[![Latest Unstable Version](http://poser.pugx.org/nikitaksv/apidq-client-php/v/unstable)](https://packagist.org/packages/nikitaksv/apidq-client-php) 
[![License](http://poser.pugx.org/nikitaksv/apidq-client-php/license)](https://packagist.org/packages/nikitaksv/apidq-client-php) 
[![PHP Version Require](http://poser.pugx.org/nikitaksv/apidq-client-php/require/php)](https://packagist.org/packages/nikitaksv/apidq-client-php)
[![codecov](https://codecov.io/gh/nikitaksv/apidq-client-php/branch/main/graph/badge.svg?token=6MNAB67SOK)](https://codecov.io/gh/nikitaksv/apidq-client-php)

---

This is the PHP ApiDQ API client. This library allows using of the actual API version.
You can find more info in the [documentation](https://docs.apidq.io).

## Installation

Follow those steps to install the library:

1. Download and install [Composer](https://getcomposer.org/download/) package manager.
2. Install the library from the Packagist by executing this command:

```bash
composer require nikitaksv/apidq-client-php:"~1.0"
```

**Note:** API client uses `php-http/client-implementation` as a PSR-18, PSR-17 implementation. You can replace those
implementations during installation by installing this library with the implementation of your choice, like this:

```sh
composer require symfony/http-client guzzlehttp/psr7 nikitaksv/apidq-client-php:"~1.0"
```

## Usage

Firstly, you should initialize the Client. The easiest way to do this is to use the `SimpleClientFactory`:

```php
$client = \ApiDQ\Factory\SimpleClientFactory::createClient('https://api.apidq.io', 'apiKey');
$client = \ApiDQ\Factory\SimpleClientFactory::createClientWithCache('https://api.apidq.io', 'apiKey', $psrCache);
$client = \ApiDQ\Factory\SimpleClientFactory::createClientWithFileCache('https://api.apidq.io', 'apiKey', sys_get_temp_dir());
```

The client is separated into several resource groups, all of which are accessible through the Client's public
properties. You can call API methods from those groups like this:

```php
$cleanResponse = $client->address->clean(
    (new \ApiDQ\Model\Service\Address\CleanRequest())
        ->setQuery('Москва')
        ->setCountryCode('RU')
);
```

To handle errors you must use two types of exceptions:

* `ApiDQ\Exception\Service\ServiceException` for the api service error.
* `ApiDQ\Exception\Client\BuilderException` for the client builder error.
