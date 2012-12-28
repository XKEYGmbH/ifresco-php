ifresco-php
===========

ifresco php client

- DEVELOPMENT NOW! NOT USEABLE!!!!

Getting started
---------------

### Installing via Composer

The recommended way to install ifresco-php is through [Composer](http://getcomposer.org).

1. Add ``XKEYGmbH/ifresco-php`` as a dependency in your project's ``composer.json`` file:

        {
            "require": {
                "XKEYGmbH/ifresco-php": "*"
            }
        }


2. Download and install Composer:

        curl -s http://getcomposer.org/installer | php

3. Install your dependencies:

        php composer.phar install

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

        require 'vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).