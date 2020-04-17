<?php
/**
 * @file
 * ChronosDateTimeImmutable: An extension of the base PHP DateTimeImmutable class
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
 * @method ChronosDateTimeImmutable|false add(\DateInterval $interval)
 * @method ChronosDateTimeImmutable|false modify(string $modify)
 * @method ChronosDateTimeImmutable|false setDate(int $year, int $month, int $day)
 * @method static ChronosDateTimeImmutable|false __set_state(array $array)
 * @method ChronosDateTimeImmutable|false setISODate(int $year, int $month, int $day = 1)
 * @method ChronosDateTimeImmutable|false setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0)
 * @method ChronosDateTimeImmutable|false setTimestamp(int $unixtimestamp)
 * @method ChronosDateTimeImmutable|false setTimezone(\DateTimeZone $timezone)
 * @method ChronosDateTimeImmutable|false sub(\DateInterval $interval)
 * @method ChronosDateTimeImmutable startOfMinute()
 * @method ChronosDateTimeImmutable endOfMinute()
 * @method ChronosDateTimeImmutable previousMinute()
 * @method ChronosDateTimeImmutable nextMinute()
 * @method ChronosDateTimeImmutable startOfHour()
 * @method ChronosDateTimeImmutable endOfHour()
 * @method ChronosDateTimeImmutable previousHour()
 * @method ChronosDateTimeImmutable nextHour()
 * @method ChronosDateTimeImmutable startOfDay()
 * @method ChronosDateTimeImmutable endOfDay()
 * @method ChronosDateTimeImmutable previousDay()
 * @method ChronosDateTimeImmutable nextDay()
 * @method ChronosDateTimeImmutable previousWeek()
 * @method ChronosDateTimeImmutable nextWeek()
 * @method ChronosDateTimeImmutable firstDayOfWeek()
 * @method ChronosDateTimeImmutable lastDayOfWeek()
 * @method ChronosDateTimeImmutable firstDayOfMonth()
 * @method ChronosDateTimeImmutable lastDayOfMonth()
 * @method ChronosDateTimeImmutable firstDayOfPreviousMonth()
 * @method ChronosDateTimeImmutable lastDayOfPreviousMonth()
 * @method ChronosDateTimeImmutable firstDayOfNextMonth()
 * @method ChronosDateTimeImmutable lastDayOfNextMonth()
 * @method ChronosDateTimeImmutable previousYear()
 * @method ChronosDateTimeImmutable nextYear()
 * @method ChronosDateTimeImmutable firstDayOfYear()
 * @method ChronosDateTimeImmutable lastDayOfYear()
 */
class ChronosDateTimeImmutable extends \DateTimeImmutable implements ChronosInterface
{
    use ChronosTrait;

    /**
     * @param \DateTime $dateTime Note that the declaration is not strongly typed; php throws an error.
     * @return ChronosDateTimeImmutable
     * @throws \Exception
     */
    public static function createFromMutable($dateTime) : ChronosDateTimeImmutable
    {
        return static::convert(\DateTimeImmutable::createFromMutable($dateTime));
    }

    /**
     * @param string $format
     * @param string $time
     * @param \DateTimeZone|null $timezone
     * @return ChronosDateTimeImmutable|false
     */
    public static function createFromFormat($format, $time, \DateTimeZone $timezone = null)
    {
        $dateTime = \DateTimeImmutable::createFromFormat($format, $time, $timezone);
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
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosDateTimeImmutable
     * @throws \Exception
     */
    public static function convert(
        \DateTimeInterface $date,
        string $format = ChronosInterface::DATE_MYSQL
    ) : ChronosInterface {
        return new static($date->format($format), $date->getTimezone());
    }

    /**
     * @param int $startDayOfWeek
     * @return ChronosDateTimeImmutable
     * @throws \InvalidArgumentException
     */
    public function setStartDayOfWeek(int $startDayOfWeek) : ChronosInterface
    {
        $clone = clone $this;
        if (!is_int($startDayOfWeek) || !array_key_exists($startDayOfWeek, ChronosInterface::DAYS_OF_WEEK)) {
            throw new \InvalidArgumentException(
                'Start day of the week should be a number from 0 (Sunday) to 6 (Saturday).'
            );
        }
        $clone->startDayOfWeek = $startDayOfWeek;
        return $clone;
    }

    /**
     * @param string $defaultPrintFormat
     * @return ChronosDateTimeImmutable
     */
    public function setDefaultPrintFormat(string $defaultPrintFormat) : ChronosInterface
    {
        $clone = clone $this;
        $clone->defaultPrintFormat = $defaultPrintFormat;
        return $clone;
    }
}
