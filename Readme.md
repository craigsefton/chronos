# Chronos Date & Time Library

A drop-in replacement for PHP's `\DateTime` and `\DateTimeImmutable` objects that provides additional functionality.

## Installation
### Via Composer
1. Run the command: ```composer require "craigsefton/chronos:^2.0"```

### Manual Installation
1. Clone this repository: ```git clone git@github.com:craigsefton/chronos.git```
2. Change to the cloned folder, e.g.: ```cd chronos```
3. Run command ```composer install``` 

## Testing Your Installation
Tests have been written in PHPUnit, which should have been installed as part of
the composer installation (PHPUnit is a dev dependency).

To run all tests, run the command ```vendor/bin/phpunit``` from within the
Chronos folder.

## Example ChronosDateTime Usage
`ChronosDateTime` extends the default PHP `\DateTime` class, and provides some additional
functionality.

```php
use \Chronos\ChronosDateTime;
$date = new ChronosDateTime('2015-03-15 23:00:00');
echo $date->lastDayOfYear()->startOfDay();
// Prints Thu, 31 Dec 2015 00:00:00 +0000
```
## Example ChronosDateTimeImmutable Usage

There is now also `ChronosDateTimeImmutable` to be a drop-in replacement for `\DateTimeImmutable`.

```php
use \Chronos\ChronosDateTimeImmutable;
$date = new ChronosDateTimeImmutable('2015-03-15 23:00:00');
echo $date->lastDayOfYear()->startOfDay();
// Prints Thu, 31 Dec 2015 00:00:00 +0000
echo $date;
// Prints Sun, 15 Mar 2015 23:00:00 +0000
```

## Default Print Format

As you can see, you can also print objects. A default format for printing can be set using
`$date->setDefaultPrintFormat()`.

## Months

There are several methods to manipulate months but, due to the fact that months are variable in length, there are no
`nextMonth` or `lastMonth` methods.

## Weeks
In addition to methods allowing you to manipulate a date using weeks, Chronos allows you to define what is considered to
be the start day of the week. Previously, version 1.0 would default to using Monday as the start of the week. However,
this felt incorrect, and it was better to leave this up to the programmer.

```php
use \Chronos\ChronosDateTime;
$date = new ChronosDateTime('2015-03-15 23:00:00');
echo $date->firstDayOfWeek()->startOfDay();
// Prints Mon, 09 Mar 2015 00:00:00 +0000
```

## Time

In all cases, time is preserved unless a `startOf` or `endOf` method is called, or any  method that specifically alters
hours, minutes, or seconds. For example:

```php
use \Chronos\ChronosDateTime;
$date = new ChronosDateTime('2015-03-15 23:00:00');
echo $date->firstDayOfWeek();
// Prints Mon, 09 Mar 2015 23:00:00 +0000
echo $date->startOfDay();
// Prints Mon, 09 Mar 2015 00:00:00 +0000
```

## Timezones
Usage of TimeZones now works the same as the normal DateTime library. Previously, in version 1.0, default was UTC,
however this felt wrong and confusing, and has changed in v2.0.

## Date Validation
The class also implements an excellent date validator, taken from
http://php.net/function.checkdate#113205

```php
use \Chronos\ChronosDateTime;
// False
echo ChronosDateTime::validate('2012-02-30 12:12:12');
echo ChronosDateTime::validate('14:77', 'H:i');
// True
echo ChronosDateTime::validate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O');
```
