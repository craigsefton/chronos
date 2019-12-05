<?php

namespace Chronos;

interface ChronosInterface extends \DateTimeInterface
{
    const MYSQL = 'Y-m-d H:i:s';

    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;

    const DAYS_OF_WEEK = [
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
     *
     * @return ChronosInterface
     */
    public function startOfMinute();

    /**
     * Set current object to the end of the current minute.
     *
     * @return ChronosInterface
     */
    public function endOfMinute();

    /**
     * Set the current object to the previous minute, preserving seconds.
     *
     * @return ChronosInterface
     */
    public function previousMinute();

    /**
     * Set the current object to the next minute, preserving seconds.
     *
     * @return ChronosInterface
     */
    public function nextMinute();

    /**
     * ===========================================================================
     * Hour Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the current hour.
     *
     * @return ChronosInterface
     */
    public function startOfHour();

    /**
     * Set current object to the end of the current hour.
     *
     * @return ChronosInterface
     */
    public function endOfHour();

    /**
     * Set current object to the previous hour, preserving seconds and minutes.
     *
     * @return ChronosInterface
     */
    public function previousHour();

    /**
     * Set current object to the next hour, preserving seconds and minutes.
     *
     * @return ChronosInterface
     */
    public function nextHour();

    /**
     * ===========================================================================
     * Day Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the day.
     *
     * @return ChronosInterface
     */
    public function startOfDay();

    /**
     * Set current object to the end of the day.
     *
     * @return ChronosInterface
     */
    public function endOfDay();

    /**
     * Set current object 1 day ago, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function previousDay();

    /**
     * Set current object 1 day ahead, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextDay();

    /**
     * ===========================================================================
     * Week Methods
     * ===========================================================================
     */
    /**
     * Set current object to one week ago, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function previousWeek();

    /**
     * Set current object to one week ahead, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextWeek();

    /**
     * Set current object to the first day of the week, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfWeek();

    /**
     * Set current object to the last day of the week, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfWeek();

    /**
     * ===========================================================================
     * Month Methods
     * ===========================================================================
     */
    /**
     * Set object to the start of the month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfMonth();

    /**
     * Set object to the end of the month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfMonth();

    /**
     * Set current object to start of previous month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfPreviousMonth();

    /**
     * Set current object to the end of the previous month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfPreviousMonth();

    /**
     * Set current object to start of next month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfNextMonth();

    /**
     * Set current object to the end of next month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfNextMonth();

    /**
     * ===========================================================================
     * Year Methods
     * ===========================================================================
     */
    /**
     * Set the current date object to exactly one year ago, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function previousYear();

    /**
     * Set the current date object to exactly one year from now, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextYear();

    /**
     * Set object to the first day of the year, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfYear();

    /**
     * Set current object to the last day of the year, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfYear();

    /**
     * @param int $startDayOfWeek
     * @return ChronosInterface
     * @throws \InvalidArgumentException if the start day of the week is invalid.
     */
    public function setStartDayOfWeek($startDayOfWeek);

    /**
     * @return int
     */
    public function getStartDayOfWeek();

    /**
     * @static For a given string in a given format, validate whether or not it is a legitimate date.
     * @param string $dateTimeString The date time string in a specified format.
     * @param string $format The format of the date string we are validating. Default is MYSQL format, Y-m-d H:i:s.
     * @return bool False if not a valid date time string, true if it is.
     * @throws \Exception
     */
    public static function validate($dateTimeString, $format = self::MYSQL);

    /**
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosInterface
     * @throws \Exception
     */
    public static function convert(\DateTimeInterface $date, $format = ChronosInterface::MYSQL);
}
