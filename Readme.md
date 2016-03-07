# Chronos Date & Time Library

## Installation
### Via Composer
1. Run the command: ```composer require "craigsefton/chronos:*"```

### Manual Installation
1. Clone this repository: ``git clone git@github.com:craigsefton/chronos.git``
2. Change to the cloned folder, e.g.: ``cd chronos``
3. Run command ```composer install``` 

## Testing Your Installation
All tests are built using PHPUnit, which should have been installed as part of
the composer installation (PHPUnit is a dev dependency).

To run all tests, run the command ```vendor/bin/phpunit``` from within the
Chronos folder.

## ChronosDateTime Library

This extends the default PHP DateTime class, and provides some additional
functionality. All methods manipulate the current object, unless stipulated
otherwise. In addition, all methods return the current object, so methods can
be chained, if desired. For examples, look in the Tests folder.

One import thing to note is that the default TimeZone for Chronos is UTC.
