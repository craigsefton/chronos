<?php

namespace Chronos;

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
    abstract public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0);

    /**
     * @param string $format
     * @return string
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    abstract public function format($format);

    /**
     * @param string $modify
     * @return ChronosInterface
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    abstract public function modify(string $modify);

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return false|ChronosInterface
     */
    abstract public function setDate(int $year, int $month, int $day);

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
    public static function validate(string $dateTimeString, string $format = self::DATE_MYSQL) : bool
    {
        $d = \DateTime::createFromFormat($format, $dateTimeString);
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
    public function startOfMinute() : ChronosInterface
    {
        return $this->setTime((int)$this->format('G'), (int)$this->format('i'));
    }

    /**
     * Set current object to the end of the current minute.
     *
     * @return ChronosInterface
     */
    public function endOfMinute() : ChronosInterface
    {
        return $this->setTime((int)$this->format('G'), (int)$this->format('i'), 59);
    }

    /**
     * Set the current object to the previous minute, preserving seconds.
     *
     * @return ChronosInterface
     */
    public function previousMinute() : ChronosInterface
    {
        return $this->modify('-1 minute');
    }

    /**
     * Set the current object to the next minute, preserving seconds.
     *
     * @return ChronosInterface
     */
    public function nextMinute() : ChronosInterface
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
    public function startOfHour() : ChronosInterface
    {
        return $this->setTime((int)$this->format('G'), 0);
    }

    /**
     * Set current object to the end of the current hour.
     *
     * @return ChronosInterface
     */
    public function endOfHour() : ChronosInterface
    {
        return $this->setTime((int)$this->format('G'), 59, 59);
    }

    /**
     * Set current object to the previous hour, preserving seconds and minutes.
     *
     * @return ChronosInterface
     */
    public function previousHour() : ChronosInterface
    {
        return $this->modify('-1 hour');
    }

    /**
     * Set current object to the next hour, preserving seconds and minutes.
     *
     * @return ChronosInterface
     */
    public function nextHour() : ChronosInterface
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
    public function startOfDay() : ChronosInterface
    {
        return $this->setTime(0, 0);
    }

    /**
     * Set current object to the end of the day.
     *
     * @return ChronosInterface
     */
    public function endOfDay() : ChronosInterface
    {
        return $this->setTime(23, 59, 59);
    }

    /**
     * Set current object 1 day ago, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function previousDay() : ChronosInterface
    {
        return $this->modify('-1 day');
    }

    /**
     * Set current object 1 day ahead, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextDay() : ChronosInterface
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
    public function previousWeek() : ChronosInterface
    {
        return $this->modify('-1 week');
    }

    /**
     * Set current object to one week ahead, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function nextWeek() : ChronosInterface
    {
        return $this->modify('+1 week');
    }

    /**
     * Set current object to the first day of the week, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfWeek() : ChronosInterface
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
    public function lastDayOfWeek() : ChronosInterface
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
    public function firstDayOfMonth() : ChronosInterface
    {
        return $this->setDate($this->format('Y'), $this->format('m'), 1);
    }

    /**
     * Set object to the end of the month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfMonth() : ChronosInterface
    {
        return $this->setDate($this->format('Y'), $this->format('m'), $this->format('t'));
    }

    /**
     * Set current object to start of previous month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfPreviousMonth() : ChronosInterface
    {
        return $this->lastDayOfPreviousMonth()->firstDayOfMonth();
    }

    /**
     * Set current object to the end of the previous month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfPreviousMonth() : ChronosInterface
    {
        return $this->firstDayOfMonth()->modify('-1 day');
    }

    /**
     * Set current object to start of next month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfNextMonth() : ChronosInterface
    {
        return $this->lastDayOfMonth()->modify('+1 day');
    }

    /**
     * Set current object to the end of next month, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfNextMonth() : ChronosInterface
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
    public function previousYear() : ChronosInterface
    {
        return $this->modify('-1 year');
    }

    /**
     * Set the current date object to exactly one year from now.
     *
     * @return ChronosInterface
     */
    public function nextYear() : ChronosInterface
    {
        return $this->modify('+1 year');
    }

    /**
     * Set object to the first day of the year, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function firstDayOfYear() : ChronosInterface
    {
        return $this->setDate($this->format('Y'), 1, 1);
    }

    /**
     * Set current object to the last day of the year, preserving the current timestamp.
     *
     * @return ChronosInterface
     */
    public function lastDayOfYear() : ChronosInterface
    {
        return $this->setDate($this->format('Y'), 12, 31);
    }

    /**
     * Get the current default format.
     *
     * @return string
     */
    public function getDefaultPrintFormat() : string
    {
        return $this->defaultPrintFormat;
    }

    /**
     * Returns the current start date of the week, numbered from 0 (Sunday) to 6 (Saturday).
     *
     * @return int
     */
    public function getStartDayOfWeek() : int
    {
        return $this->startDayOfWeek;
    }

    /**
     * Convert ChronosInterface to a string.
     *
     * @return string
     */
    public function __toString() : string
    {
        return $this->format($this->defaultPrintFormat);
    }
}
