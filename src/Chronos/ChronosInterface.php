<?php

namespace Chronos;

interface ChronosInterface extends \DateTimeInterface
{
    public const MYSQL = 'Y-m-d H:i:s';

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
     * @return ChronosInterface
     */
    public function startOfMinute() : ChronosInterface;

    /**
     * Set current object to the end of the current minute.
     * @return ChronosInterface
     */
    public function endOfMinute() : ChronosInterface;

    /**
     * Set the current object to the previous minute, preserving seconds.
     * @return ChronosInterface
     */
    public function previousMinute() : ChronosInterface;

    /**
     * Set the current object to the next minute, preserving seconds.
     * @return ChronosInterface
     */
    public function nextMinute() : ChronosInterface;

    /**
     * ===========================================================================
     * Hour Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the current hour.
     * @return ChronosInterface
     */
    public function startOfHour() : ChronosInterface;

    /**
     * Set current object to the end of the current hour.
     * @return ChronosInterface
     */
    public function endOfHour() : ChronosInterface;

    /**
     * Set current object to the previous hour, preserving seconds and minutes.
     * @return ChronosInterface
     */
    public function previousHour() : ChronosInterface;

    /**
     * Set current object to the next hour, preserving seconds and minutes.
     * @return ChronosInterface
     */
    public function nextHour() : ChronosInterface;

    /**
     * ===========================================================================
     * Day Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the day.
     * @return ChronosInterface
     */
    public function startOfDay() : ChronosInterface;

    /**
     * Set current object to the end of the day.
     * @return ChronosInterface
     */
    public function endOfDay() : ChronosInterface;

    /**
     * Set current object 1 day ago, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function previousDay() : ChronosInterface;

    /**
     * Set current object 1 day ahead, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function nextDay() : ChronosInterface;

    /**
     * ===========================================================================
     * Week Methods
     * ===========================================================================
     */
    /**
     * Set current object to one week ago, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function previousWeek() : ChronosInterface;

    /**
     * Set current object to one week ahead, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function nextWeek() : ChronosInterface;

    /**
     * Set current object to the first day of the week, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function firstDayOfWeek() : ChronosInterface;

    /**
     * Set current object to the last day of the week, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function lastDayOfWeek() : ChronosInterface;

    /**
     * ===========================================================================
     * Month Methods
     * ===========================================================================
     */
    /**
     * Set object to the start of the month, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function firstDayOfMonth() : ChronosInterface;

    /**
     * Set object to the end of the month, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function lastDayOfMonth() : ChronosInterface;

    /**
     * Set current object to start of previous month, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function firstDayOfPreviousMonth() : ChronosInterface;

    /**
     * Set current object to the end of the previous month, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function lastDayOfPreviousMonth() : ChronosInterface;

    /**
     * Set current object to start of next month, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function firstDayOfNextMonth() : ChronosInterface;

    /**
     * Set current object to the end of next month, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function lastDayOfNextMonth() : ChronosInterface;

    /**
     * ===========================================================================
     * Year Methods
     * ===========================================================================
     */
    /**
     * Set the current date object to exactly one year ago, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function previousYear() : ChronosInterface;

    /**
     * Set the current date object to exactly one year from now, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function nextYear() : ChronosInterface;

    /**
     * Set object to the first day of the year, preserving the current timestamp.
     * @return ChronosInterface
     */
    public function firstDayOfYear() : ChronosInterface;

    /**
     * Set current object to the last day of the year, preserving the current timestamp.
     * @return ChronosInterface
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
    public static function validate(string $dateTimeString, string $format = self::MYSQL) : bool;

    /**
     * @static Convert an object that implements DateTimeInterface, and convert it into a ChronosInterface.
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosInterface
     * @throws \Exception
     */
    public static function convert(
        \DateTimeInterface $date,
        string $format = ChronosInterface::MYSQL
    ) : ChronosInterface;
}
