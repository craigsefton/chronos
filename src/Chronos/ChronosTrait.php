<?php

namespace Chronos;

/**
 * Trait ChronosTrait
 * @package Chronos
 * @method static ChronosInterface createFromFormat($format, $dateTimeString, $timezone=null)
 */
trait ChronosTrait
{
    /**
     * @var string The default format when the object is printed.
     */
    private $defaultPrintFormat = ChronosInterface::RSS;

    /**
     * @var int Number from 0 (Sunday) to 6 (Saturday) representing the start day of the week.
     */
    private $startDayOfWeek = 0;

    /**
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $microseconds
     * @return bool|ChronosInterface
     */
    abstract public function setTime($hour, $minute, $second = 0, $microseconds = 0);

    /**
     * @param string $format
     * @return string
     */
    abstract public function format($format);

    /**
     * @param string $modify
     * @return ChronosInterface
     */
    abstract public function modify($modify);

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return false|ChronosInterface
     */
    abstract public function setDate($year, $month, $day);

    /**
     * @static For a given string in a given format, validate whether or not it is
     * a legitimate date.
     *
     * Validation method found on PHP.net.
     * @link http://php.net/function.checkdate#113205
     *
     * @param string $dateTimeString The date time string in a specified format.
     * @param string $format The format of the date string we are validating. Default is Y-m-d H:i:s.
     * @return bool False if not a valid date time string, true if it is.
     */
    public static function validate($dateTimeString, $format = self::MYSQL)
    {
        $d = static::createFromFormat($format, $dateTimeString);
        return $d && $d->format($format) === $dateTimeString;
    }

    /**
     * ===========================================================================
     * Minute Methods
     * ===========================================================================
     */
    /**
     * Set current object to the start of the current minute.
     *
     * @return ChronosInterface
     */
    public function startOfMinute()
    {
        return $this->setTime((int)$this->format('G'), (int)$this->format('i'));
    }

    /**
     * Set current object to the end of the current minute.
     *
     * @return ChronosInterface
     */
    public function endOfMinute()
    {
        return $this->setTime((int)$this->format('G'), (int)$this->format('i'), 59);
    }

    /**
     * Set the current object to the previous minute, preserving seconds.
     *
     * @return ChronosInterface
     */
    public function previousMinute()
    {
        return $this->modify('-1 minute');
    }

    /**
     * Set the current object to the next minute, preserving seconds.
     *
     * @return ChronosInterface
     */
    public function nextMinute()
    {
        return $this->modify('+1 minute');
    }

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
    public function startOfHour()
    {
        return $this->setTime((int)$this->format('G'), 0);
    }

    /**
     * Set current object to the end of the current hour.
     *
     * @return ChronosInterface
     */
    public function endOfHour()
    {
        return $this->setTime((int)$this->format('G'), 59, 59);
    }

    /**
     * Set current object to the previous hour, preserving seconds and minutes.
     *
     * @return ChronosInterface
     */
    public function previousHour()
    {
        return $this->modify('-1 hour');
    }

    /**
     * Set current object to the next hour, preserving seconds and minutes.
     *
     * @return ChronosInterface
     */
    public function nextHour()
    {
        return $this->modify('+1 hour');
    }

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
    public function startOfDay()
    {
        return $this->setTime(0, 0);
    }

    /**
     * Set current object to the end of the day.
     *
     * @return ChronosInterface
     */
    public function endOfDay()
    {
        return $this->setTime(23, 59, 59);
    }

    /**
     * Set current object 1 day ago, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function previousDay()
    {
        return $this->modify('-1 day');
    }

    /**
     * Set current object 1 day ahead, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextDay()
    {
        return $this->modify('+1 day');
    }

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
    public function previousWeek()
    {
        return $this->modify('-1 week');
    }

    /**
     * Set current object to one week ahead, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextWeek()
    {
        return $this->modify('+1 week');
    }

    /**
     * Set current object to the first day of the week, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfWeek()
    {
        $currentDay = (int)$this->format('w');
        $difference = $currentDay >= $this->startDayOfWeek
            ? $currentDay - $this->startDayOfWeek
            : 7 - ($this->startDayOfWeek - $currentDay);
        return $this->modify('-' . $difference . ' days');
    }

    /**
     * Set current object to the last day of the week, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfWeek()
    {
        return $this->firstDayOfWeek()->modify('+6 days');
    }

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
    public function firstDayOfMonth()
    {
        return $this->setDate($this->format('Y'), $this->format('m'), 1);
    }

    /**
     * Set object to the end of the month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfMonth()
    {
        return $this->setDate($this->format('Y'), $this->format('m'), $this->format('t'));
    }

    /**
     * Set current object to start of previous month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfPreviousMonth()
    {
        return $this->lastDayOfPreviousMonth()->firstDayOfMonth();
    }

    /**
     * Set current object to the end of the previous month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfPreviousMonth()
    {
        return $this->firstDayOfMonth()->modify('-1 day');
    }

    /**
     * Set current object to start of next month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfNextMonth()
    {
        return $this->lastDayOfMonth()->modify('+1 day');
    }

    /**
     * Set current object to the end of next month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfNextMonth()
    {
        return $this->firstDayOfNextMonth()->lastDayOfMonth();
    }

    /**
     * ===========================================================================
     * Year Methods
     * ===========================================================================
     */
    /**
     * Set the current date object to exactly one year ago.
     *
     * @return ChronosInterface
     */
    public function previousYear()
    {
        return $this->modify('-1 year');
    }

    /**
     * Set the current date object to exactly one year from now.
     *
     * @return ChronosInterface
     */
    public function nextYear()
    {
        return $this->modify('+1 year');
    }

    /**
     * Set object to the first day of the year, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfYear()
    {
        return $this->setDate($this->format('Y'), 1, 1);
    }

    /**
     * Set current object to the last day of the year, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfYear()
    {
        return $this->setDate($this->format('Y'), 12, 31);
    }

    /**
     * Get the current default format.
     *
     * @return string
     */
    public function getDefaultPrintFormat()
    {
        return $this->defaultPrintFormat;
    }

    /**
     * Set a default format for printing static objects.
     *
     * @param string $defaultPrintFormat
     * @return static
     */
    public function setDefaultPrintFormat($defaultPrintFormat)
    {
        $this->defaultPrintFormat = $defaultPrintFormat;
        return $this;
    }

    /**
     * @param int $startDayOfWeek
     * @throws \InvalidArgumentException if the start day of the week is invalid.
     * @return static
     */
    public function setStartDayOfWeek($startDayOfWeek)
    {
        if (!is_int($startDayOfWeek) || !array_key_exists($startDayOfWeek, ChronosInterface::DAYS_OF_WEEK)) {
            throw new \InvalidArgumentException(
                'Start day of the week should be a number from 0 (Sunday) to 6 (Saturday).'
            );
        }
        $this->startDayOfWeek = $startDayOfWeek;
        return $this;
    }

    /**
     * Returns the current start date of the week, numbered from 0 (Sunday) to 6 (Saturday).
     *
     * @return int
     */
    public function getStartDayOfWeek()
    {
        return $this->startDayOfWeek;
    }

    /**
     * Convert ChronosInterface to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format($this->defaultPrintFormat);
    }
}
