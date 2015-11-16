Invoker Web Interface
=====================

Invoker web interface is the view to manage data of institutes, courses and the block times for [invoker android application](https://github.com/suryaharshan1/Invoker-Android-Client/) .

The interface is build upon [Yii2 Basic Project Template v2.0.6](https://packagist.org/packages/yiisoft/yii2-app-basic)

AUTHORS
-------

[Surya Harsha  Nunnaguppala](https://github.com/suryaharshan1)
[Vishnu Priya Matha](https://github.com/vishnupriyam)

INSTALLATION
------------

1. Download the zip file and extract or clone this repository to your server htdocs
2. Open the terminal and go into the project directory. For details regarding composer check [here](http://getcomposer.org/doc/00-intro.md#installation-nix) . This will install the required vendor files.

~~~
    php composer.phar update
~~~

CONFIGURATION
-------------

### Database

The database structure dump can be found in 'data' folder. Create a database and import the structure and set the database config as given below.

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

### Google Cloud messaging

For push notifications using google cloud messaging, add your api key in 'controllers/BlockTimeController.php'

``` php

$gcmClient = new GcmClient('YOUR_API_KEY');

```

### Login

Set the login username and passwords in 'models/User.php'
