Apelsin
=======
Integration with the "Apelsin" payment system

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist uzdevid/yii2-apelsin "dev-main"
```

or add

```
"uzdevid/yii2-apelsin": "dev-main"
```

to the require section of your `composer.json` file.

***

Usage
-----

**Note: You can use this extension after creating a contract between the Apelsin service and your company. And you can
use most of the methods only when you create your company as a payment system through the Central Bank of the Republic
of Uzbekistan.**

---

Login and password can be obtained from the technical specialists of the Apelsin service

```php
    $config = [
        'login' => '<login>',
        'password' => '<password>'
    ];
```

Creating an instance of a class

```php
    $apelsin = new uzdevid\apelsin\Apelsin($config);
```

### Working with cards

***

#### Getting p2p information about the card (cards.get_p2p_info)

params:

1. card number is string

```php
    $card = $apelsin->card->info('<card number>');
```

***

#### Getting card data by card number and expiry date (cards.get)

params:

1. card number is string or array
2. expiry date is string

```php
    $card = $apelsin->card->data('<card number>', '<expiry date>');
```

or (cards.get_some)

```php
    $cards = [
        ['token' => '<token_1>', 'expire' => '<expire_1>'],
        ['token' => '<token_2>', 'expire' => '<expire_2>'],
        ['token' => '<token_3>', 'expire' => '<expire_3>'],
    ];
    $card = $apelsin->card->data($cards);
```

***

#### Getting card data by token (cards.get)

params:

1. token is string or array

```php
    $card = $apelsin->card->dataByToken('<token>');
```

or (cards.get_some)

```php
    $tokens = ['<token_1>', '<token_2>', '<token_3>'];
    $card = $apelsin->card->dataByToken($tokens);
```

***

#### Getting a phone number linked to a card by card number and expiry date (cards.get_phone)

params:

1. card number is string
2. expiry date is string

```php
    $card = $apelsin->card->phone('<card number>', '<expiry date>');
```

***

#### Getting a phone number linked to a card by token (cards.get_phone)

params:

1. token is string

```php
    $card = $apelsin->card->phoneByToken('<token>');
```

***

#### Method that will block the card (cards.block)

params:

1. token is string

```php
    $card = $apelsin->card->block('<token>');
```