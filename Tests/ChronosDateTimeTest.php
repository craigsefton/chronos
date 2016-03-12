<?php

class ChronosDateTimeTest extends PHPUnit_Framework_TestCase
{
  /**
   * ===========================================================================
   * Minute tests
   * ===========================================================================
   */
  public function testStartOfMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->startOfMinute();
    $this->assertEquals("2014-01-01 23:10:00", $date->format('Y-m-d H:i:s'));
  }


  public function testEndOfMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->endOfMinute();
    $this->assertEquals("2014-01-01 23:10:59", $date->format('Y-m-d H:i:s'));
  }

  public function testPreviousMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->previousMinute();
    $this->assertEquals("2014-01-01 23:09:30", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfPreviousMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->startOfPreviousMinute();
    $this->assertEquals("2014-01-01 23:09:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfPreviousMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->endOfPreviousMinute();
    $this->assertEquals("2014-01-01 23:09:59", $date->format('Y-m-d H:i:s'));
  }

  public function testNextMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->nextMinute();
    $this->assertEquals("2014-01-01 23:11:30", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfNextMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->startOfNextMinute();
    $this->assertEquals("2014-01-01 23:11:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfNextMinute() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:30");
    $date->endOfNextMinute();
    $this->assertEquals("2014-01-01 23:11:59", $date->format('Y-m-d H:i:s'));
  }

  /**
   * ===========================================================================
   * Hour Tests
   * ===========================================================================
   */
  public function testStartOfHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:00");
    $date->startOfHour();
    $this->assertEquals("2014-01-01 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:00");
    $date->endOfHour();
    $this->assertEquals("2014-01-01 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testPreviousHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:00");
    $date->previousHour();
    $this->assertEquals("2014-01-01 22:10:00", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfPreviousHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:00");
    $date->startOfPreviousHour();
    $this->assertEquals("2014-01-01 22:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfPreviousHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:10:00");
    $date->endOfPreviousHour();
    $this->assertEquals("2014-01-01 22:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testNextHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 22:10:00");
    $date->nextHour();
    $this->assertEquals("2014-01-01 23:10:00", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfNextHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 22:10:00");
    $date->startOfNextHour();
    $this->assertEquals("2014-01-01 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfNextHour() {
    $date = new Chronos\ChronosDateTime("2014-01-01 22:10:00");
    $date->endOfNextHour();
    $this->assertEquals("2014-01-01 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  /**
   * ===========================================================================
   * Day tests.
   * ===========================================================================
   */
  public function testStartOfDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->startOfDay();
    $this->assertEquals("2014-01-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->endOfDay();
    $this->assertEquals("2014-01-01 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testPreviousDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->previousDay();
    $this->assertEquals("2013-12-31 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testNextDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->nextDay();
    $this->assertEquals("2014-01-02 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfPreviousDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->startOfPreviousDay();
    $this->assertEquals("2013-12-31 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfPreviousDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->endOfPreviousDay();
    $this->assertEquals("2013-12-31 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfNextDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->startOfNextDay();
    $this->assertEquals("2014-01-02 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfNextDay() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->endOfNextDay();
    $this->assertEquals("2014-01-02 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  /**
   * ===========================================================================
   * Month tests.
   * ===========================================================================
   */
  public function testStartOfMonth() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->startOfMonth();
    $this->assertEquals("2014-01-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfMonth() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->endOfMonth();
    $this->assertEquals("2014-01-31 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfPreviousMonth() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->startOfPreviousMonth();
    $this->assertEquals("2013-12-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfPreviousMonth() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->endOfPreviousMonth();
    $this->assertEquals("2013-12-31 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfNextMonth() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->startOfNextMonth();
    $this->assertEquals("2014-02-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfNextMonth() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->endOfNextMonth();
    $this->assertEquals("2014-02-28 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  /**
   * ===========================================================================
   * Year tests.
   * ===========================================================================
   */
  public function testPreviousYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->previousYear();
    $this->assertEquals("2013-01-11 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testNextYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->nextYear();
    $this->assertEquals("2015-01-11 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfDayPreviousYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->startOfDayPreviousYear();
    $this->assertEquals("2013-01-11 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfDayPreviousYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->endOfDayPreviousYear();
    $this->assertEquals("2013-01-11 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfDayNextYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->startOfDayNextYear();
    $this->assertEquals("2015-01-11 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfDayNextYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->endOfDayNextYear();
    $this->assertEquals("2015-01-11 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->startOfYear();
    $this->assertEquals("2014-01-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfYear() {
    $date = new Chronos\ChronosDateTime("2014-01-11 23:00:00");
    $date->endOfYear();
    $this->assertEquals("2014-12-31 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfPreviousYear() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->startOfPreviousYear();
    $this->assertEquals("2013-01-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfPreviousYear() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->endOfPreviousYear();
    $this->assertEquals("2013-12-31 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfNextYear() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->startOfNextYear();
    $this->assertEquals("2015-01-01 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfNextYear() {
    $date = new Chronos\ChronosDateTime("2014-01-01 23:00:00");
    $date->endOfNextYear();
    $this->assertEquals("2015-12-31 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  /**
   * ===========================================================================
   * Week tests.
   * ===========================================================================
   */
  public function testPreviousWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->previousWeek();
    $this->assertEquals("2015-03-08 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testNextWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->nextWeek();
    $this->assertEquals("2015-03-22 23:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfDayPreviousWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->startOfDayPreviousWeek();
    $this->assertEquals("2015-03-08 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfDayPreviousWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->endOfDayPreviousWeek();
    $this->assertEquals("2015-03-08 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfDayNextWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->startOfDayNextWeek();
    $this->assertEquals("2015-03-22 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfDayNextWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->endOfDayNextWeek();
    $this->assertEquals("2015-03-22 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfFirstDayOfWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->startOfFirstDayOfWeek();
    $this->assertEquals("2015-03-09 00:00:00", $date->format('Y-m-d H:i:s'));

    $date = new \Chronos\ChronosDateTime("2015-03-16 23:00:00");
    $date->startOfFirstDayOfWeek();
    $this->assertEquals("2015-03-16 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfLastDayOfWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->endOfLastDayOfWeek();
    $this->assertEquals("2015-03-15 23:59:59", $date->format('Y-m-d H:i:s'));

    $date = new \Chronos\ChronosDateTime("2015-03-16 23:00:00");
    $date->endOfLastDayOfWeek();
    $this->assertEquals("2015-03-22 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfFirstDayOfPreviousWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->startOfFirstDayOfPreviousWeek();
    $this->assertEquals("2015-03-02 00:00:00", $date->format('Y-m-d H:i:s'));

    $date = new \Chronos\ChronosDateTime("2015-03-16 23:00:00");
    $date->startOfFirstDayOfPreviousWeek();
    $this->assertEquals("2015-03-09 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfLastDayOfPreviousWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->endOfLastDayOfPreviousWeek();
    $this->assertEquals("2015-03-08 23:59:59", $date->format('Y-m-d H:i:s'));

    $date = new \Chronos\ChronosDateTime("2015-03-16 23:00:00");
    $date->endOfLastDayOfPreviousWeek();
    $this->assertEquals("2015-03-15 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  public function testStartOfFirstDayOfNextWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->startOfFirstDayOfNextWeek();
    $this->assertEquals("2015-03-16 00:00:00", $date->format('Y-m-d H:i:s'));

    $date = new \Chronos\ChronosDateTime("2015-03-16 23:00:00");
    $date->startOfFirstDayOfNextWeek();
    $this->assertEquals("2015-03-23 00:00:00", $date->format('Y-m-d H:i:s'));
  }

  public function testEndOfLastDayOfNextWeek() {
    $date = new \Chronos\ChronosDateTime("2015-03-15 23:00:00");
    $date->endOfLastDayOfNextWeek();
    $this->assertEquals("2015-03-22 23:59:59", $date->format('Y-m-d H:i:s'));

    $date = new \Chronos\ChronosDateTime("2015-03-16 23:00:00");
    $date->endOfLastDayOfNextWeek();
    $this->assertEquals("2015-03-29 23:59:59", $date->format('Y-m-d H:i:s'));
  }

  /*
   * ===========================================================================
   * Misc tests.
   * ===========================================================================
   */
  public function testConvertDateTime() {
    $date = new DateTime(
      '2015-03-23 00:00:00', new DateTimeZone('Africa/Johannesburg')
    );
    $chronos_date = \Chronos\ChronosDateTime::convertToChronosDateTime($date);
    $this->assertEquals($date->getTimezone(), $chronos_date->getTimezone());
    $this->assertEquals($date->getTimestamp(), $chronos_date->getTimestamp());
    $this->assertEquals(
      $date->format('Y-m-d H:i:s'), $chronos_date->format('Y-m-d H:i:s')
    );
  }

  public function testValidateDate() {
    $valid = \Chronos\ChronosDateTime::validateDate('2012-02-30 12:12:12');
    $this->assertFalse($valid);
    $valid = \Chronos\ChronosDateTime::validateDate('14:77', 'H:i');
    $this->assertFalse($valid);
  }
}