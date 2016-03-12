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

use \DateTime;
use \DateTimeZone;

/**
 * Class ChronosDateTime
 *
 * @package Chronos
 */
class ChronosDateTime extends \DateTime {

  protected $defaultFormat = self::RSS;

  /**
   * Custom constructor. Defaults to UTC timezone if timezone isn't supplied.
   *
   * @param string $time
   *   The date string, the timestamp in '@1306123200' format, or "now" for the
   *   current time.
   * @param DateTimeZone $timezone
   *   The timezone, if required. Default is NULL.
   */
  public function __construct($time = "now", DateTimeZone $timezone = NULL) {
    if (empty($timezone)) {
      $timezone = new DateTimeZone("UTC");
    }
    parent::__construct($time, $timezone);
    $this->setTimezone($timezone);
  }
  /**
   * ===========================================================================
   * Minute Methods
   * ===========================================================================
   */
  /**
   * Set current object to the start of the current minute.
   *
   * @return ChronosDateTime
   */
  public function startOfMinute() {
    return $this->setTime(
      (int) $this->format('G'), (int) $this->format('i'), 0
    );
  }

  /**
   * Set current object to the end of the current minute.
   *
   * @return ChronosDateTime
   */
  public function endOfMinute() {
    return $this->setTime(
      (int) $this->format('G'), (int) $this->format('i'), 59
    );
  }

  /**
   * Set the current object to the previous minute, preserving seconds.
   *
   * @return ChronosDateTime
   */
  public function previousMinute() {
    return $this->modify('-1 minute');
  }

  /**
   * Set the current object to the start of the previous minute.
   *
   * @return ChronosDateTime
   */
  public function startOfPreviousMinute() {
    return $this->previousMinute()->startOfMinute();
  }

  /**
   * Set the current object to the end of the previous minute.
   *
   * @return ChronosDateTime
   */
  public function endOfPreviousMinute() {
    return $this->previousMinute()->endOfMinute();
  }

  /**
   * Set the current object to the next minute, preserving seconds.
   *
   * @return ChronosDateTime
   */
  public function nextMinute() {
    return $this->modify('+1 minute');
  }

  /**
   * Set the current object to the start of the next minute.
   *
   * @return ChronosDateTime
   */
  public function startOfNextMinute() {
    return $this->nextMinute()->startOfMinute();
  }

  /**
   * Set the current object to the end of the next minute.
   *
   * @return ChronosDateTime
   */
  public function endOfNextMinute() {
    return $this->nextMinute()->endOfMinute();
  }
  /**
   * ===========================================================================
   * Hour Methods
   * ===========================================================================
   */
  /**
   * Set current object to the start of the current hour.
   *
   * @return ChronosDateTime
   */
  public function startOfHour() {
    return $this->setTime((int) $this->format('G'), 0, 0);
  }

  /**
   * Set current object to the end of the current hour.
   *
   * @return ChronosDateTime
   */
  public function endOfHour() {
    return $this->setTime((int) $this->format('G'), 59, 59);
  }

  /**
   * Set current object to the previous hour, preserving seconds and minutes.
   *
   * @return ChronosDateTime
   */
  public function previousHour() {
    return $this->modify("-1 hour");
  }

  /**
   * Set current object to the start of the previous hour.
   *
   * @return ChronosDateTime
   */
  public function startOfPreviousHour() {
    return $this->previousHour()->startOfHour();
  }

  /**
   * Set current object to the end of the previous hour.
   *
   * @return ChronosDateTime
   */
  public function endOfPreviousHour() {
    return $this->previousHour()->endOfHour();
  }

  /**
   * Set current object to the next hour, preserving seconds and minutes.
   *
   * @return ChronosDateTime
   */
  public function nextHour() {
    return $this->modify("+1 hour");
  }

  /**
   * Set current object to the start of the next hour.
   *
   * @return ChronosDateTime
   */
  public function startOfNextHour() {
    return $this->nextHour()->startOfHour();
  }

  /**
   * Set current object to the end of the next hour.
   *
   * @return ChronosDateTime
   */
  public function endOfNextHour() {
    return $this->nextHour()->endOfHour();
  }

  /**
   * ===========================================================================
   * Day Methods
   * ===========================================================================
   */
  /**
   * Set current object to the start of the day.
   *
   * @return ChronosDateTime
   */
  public function startOfDay() {
    return $this->setTime(0, 0, 0);
  }

  /**
   * Set current object to the end of the day.
   *
   * @return ChronosDateTime
   */
  public function endOfDay() {
    return $this->setTime(23, 59, 59);
  }

  /**
   * Set current object 1 day behind, preserving the current timestamp.
   *
   * @return ChronosDateTime
   */
  public function previousDay() {
    return $this->modify('-1 day');
  }

  /**
   * Set current object to the start of yesterday.
   *
   * @return ChronosDateTime
   */
  public function startOfPreviousDay() {
    return $this->previousDay()->startOfDay();
  }

  /**
   * Set current object to end of yesterday.
   *
   * @return ChronosDateTime
   */
  public function endOfPreviousDay() {
    return $this->previousDay()->endOfDay();
  }

  /**
   * Set current object 1 day ahead, preserving the current timestamp.
   *
   * @return ChronosDateTime
   */
  public function nextDay() {
    return $this->modify('+1 day');
  }

  /**
   * Set current object to start of tomorrow.
   *
   * @return ChronosDateTime
   */
  public function startOfNextDay() {
    return $this->nextDay()->startOfDay();
  }

  /**
   * Set current object to end of tomorrow.
   *
   * @return ChronosDateTime
   */
  public function endOfNextDay() {
    return $this->nextDay()->endOfDay();
  }

  /**
   * ===========================================================================
   * Week Methods
   * ===========================================================================
   */
  /**
   * Set current object to one week ago, preserving the current timestamp.
   *
   * @return ChronosDateTime
   */
  public function previousWeek() {
    return $this->modify('-1 week');
  }

  /**
   * Set current object to the start of day, one week ago.
   *
   * @return ChronosDateTime
   */
  public function startOfDayPreviousWeek() {
    return $this->previousWeek()->startOfDay();
  }

  /**
   * Set current object to the end of day, one week ago.
   *
   * @return ChronosDateTime
   */
  public function endOfDayPreviousWeek() {
    return $this->previousWeek()->endOfDay();
  }

  /**
   * Set current object to one week ahead, preserving the current timestamp.
   *
   * @return ChronosDateTime
   */
  public function nextWeek() {
    return $this->modify('+1 week');
  }

  /**
   * Set current object to start of day one week ahead.
   *
   * @return ChronosDateTime
   */
  public function startOfDayNextWeek() {
    return $this->nextWeek()->startOfDay();
  }

  /**
   * Set current object to end of day, next week.
   *
   * @return ChronosDateTime
   */
  public function endOfDayNextWeek() {
    return $this->nextWeek()->endOfDay();
  }

  /**
   * Set current object to the start of the week i.e. the last Monday.
   *
   * @return ChronosDateTime
   */
  public function startOfFirstDayOfWeek() {
    $monday = 'Monday this week';
    // If current day is a Sunday, we need the Monday from last week since PHP
    // considers Sunday to be the start of the week, not Monday.
    if ('Sunday' == $this->format('l')) {
      $monday = 'Monday last week';
    }
    return $this->modify($monday);
  }

  /**
   * Set object to the end of the week (Sunday).
   *
   * @return ChronosDateTime
   */
  public function endOfLastDayOfWeek() {
    return $this->startOfFirstDayOfWeek()->endOfDay()->modify('+6 days');
  }

  /**
   * Set object to the start of next week (Monday).
   *
   * @return ChronosDateTime
   */
  public function startOfFirstDayOfNextWeek() {
    return $this->startOfFirstDayOfWeek()->nextWeek();
  }

  /**
   * Set object to the end of next week (Sunday).
   *
   * @return ChronosDateTime
   */
  public function endOfLastDayOfNextWeek() {
    return $this->endOfLastDayOfWeek()->nextWeek();
  }

  /**
   * Set object to the start of last week (Monday).
   *
   * @return ChronosDateTime
   */
  public function startOfFirstDayOfPreviousWeek() {
    return $this->startOfFirstDayOfWeek()->previousWeek();
  }

  /**
   * Set object to the end of last week (Sunday).
   *
   * @return ChronosDateTime
   */
  public function endOfLastDayOfPreviousWeek() {
    return $this->endOfLastDayOfWeek()->previousWeek();
  }

  /**
   * ===========================================================================
   * Month Methods
   * ===========================================================================
   */
  /**
   * Set object to the start of the month.
   *
   * @return ChronosDateTime
   */
  public function startOfMonth() {
    return $this->startOfDay()->setDate(
      $this->format("Y"), $this->format("m"), 1
    );
  }

  /**
   * Set object to the end of the month.
   *
   * @return ChronosDateTime
   */
  public function endOfMonth() {
    return $this->endOfDay()->setDate(
      $this->format("Y"), $this->format("m"), $this->format("t")
    );
  }

  /**
   * Set current object to start of previous month.
   *
   * @return ChronosDateTime
   */
  public function startOfPreviousMonth() {
    return $this->endOfPreviousMonth()->startOfMonth();
  }

  /**
   * Set current object to the end of the previous month.
   *
   * @return ChronosDateTime
   */
  public function endOfPreviousMonth() {
    return $this->startOfMonth()->modify('-1 second');
  }

  /**
   * Set current object to start of next month.
   *
   * @return ChronosDateTime
   */
  public function startOfNextMonth() {
    return $this->endOfMonth()->modify('+1 second');
  }

  /**
   * Set current object to the end of next month.
   *
   * @return ChronosDateTime
   */
  public function endOfNextMonth() {
    return $this->startOfNextMonth()->endOfMonth();
  }

  /**
   * ===========================================================================
   * Year Methods
   * ===========================================================================
   */
  /**
   * Set the current date object to exactly one year ago.
   *
   * @return ChronosDateTime
   */
  public function previousYear() {
    return $this->modify('-1 year');
  }

  /**
   * Set the current date object to exactly one year from now.
   *
   * @return ChronosDateTime
   */
  public function nextYear() {
    return $this->modify('+1 year');
  }

  /**
   * Set the current date object to the start of the day one year ago.
   *
   * @return ChronosDateTime
   */
  public function startOfDayPreviousYear() {
    return $this->previousYear()->startOfDay();
  }

  /**
   * Set the current date object to the end of the day one year ago.
   *
   * @return ChronosDateTime
   */
  public function endOfDayPreviousYear() {
    return $this->previousYear()->endOfDay();
  }

  /**
   * Set the current date object to the start of the day one year from now.
   *
   * @return ChronosDateTime
   */
  public function startOfDayNextYear() {
    return $this->nextYear()->startOfDay();
  }

  /**
   * Set the current date object to the end of the day one year from now.
   *
   * @return ChronosDateTime
   */
  public function endOfDayNextYear() {
    return $this->nextYear()->endOfDay();
  }

  /**
   * Set object to the start of the year.
   *
   * @return ChronosDateTime
   */
  public function startOfYear() {
    return $this->startOfDay()->setDate($this->format("Y"), 1, 1);
  }

  /**
   * Set current object to the end of the year.
   *
   * @return ChronosDateTime
   */
  public function endOfYear() {
    return $this->endOfDay()->setDate($this->format("Y"), 12, 31);
  }

  /**
   * Set current object to the start of the previous year.
   *
   * @return ChronosDateTime
   */
  public function startOfPreviousYear() {
    return $this->previousYear()->startOfYear();
  }

  /**
   * Set current object to the end of the previous year.
   *
   * @return ChronosDateTime
   */
  public function endOfPreviousYear() {
    return $this->previousYear()->endOfYear();
  }

  /**
   * Set current object to the start of next year.
   *
   * @return ChronosDateTime
   */
  public function startOfNextYear() {
    return $this->endOfYear()->modify('+1 second');
  }

  /**
   * Set current object to the end of next year.
   *
   * @return ChronosDateTime
   */
  public function endOfNextYear() {
    return $this->startOfNextYear()->endOfYear();
  }

  /**
   * @static Convert a DateTime object to a ChronosDateTime object. This is
   * helpful when, for example, you have a DatePeriod collection of DateTime
   * objects, and you want to convert them into ChronosDateTime objects.
   *
   * @param DateTime $date
   *   The DateTime object.
   *
   * @return ChronosDateTime
   */
  public static function convertToChronosDateTime(DateTime $date) {
    return new self($date->format('Y-m-d H:i:s'), $date->getTimezone());
  }

  /**
   * @static For a given string in a given format, validate whether or not it is
   * a legitimate date.
   * @link http://php.net/function.checkdate#113205
   *
   * @param string $date
   *   The date string in a specified format.
   * @param string $format
   *   The format of the date string we are validating.
   *
   * @return bool
   *   True if it is a valid date, false if not.
   */
  public static function validateDate($date, $format='Y-m-d H:i:s') {
    $d = self::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }

  /**
   * Convert ChronosDateTime to a string.
   *
   * @return string
   */
  public function __toString() {
    return $this->format($this->defaultFormat);
  }

  /**
   * Get the current default format.
   *
   * @return string
   */
  public function getDefaultFormat() {
    return $this->defaultFormat;
  }

  /**
   * Set a default format for printing ChronosDateTime objects.
   *
   * @param string $defaultFormat
   */
  public function setDefaultFormat($defaultFormat) {
    $this->defaultFormat = $defaultFormat;
  }

}
