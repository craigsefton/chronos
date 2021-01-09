<?php

/**
 * @todo Fix Chronos Tests for TypeErrors now that we're using strict types.
 */

namespace ChronosTests;

use Chronos\ChronosDateTime;
use PHPUnit\Framework\TestCase;

class ChronosDateTimeTest extends TestCase
{
    /**
     * ===========================================================================
     * Minute tests
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfMinute(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:30');
        $date->startOfMinute();
        self::assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMinute(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:30');
        $date->endOfMinute();
        self::assertEquals('2014-01-01 23:10:59', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousMinute(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:30');
        $date->previousMinute();
        self::assertEquals('2014-01-01 23:09:30', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextMinute(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:30');
        $date->nextMinute();
        self::assertEquals('2014-01-01 23:11:30', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * ===========================================================================
     * Hour Tests
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfHour(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:00');
        $date->startOfHour();
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfHour(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:00');
        $date->endOfHour();
        self::assertEquals('2014-01-01 23:59:59', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousHour(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:10:00');
        $date->previousHour();
        self::assertEquals('2014-01-01 22:10:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextHour(): void
    {
        $date = new ChronosDateTime('2014-01-01 22:10:00');
        $date->nextHour();
        self::assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * ===========================================================================
     * Day tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfDay(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:00:00');
        $date->startOfDay();
        self::assertEquals('2014-01-01 00:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfDay(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:00:00');
        $date->endOfDay();
        self::assertEquals('2014-01-01 23:59:59', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousDay(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:00:00');
        $date->previousDay();
        self::assertEquals('2013-12-31 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextDay(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:00:00');
        $date->nextDay();
        self::assertEquals('2014-01-02 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * ===========================================================================
     * Month tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfMonth(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->firstDayOfMonth();
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMonth(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->lastDayOfMonth();
        self::assertEquals('2014-01-31 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfPreviousMonth(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->firstDayOfPreviousMonth();
        self::assertEquals('2013-12-01 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfPreviousMonth(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->lastDayOfPreviousMonth();
        self::assertEquals('2013-12-31 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfNextMonth(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:00:00');
        $date->firstDayOfNextMonth();
        self::assertEquals('2014-02-01 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfNextMonth(): void
    {
        $date = new ChronosDateTime('2014-01-01 23:00:00');
        $date->lastDayOfNextMonth();
        self::assertEquals('2014-02-28 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * ===========================================================================
     * Year tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testPreviousYear(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->previousYear();
        self::assertEquals('2013-01-11 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextYear(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->nextYear();
        self::assertEquals('2015-01-11 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfYear(): void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->firstDayOfYear();
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfYear() : void
    {
        $date = new ChronosDateTime('2014-01-11 23:00:00');
        $date->lastDayOfYear();
        self::assertEquals('2014-12-31 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));
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
    public function testPreviousWeek($dateTime, $expectedDateTime) : void
    {
        $date = new ChronosDateTime($dateTime);
        $returnDate = $date->previousWeek();
        self::assertEquals($expectedDateTime, $date->format(ChronosDateTime::DATE_MYSQL));
        self::assertEquals($expectedDateTime, $returnDate->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @return array[]
     */
    public function previousWeekDataProvider() : array
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
    public function testNextWeek(string $dateTime, string $expectedDateTime) : void
    {
        $date = new ChronosDateTime($dateTime);
        $returnDate = $date->nextWeek();
        self::assertEquals($expectedDateTime, $date->format(ChronosDateTime::DATE_MYSQL));
        self::assertEquals($expectedDateTime, $returnDate->format(ChronosDateTime::DATE_MYSQL));
    }

    /**
     * @return array[]
     */
    public function nextWeekDataProvider() : array
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
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function testFirstDayOfWeek(string $dateTime, int $startDayOfWeek, string $expectedDateTime) : void
    {
        $date = new ChronosDateTime($dateTime);
        $date->setStartDayOfWeek($startDayOfWeek);
        $date->firstDayOfWeek();
        self::assertEquals($expectedDateTime, $date->format(ChronosDateTime::DATE_MYSQL));

        $this->expectException(\InvalidArgumentException::class);
        $date->setStartDayOfWeek(-1);
    }

    /**
     * @return array[]
     */
    public function startDayOfWeekDataProvider() : array
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

    /**
     * @return array[]
     */
    public function lastDayOfWeekDataProvider() : array
    {
        return [
            ['2015-03-15 23:00:00', ChronosDateTime::MONDAY, '2015-03-15 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::TUESDAY, '2015-03-16 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::WEDNESDAY, '2015-03-17 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::THURSDAY, '2015-03-18 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::FRIDAY, '2015-03-19 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::SATURDAY, '2015-03-20 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTime::SUNDAY, '2015-03-21 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::MONDAY, '2015-03-22 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::TUESDAY, '2015-03-16 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::WEDNESDAY, '2015-03-17 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::THURSDAY, '2015-03-18 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::FRIDAY, '2015-03-19 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::SATURDAY, '2015-03-20 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTime::SUNDAY, '2015-03-21 23:00:00'],
        ];
    }

    /**
     * @dataProvider lastDayOfWeekDataProvider
     * @param string $dateTime
     * @param int $startDayOfWeek
     * @param string $expectedDateTime
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function testLastDayOfWeek(string $dateTime, int $startDayOfWeek, string $expectedDateTime) : void
    {
        $date = new ChronosDateTime($dateTime);
        $date->setStartDayOfWeek($startDayOfWeek);
        $date->lastDayOfWeek();
        self::assertEquals($expectedDateTime, $date->format(ChronosDateTime::DATE_MYSQL));
    }

    /*
     * ===========================================================================
     * Misc tests.
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testConvertDateTime(): void
    {
        $date = new \DateTime('2015-03-23 00:00:00', new \DateTimeZone('Africa/Johannesburg'));
        $chronosDateTime = ChronosDateTime::convert($date);
        self::assertEquals($date->getTimezone(), $chronosDateTime->getTimezone());
        self::assertEquals($date->getTimestamp(), $chronosDateTime->getTimestamp());
        self::assertEquals(
            $date->format(ChronosDateTime::DATE_MYSQL),
            $chronosDateTime->format(ChronosDateTime::DATE_MYSQL)
        );
    }

    /**
     * @throws \Exception
     */
    public function testValidateDate(): void
    {
        $valid = ChronosDateTime::validate('2012-02-30 12:12:12');
        self::assertFalse($valid);
        $valid = ChronosDateTime::validate('14:77', 'H:i');
        self::assertFalse($valid);
        $valid = ChronosDateTime::validate('2012-02-30 12:12:12');
        self::assertFalse($valid);
    }

    /**
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testCreateFromFormat() : void
    {
        $date = ChronosDateTime::createFromFormat(ChronosDateTime::DATE_MYSQL, '2015-03-16 23:00:00');
        self::assertInstanceOf(ChronosDateTime::class, $date);
        self::assertEquals('2015-03-16 23:00:00', $date->format(ChronosDateTime::DATE_MYSQL));

        self::assertFalse(
            ChronosDateTime::createFromFormat(ChronosDateTime::DATE_MYSQL, 'invalid date time')
        );
    }

    /**
     * @dataProvider setDefaultPrintFormatDataProvider
     * @param string $dateTime
     * @param string $format
     * @throws \Exception
     */
    public function testSetDefaultPrintFormat(string $dateTime, string $format) : void
    {
        $date = ChronosDateTime::createFromFormat($format, $dateTime);
        $returnDate = $date->setDefaultPrintFormat($format);
        self::assertEquals($format, $returnDate->getDefaultPrintFormat());
        self::assertEquals($dateTime, (string)$returnDate);
    }

    /**
     * @return array[]
     */
    public function setDefaultPrintFormatDataProvider() : array
    {
        return [
            ['2015-03-16 23:00:00', ChronosDateTime::DATE_MYSQL],
            ['Mon, 16 Mar 2015 23:00:00 +0000', ChronosDateTime::RSS],
        ];
    }
}
