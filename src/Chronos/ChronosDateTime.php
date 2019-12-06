<?php
/**
 * @file
 * ChronosDateTime: An extension of the base PHP DateTime and DatePeriod objects
 * to provide some useful, additional functionality.
 *
 * @author    Craig Sefton <craig@craigsefton.com>
 * @license   MIT License
 * @category  DateTime
 * @package   Chronos
 * @link      https://github.com/craigsefton/chronos/
 *
 */

namespace Chronos;

/**
 * @method ChronosDateTime|false setTime($hour, $minute, $second = 0, $microseconds = 0)
 * @method ChronosDateTime setStartDayOfWeek($startDayOfWeek)
 * @method ChronosDateTime modify($modify)
 * @method ChronosDateTime|false setDate($year, $month, $day)
 * @method ChronosDateTime startOfMinute()
 * @method ChronosDateTime endOfMinute()
 * @method ChronosDateTime previousMinute()
 * @method ChronosDateTime nextMinute()
 * @method ChronosDateTime startOfHour()
 * @method ChronosDateTime endOfHour()
 * @method ChronosDateTime previousHour()
 * @method ChronosDateTime nextHour()
 * @method ChronosDateTime startOfDay()
 * @method ChronosDateTime endOfDay()
 * @method ChronosDateTime previousDay()
 * @method ChronosDateTime nextDay()
 * @method ChronosDateTime previousWeek()
 * @method ChronosDateTime nextWeek()
 * @method ChronosDateTime firstDayOfWeek()
 * @method ChronosDateTime lastDayOfWeek()
 * @method ChronosDateTime firstDayOfMonth()
 * @method ChronosDateTime lastDayOfMonth()
 * @method ChronosDateTime firstDayOfPreviousMonth()
 * @method ChronosDateTime lastDayOfPreviousMonth()
 * @method ChronosDateTime firstDayOfNextMonth()
 * @method ChronosDateTime lastDayOfNextMonth()
 * @method ChronosDateTime previousYear()
 * @method ChronosDateTime nextYear()
 * @method ChronosDateTime firstDayOfYear()
 * @method ChronosDateTime lastDayOfYear()
 * @method ChronosDateTime setDefaultPrintFormat($format)
 */
class ChronosDateTime extends \DateTime implements ChronosInterface
{
    use ChronosTrait;

    /**
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosDateTime
     * @throws \Exception
     */
    public static function convert(\DateTimeInterface $date, string $format = ChronosInterface::MYSQL) : ChronosInterface
    {
        return new static($date->format($format), $date->getTimezone());
    }

    /**
     * @param string $format
     * @param string $time
     * @param \DateTimeZone|null $timezone
     * @return ChronosDateTime|false
     */
    public static function createFromFormat($format, $time, \DateTimeZone $timezone = null)
    {
        $dateTime = \DateTime::createFromFormat($format, $time, $timezone);
        if (false === $dateTime) {
            return false;
        }

        // Instead of throwing an exception, we return false in order to keep the behaviour the same.
        try {
            return static::convert($dateTime);
        } catch (\Exception $e) {
            return false;
        }
    }
}
