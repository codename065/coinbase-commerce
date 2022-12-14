coinbase-commerce-php-sdk
=================================

This SDK is a way to simplify the usage of Coinbase Commerce REST API for your web application.

About Coinbase Commerce
-------------

Coinbase Commerce is the easiest and safest way for your business to start accepting digital currency payments.
For more info go to [Coinbase Commerce API reference page](https://commerce.coinbase.com/docs/)

Available Endpoints
-------------------

The following are the endpoints available
    
### Charge
    POST /api/charge
    GET /api/charge
### Checkout
    POST /api/checkout
    GET /api/checkout

Instalation
-----------

The coinbase-commerce-php-sdk is available at GitHub. 
It requires [PHP Guzzle](http://docs.guzzlephp.org/en/latest/) and PHP 5.6 or later.

You will need to use [Composer](https://getcomposer.org/) to install
dependencies. Assuming you already have Composer:

### Via Composer command

```bash
$ composer require codename065/coinbase-commerce-php-sdk
```

### Via Composer update/install

To use the Coinbase Commerce PHP SDK from Composer:
* Add a `composer.json` file to your project and link to Coinbase Commerce:

```json
{
    "require": {
        "codename065/coinabse-commerce": "*"
    }
}
```

Run `composer install` or `composer update` to download the latest version and dependencies.

### Via Git (clone)

First, clone the repository:

```bash
# git clone https://github.com/codename065/coinbase-commerce.git # optionally, specify the directory in which to clone
$ cd path/to/install
```

Then, you can run the composer command to install:

```bash
$ composer install
```

Usage
-----

### Architecture

The SDK has a very simple architecture:

      HTTP Client       to communicate with Coinbase Commerce servers
      Models            Data Objects, to hold and transport data

### Using the SDK

Below you can find an example for the Charge endpoint ( \charge )

```
<?php

// Include Composer autoload
require_once ('vendor/autoload.php');

// Create a client
$client = new \WPDMPP\Coinbase\Commerce\Client();
$client->setApiKey('{your API Key}')

// Prepare the charge
$charge = new \WPDMPP\Coinbase\Commerce\Model\Charge();

// Create local price
$money = new \WPDMPP\Coinbase\Commerce\Model\Money();
$money->SetAmount('5.00');
$money->SetCurrency('USD');

$charge->setName('$5 Talk Credits');
$charge->setDescription('Talk to Anyone, Anytime!');
$charge->setPricingType('fixed_price');
$charge->setLocalPrice($money);
$charge->setRedirectUrl('{https://your.site.com}');

try{
    // Create the request and get back Coinbase Commerce response
    $response = $client->createCharge($charge);
}catch(\Exception $ex){
    echo $ex->getMessage();
}

// Print response
echo ($response);

```
### Hosted URL
![](https://s3.amazonaws.com/ntedata/svn/coinbasecommerce_sdk1.png)

### Congratulations, You're done!

Any questions regarding the Coinbase Commerce PHP SDK , don't hesitate to contact us at support@wpdownloadmanager.com

### Sell Digital Products Securely

Coinbase payment gateway for <a href="https://www.wpdownloadmanager.com/">WordPress Download Manager</a>

https://www.wpdownloadmanager.com/download/coinbase-payment-gateway/
