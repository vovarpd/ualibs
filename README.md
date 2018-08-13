# ualibs
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/VChukh/ualibs/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/VChukh/ualibs/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/VChukh/ualibs/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/VChukh/ualibs/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/VChukh/ualibs/badges/build.png?b=master)](https://scrutinizer-ci.com/g/VChukh/ualibs/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/VChukh/ualibs/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Build Status](https://travis-ci.org/VChukh/ualibs.svg?branch=master)](https://travis-ci.org/VChukh/ualibs)


UaLibs is a simple PHP library for fetching User-Agent string for different browsers, like Chrome, Edge, Opera, Safari, Internet Explorer, Android Webkit.

It uses User-Agent data from next package: https://github.com/tamimibrahim17/List-of-user-agents. 

## Installation

### Composer

Add ua-libs in your composer.json or create a new composer.json:

```js
{
    "require": {
        "vchukh/ua-libs": "~1.0"
    }
}
```

Now tell composer to download the library by running the command:

``` bash
$ php composer.phar install
```

Composer will generate the autoloader file automatically. So you only have to include this.
Typically its located in the vendor dir and its called autoload.php

## Basic Usage:
This library is using the PSR-0 standard: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
So you can use any autoloader which fits into this standard.
The tests directory contains an example bootstrap file.

``` php
<?php

$ualibs = new UaLibs();

var_dump($ualibs->get()); // get all available user agents
var_dump($ualibs->getRandom()); // get random user-agent

var_dump($ualibs->getChrome()); // get all available Chrome user agents
var_dump($ualibs->getChromeRandom()); // get Chrome random user agent

```
