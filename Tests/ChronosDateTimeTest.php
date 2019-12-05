<?php

use Chronos\ChronosDateTime;

class ChronosDateTimeTest extends PHPUnit_Framework_TestCase
{
    /**
     * ===========================================================================
     * Minute tests
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfMinute()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:30');
        $date->startOfMinute();
        $this->assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMinute()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:30');
        $date->endOfMinute();
        $this->assertEquals('2014-01-01 23:10:59', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousMinute()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:30');
        $date->previousMinute();
        $this->assertEquals('2014-01-01 23:09:30', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextMinute()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:30');
        $date->nextMinute();
        $this->assertEquals('2014-01-01 23:11:30', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * ===========================================================================
     * Hour Tests
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfHour()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:00');
        $date->startOfHour();
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfHour()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:00');
        $date->endOfHour();
        $this->assertEquals('2014-01-01 23:59:59', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousHour()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:10:00');
        $date->previousHour();
        $this->assertEquals('2014-01-01 22:10:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextHour()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 22:10:00');
        $date->nextHour();
        $this->assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * ===========================================================================
     * Day tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfDay()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:00:00');
        $date->startOfDay();
        $this->assertEquals('2014-01-01 00:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfDay()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:00:00');
        $date->endOfDay();
        $this->assertEquals('2014-01-01 23:59:59', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousDay()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:00:00');
        $date->previousDay();
        $this->assertEquals('2013-12-31 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextDay()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:00:00');
        $date->nextDay();
        $this->assertEquals('2014-01-02 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * ===========================================================================
     * Month tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfMonth()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->firstDayOfMonth();
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMonth()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->lastDayOfMonth();
        $this->assertEquals('2014-01-31 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfPreviousMonth()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->firstDayOfPreviousMonth();
        $this->assertEquals('2013-12-01 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfPreviousMonth()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->lastDayOfPreviousMonth();
        $this->assertEquals('2013-12-31 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfNextMonth()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:00:00');
        $date->firstDayOfNextMonth();
        $this->assertEquals('2014-02-01 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfNextMonth()
    {
        $date = new Chronos\ChronosDateTime('2014-01-01 23:00:00');
        $date->lastDayOfNextMonth();
        $this->assertEquals('2014-02-28 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * ===========================================================================
     * Year tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testPreviousYear()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->previousYear();
        $this->assertEquals('2013-01-11 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextYear()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->nextYear();
        $this->assertEquals('2015-01-11 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfYear()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->firstDayOfYear();
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfYear()
    {
        $date = new Chronos\ChronosDateTime('2014-01-11 23:00:00');
        $date->lastDayOfYear();
        $this->assertEquals('2014-12-31 23:00:00', $date->format(ChronosDateTime::MYSQL));
    }

    /**
     * ===========================================================================
     * Week tests.
     * ===========================================================================
     */
    /**
     * @dataProvider previousWeekDataProvider
     * @param string $dateTime
     * @param string $expectedDateTime
     * @throws \Exception
     */
    public function testPreviousWeek($dateTime, $expectedDateTime)
    {
        $date = new ChronosDateTime($dateTime);
        $returnDate = $date->previousWeek();
        $this->assertEquals($expectedDateTime, $date->format(ChronosDateTime::MYSQL));
        $this->assertEquals($expectedDateTime, $returnDate->format(ChronosDateTime::MYSQL));
    }

    /**
     * @return array[]
     */
    public function previousWeekDataProvider()
    {
        return [
            ['2015-03-22 23:00:00', '2015-03-15 23:00:00'],
            ['2016-01-07 23:00:00', '2015-12-31 23:00:00'],
            ['2012-02-29 23:00:00', '2012-02-22 23:00:00'],
        ];
    }


    /**
     * @dataProvider nextWeekDataProvider
     * @param string $dateTime
     * @param string $expectedDateTime
     * @throws \Exception
     */
    public function testNextWeek($dateTime, $expectedDateTime)
    {
        $date = new ChronosDateTime($dateTime);
        $returnDate = $date->nextWeek();
        $this->assertEquals($expectedDateTime, $date->format(ChronosDateTime::MYSQL));
        $this->assertEquals($expectedDateTime, $returnDate->format(ChronosDateTime::MYSQL));
    }

    /**
     * @return array[]
     */
    public function nextWeekDataProvider()
    {
        return [
            ['2015-03-15 23:00:00', '2015-03-22 23:00:00'],
            ['2015-12-31 23:00:00', '2016-01-07 23:00:00'],
            ['2012-02-22 23:00:00', '2012-02-29 23:00:00'],
        ];
    }

    /**
     * @dataProvider startDayOfWeekDataProvider
     * @param string $dateTime
     * @param int $startDayOfWeek
     * @param string $expectedDateTime
     * @throws InvalidArgumentException
     * @throws \Exception
     */
    public function testFirstDayOfWeek($dateTime, $startDayOfWeek, $expectedDateTime)
    {
        $date = new ChronosDateTime($dateTime);
        $date->setStartDayOfWeek($startDayOfWeek);
        $date->firstDayOfWeek();
        $this->assertEquals($expectedDateTime, $date->format(ChronosDateTime::MYSQL));

        $this->expectException(\InvalidArgumentException::class);
        $date->setStartDayOfWeek(-1);
    }

    /**
     * @return array[]
     */
    public function startDayOfWeekDataProvider()
    {
        return [
            ['2015-03-15 23:00:00', ChronosDateTime::MONDAY, '2015-03-09 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::TUESDAY, '2015-03-10 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::WEDNESDAY, '2015-03-11 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::THURSDAY, '2015-03-12 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::FRIDAY, '2015-03-13 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::SATURDAY, '2015-03-14 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::SUNDAY, '2015-03-15 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::MONDAY, '2015-03-16 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::TUESDAY, '2015-03-10 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::WEDNESDAY, '2015-03-11 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::THURSDAY, '2015-03-12 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::FRIDAY, '2015-03-13 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::SATURDAY, '2015-03-14 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::SUNDAY, '2015-03-15 23:00:00'],
        ];
    }

    /*
     * ===========================================================================
     * Misc tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testConvertDateTime()
    {
        $date = new DateTime('2015-03-23 00:00:00', new DateTimeZone('Africa/Johannesburg'));
        $chronosDateTime = ChronosDateTime::convert($date);
        $this->assertEquals($date->getTimezone(), $chronosDateTime->getTimezone());
        $this->assertEquals($date->getTimestamp(), $chronosDateTime->getTimestamp());
        $this->assertEquals($date->format(ChronosDateTime::MYSQL), $chronosDateTime->format(ChronosDateTime::MYSQL));
    }

    /**
     * @throws PHPUnit_Framework_AssertionFailedError
     * @throws \Exception
     */
    public function testValidateDate()
    {
        $valid = ChronosDateTime::validate('2012-02-30 12:12:12');
        $this->assertFalse($valid);
        $valid = ChronosDateTime::validate('14:77', 'H:i');
        $this->assertFalse($valid);
        $valid = ChronosDateTime::validate('2012-02-30 12:12:12');
        $this->assertFalse($valid);
    }

    /**
     * @throws PHPUnit_Framework_Exception
     */
    public function testCreateFromFormat()
    {
        $date = ChronosDateTime::createFromFormat(ChronosDateTime::MYSQL, '2015-03-16 23:00:00');
        $this->assertInstanceOf(ChronosDateTime::class, $date);
        $this->assertEquals($date->format(ChronosDateTime::MYSQL), '2015-03-16 23:00:00');

        $this->assertFalse(
            ChronosDateTime::createFromFormat(ChronosDateTime::MYSQL, 'invalid date time')
        );
    }

    /**
     * @dataProvider setDefaultPrintFormatDataProvider
     * @param string $dateTime
     * @param string $format
     */
    public function testSetDefaultPrintFormat($dateTime, $format)
    {
        $date = ChronosDateTime::createFromFormat($format, $dateTime);
        $returnDate = $date->setDefaultPrintFormat($format);
        $this->assertEquals($format, $returnDate->getDefaultPrintFormat());
        $this->assertEquals($dateTime, (string)$returnDate);
    }

    /**
     * @return array[]
     */
    public function setDefaultPrintFormatDataProvider()
    {
        return [
            ['2015-03-16 23:00:00', ChronosDateTime::MYSQL],
            ['Mon, 16 Mar 2015 23:00:00 +0000', ChronosDateTime::RSS],
        ];
    }
}
