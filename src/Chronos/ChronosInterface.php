<?php

namespace Chronos;

/**
 * @todo Need to add __set_state to the interface, however, method signature between PHP7.2 and 7.4 is different.
 * Be good to figure out a way to do this safely.
 */
interface ChronosInterface extends \DateTimeInterface
{
    public const DATE_MYSQL = 'Y-m-d H:i:s';

    public const SUNDAY = 0;
    public const MONDAY = 1;
    public const TUESDAY = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY = 4;
    public const FRIDAY = 5;
    public const SATURDAY = 6;

    public const DAYS_OF_WEEK = [
        self::SUNDAY => 'Sunday',
        self::MONDAY => 'Monday',
        self::TUESDAY => 'Tuesday',
        self::WEDNESDAY => 'Wednesday',
        self::THURSDAY => 'Thursday',
        self::FRIDAY => 'Friday',
        self::SATURDAY => 'Saturday',
    ];

    /**
     * Set the current object to the start of the current minute.
     */
    public function startOfMinute() : ChronosInterface;

    /**
     * Set current object to the end of the current minute.
     */
    public function endOfMinute() : ChronosInterface;

    /**
     * Set the current object to the previous minute, preserving seconds.
     */
    public function previousMinute() : ChronosInterface;

    /**
     * Set the current object to the next minute, preserving seconds.
     */
    public function nextMinute() : ChronosInterface;

    /**
     * ===========================================================================
     * Hour Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the current hour.
     */
    public function startOfHour() : ChronosInterface;

    /**
     * Set current object to the end of the current hour.
     */
    public function endOfHour() : ChronosInterface;

    /**
     * Set current object to the previous hour, preserving seconds and minutes.
     */
    public function previousHour() : ChronosInterface;

    /**
     * Set current object to the next hour, preserving seconds and minutes.
     */
    public function nextHour() : ChronosInterface;

    /**
     * ===========================================================================
     * Day Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the day.
     */
    public function startOfDay() : ChronosInterface;

    /**
     * Set current object to the end of the day.
     */
    public function endOfDay() : ChronosInterface;

    /**
     * Set current object 1 day ago, preserving the current timestamp.
     */
    public function previousDay() : ChronosInterface;

    /**
     * Set current object 1 day ahead, preserving the current timestamp.
     */
    public function nextDay() : ChronosInterface;

    /**
     * ===========================================================================
     * Week Methods
     * ===========================================================================
     */
    /**
     * Set current object to one week ago, preserving the current timestamp.
     */
    public function previousWeek() : ChronosInterface;

    /**
     * Set current object to one week ahead, preserving the current timestamp.
     */
    public function nextWeek() : ChronosInterface;

    /**
     * Set current object to the first day of the week, preserving the current timestamp.
     */
    public function firstDayOfWeek() : ChronosInterface;

    /**
     * Set current object to the last day of the week, preserving the current timestamp.
     */
    public function lastDayOfWeek() : ChronosInterface;

    /**
     * ===========================================================================
     * Month Methods
     * ===========================================================================
     */
    /**
     * Set object to the start of the month, preserving the current timestamp.
     */
    public function firstDayOfMonth() : ChronosInterface;

    /**
     * Set object to the end of the month, preserving the current timestamp.
     */
    public function lastDayOfMonth() : ChronosInterface;

    /**
     * Set current object to start of previous month, preserving the current timestamp.
     */
    public function firstDayOfPreviousMonth() : ChronosInterface;

    /**
     * Set current object to the end of the previous month, preserving the current timestamp.
     */
    public function lastDayOfPreviousMonth() : ChronosInterface;

    /**
     * Set current object to start of next month, preserving the current timestamp.
     */
    public function firstDayOfNextMonth() : ChronosInterface;

    /**
     * Set current object to the end of next month, preserving the current timestamp.
     */
    public function lastDayOfNextMonth() : ChronosInterface;

    /**
     * ===========================================================================
     * Year Methods
     * ===========================================================================
     */
    /**
     * Set the current date object to exactly one year ago, preserving the current timestamp.
     */
    public function previousYear() : ChronosInterface;

    /**
     * Set the current date object to exactly one year from now, preserving the current timestamp.
     */
    public function nextYear() : ChronosInterface;

    /**
     * Set object to the first day of the year, preserving the current timestamp.
     */
    public function firstDayOfYear() : ChronosInterface;

    /**
     * Set current object to the last day of the year, preserving the current timestamp.
     */
    public function lastDayOfYear() : ChronosInterface;

    /**
     * @param int $startDayOfWeek
     * @return ChronosInterface
     * @throws \InvalidArgumentException if the start day of the week is invalid.
     */
    public function setStartDayOfWeek(int $startDayOfWeek) : ChronosInterface;

    public function getStartDayOfWeek() : int;

    /**
     * @static For a given string in a given format, validate whether or not it is a legitimate date.
     * @param string $dateTimeString The date time string in a specified format.
     * @param string $format The format of the date string we are validating. Default is MYSQL format, Y-m-d H:i:s.
     * @return bool False if not a valid date time string, true if it is.
     * @throws \Exception
     */
    public static function validate(string $dateTimeString, string $format = self::DATE_MYSQL) : bool;

    /**
     * @static Convert an object that implements DateTimeInterface, and convert it into a ChronosInterface.
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosInterface
     * @throws \Exception
     */
    public static function convert(
        \DateTimeInterface $date,
        string $format = ChronosInterface::DATE_MYSQL
    ) : ChronosInterface;

    public function setDefaultPrintFormat(string $defaultPrintFormat) : ChronosInterface;

    /**
     * @param \DateInterval $interval
     * @return ChronosInterface|false
     */
    public function add(\DateInterval $interval);

    /**
     * @param string $format
     * @param string $time
     * @param \DateTimeZone|null $timezone
     * @return ChronosInterface|false
     */
    public static function createFromFormat($format, $time, \DateTimeZone $timezone = null);

    /**
     * Note: we do not declare a return type here because it must be compatible with DateTime and DateTimeImmutable.
     * @return array
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public static function getLastErrors();

    /**
     * @param string $modify
     * @return ChronosInterface|false
     */
    public function modify(string $modify);

    /**
     * @param string $format
     * @return string|false
     */
    public function format($format);

    /**
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $microseconds
     * @return ChronosInterface|false
     */
    public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0);

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return ChronosInterface|false
     */
    public function setDate(int $year, int $month, int $day);

    /**
     * @param int $year
     * @param int $week
     * @param int $day
     * @return ChronosInterface|false
     */
    public function setISODate(int $year, int $week, int $day = 1);

    /**
     * @param int $unixtimestamp
     * @return ChronosInterface|false
     */
    public function setTimestamp(int $unixtimestamp);

    /**
     * @param \DateTimeZone $timeZone
     * @return ChronosInterface|false
     */
    public function setTimezone(\DateTimeZone $timeZone);

    /**
     * @param \DateInterval $interval
     * @return ChronosInterface|false
     */
    public function sub(\DateInterval $interval);

    public function __toString() : string;
}
