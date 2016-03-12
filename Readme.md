# Chronos Date & Time Library

## Installation
### Via Composer
1. Run the command: ```composer require "craigsefton/chronos:*"```

### Manual Installation
1. Clone this repository: ```git clone git@github.com:craigsefton/chronos.git```
2. Change to the cloned folder, e.g.: ```cd chronos```
3. Run command ```composer install``` 

## Testing Your Installation
All tests are built using PHPUnit, which should have been installed as part of
the composer installation (PHPUnit is a dev dependency).

To run all tests, run the command ```vendor/bin/phpunit``` from within the
Chronos folder.

## Example Usage
This extends the default PHP DateTime class, and provides some additional
functionality. All methods manipulate the current object, unless stipulated
otherwise. In addition, all methods return the current object, so methods can
be chained, if desired.

```php
use \Chronos\ChronosDateTime;
$date = new ChronosDateTime("2015-03-15 23:00:00");
echo $date->endOfYear()->startOfDay();
// Prints Thu, 31 Dec 2015 00:00:00 +0000
```

As you can see, you can also print objects. A default format for printing can
be set using `$date->setDefaultFormat()`.

## Timezones
One import thing to note is that the default TimeZone for Chronos is UTC.
Otherwise, usage of TimeZones works the same as the normal DateTime library.

## Start of week
In addition, the library treats the starting day of a week to be Monday, and the
end of the week to be Sunday. This is slightly different to how PHP normally

```php
use \Chronos\ChronosDateTime;
$date = new ChronosDateTime("2015-03-15 23:00:00");
echo $date->startOfFirstDayOfWeek();
// Prints Mon, 09 Mar 2015 00:00:00 +0000
```

## Date Validation
The class also implements an excellent date validator, taken from
http://php.net/function.checkdate#113205

```php
use \Chronos\ChronosDateTime;
// False
echo ChronosDateTime::validateDate('2012-02-30 12:12:12');
echo ChronosDateTime::validateDate('14:77', 'H:i');
// True
echo ChronosDateTime::validateDate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O');
```
