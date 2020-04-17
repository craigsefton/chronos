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
 * @method ChronosDateTime|false add(\DateInterval $interval)
 * @method ChronosDateTime|false modify(string $modify)
 * @method ChronosDateTime|false setDate(int $year, int $month, int $day)
 * @method static ChronosDateTime|false __set_state(array $array)
 * @method ChronosDateTime|false setISODate(int $year, int $month, int $day = 1)
 * @method ChronosDateTime|false setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0)
 * @method ChronosDateTime|false setTimestamp(int $unixtimestamp)
 * @method ChronosDateTime|false setTimezone(\DateTimeZone $timezone)
 * @method ChronosDateTime|false sub(\DateInterval $interval)
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
    public static function convert(
        \DateTimeInterface $date,
        string $format = ChronosInterface::DATE_MYSQL
    ) : ChronosInterface {
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

    /**
     * Set a default format for printing static objects.
     *
     * @param string $defaultPrintFormat
     * @return ChronosDateTime
     */
    public function setDefaultPrintFormat($defaultPrintFormat) : ChronosInterface
    {
        $this->defaultPrintFormat = $defaultPrintFormat;
        return $this;
    }

    /**
     * @param int $startDayOfWeek
     * @throws \InvalidArgumentException if the start day of the week is invalid.
     * @return ChronosDateTime
     */
    public function setStartDayOfWeek(int $startDayOfWeek) : ChronosInterface
    {
        if (!is_int($startDayOfWeek) || !array_key_exists($startDayOfWeek, ChronosInterface::DAYS_OF_WEEK)) {
            throw new \InvalidArgumentException(
                'Start day of the week should be a number from 0 (Sunday) to 6 (Saturday).'
            );
        }
        $this->startDayOfWeek = $startDayOfWeek;
        return $this;
    }
}
