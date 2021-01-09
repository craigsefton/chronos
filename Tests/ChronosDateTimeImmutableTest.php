<?php

namespace ChronosTests;

use Chronos\ChronosDateTimeImmutable;
use PHPUnit\Framework\TestCase;

class ChronosDateTimeImmutableTest extends TestCase
{
    /**
     * ===========================================================================
     * Minute tests
     * ===========================================================================
     */
    /**
     * @throws \Exception
     */
    public function testStartOfMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->startOfMinute();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:10:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->endOfMinute();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:10:59', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->previousMinute();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:09:30', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->nextMinute();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:11:30', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:00');
        $returnDate = $date->startOfHour();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfHour(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:00');
        $returnDate = $date->endOfHour();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:59:59', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousHour(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:00');
        $returnDate = $date->previousHour();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 22:10:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextHour(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 22:10:00');
        $returnDate = $date->nextHour();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:10:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 22:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->startOfDay();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 00:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfDay(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->endOfDay();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:59:59', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousDay(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->previousDay();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2013-12-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextDay(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->nextDay();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-02 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->firstDayOfMonth();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->lastDayOfMonth();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfPreviousMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->firstDayOfPreviousMonth();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2013-12-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfPreviousMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->lastDayOfPreviousMonth();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2013-12-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfNextMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->firstDayOfNextMonth();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-02-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfNextMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->lastDayOfNextMonth();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-02-28 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->previousYear();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2013-01-11 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextYear(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->nextYear();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2015-01-11 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfYear(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->firstDayOfYear();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-01-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfYear(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->lastDayOfYear();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals('2014-12-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
    public function testPreviousWeek(string $dateTime, string $expectedDateTime): void
    {
        $date = new ChronosDateTimeImmutable($dateTime);
        $returnDate = $date->previousWeek();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals($dateTime, $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @return array[]
     */
    public function previousWeekDataProvider(): array
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
    public function testNextWeek(string $dateTime, string $expectedDateTime): void
    {
        $date = new ChronosDateTimeImmutable($dateTime);
        $returnDate = $date->nextWeek();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals($dateTime, $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @return array[]
     */
    public function nextWeekDataProvider(): array
    {
        return [
            ['2015-03-15 23:00:00', '2015-03-22 23:00:00'],
            ['2015-12-31 23:00:00', '2016-01-07 23:00:00'],
            ['2012-02-22 23:00:00', '2012-02-29 23:00:00'],
        ];
    }

    /**
     * @dataProvider firstDayOfWeekDataProvider
     * @param string $dateTime
     * @param int $startDayOfWeek
     * @param string $expectedDateTime
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function testFirstDayOfWeek($dateTime, $startDayOfWeek, $expectedDateTime): void
    {
        $date = new ChronosDateTimeImmutable($dateTime);
        $returnDate = $date->setStartDayOfWeek($startDayOfWeek);
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals(0, $date->getStartDayOfWeek());
        $returnDate = $returnDate->firstDayOfWeek();
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $returnDate);
        self::assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @return array[]
     */
    public function firstDayOfWeekDataProvider(): array
    {
        return [
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::MONDAY, '2015-03-09 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::TUESDAY, '2015-03-10 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::WEDNESDAY, '2015-03-11 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::THURSDAY, '2015-03-12 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::FRIDAY, '2015-03-13 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::SATURDAY, '2015-03-14 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::SUNDAY, '2015-03-15 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::MONDAY, '2015-03-16 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::TUESDAY, '2015-03-10 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::WEDNESDAY, '2015-03-11 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::THURSDAY, '2015-03-12 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::FRIDAY, '2015-03-13 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::SATURDAY, '2015-03-14 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::SUNDAY, '2015-03-15 23:00:00'],
        ];
    }

    /**
     * @return array[]
     */
    public function lastDayOfWeekDataProvider() : array
    {
        return [
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::MONDAY, '2015-03-15 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::TUESDAY, '2015-03-16 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::WEDNESDAY, '2015-03-17 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::THURSDAY, '2015-03-18 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::FRIDAY, '2015-03-19 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::SATURDAY, '2015-03-20 23:00:00'],
            ['2015-03-15 23:00:00', ChronosDateTimeImmutable::SUNDAY, '2015-03-21 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::MONDAY, '2015-03-22 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::TUESDAY, '2015-03-16 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::WEDNESDAY, '2015-03-17 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::THURSDAY, '2015-03-18 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::FRIDAY, '2015-03-19 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::SATURDAY, '2015-03-20 23:00:00'],
            ['2015-03-16 23:00:00', ChronosDateTimeImmutable::SUNDAY, '2015-03-21 23:00:00'],
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
        $date = new ChronosDateTimeImmutable($dateTime);
        $returnDate = $date->setStartDayOfWeek($startDayOfWeek);
        $returnDate = $returnDate->lastDayOfWeek();
        self::assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        self::assertEquals($dateTime, $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /*
     * ===========================================================================
     * Misc tests.
     * ===========================================================================
     */
    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Exception
     */
    public function testConvertDateTime(): void
    {
        $date = new \DateTime('2015-03-23 00:00:00', new \DateTimeZone('Africa/Johannesburg'));
        $chronosDateTimeImmutable = ChronosDateTimeImmutable::convert($date);
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $chronosDateTimeImmutable);
        self::assertEquals($date->getTimezone(), $chronosDateTimeImmutable->getTimezone());
        self::assertEquals($date->getTimestamp(), $chronosDateTimeImmutable->getTimestamp());
        self::assertEquals(
            $date->format(ChronosDateTimeImmutable::DATE_MYSQL),
            $chronosDateTimeImmutable->format(ChronosDateTimeImmutable::DATE_MYSQL)
        );
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testValidateDate(): void
    {
        $valid = ChronosDateTimeImmutable::validate('2012-02-30 12:12:12');
        self::assertFalse($valid);
        $valid = ChronosDateTimeImmutable::validate('14:77', 'H:i');
        self::assertFalse($valid);
        $valid = ChronosDateTimeImmutable::validate('2012-02-30 12:12:12');
        self::assertFalse($valid);
    }

    /**
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testCreateFromFormat(): void
    {
        $date = ChronosDateTimeImmutable::createFromFormat(ChronosDateTimeImmutable::DATE_MYSQL, '2015-03-16 23:00:00');
        self::assertInstanceOf(ChronosDateTimeImmutable::class, $date);
        self::assertEquals('2015-03-16 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));

        self::assertFalse(
            ChronosDateTimeImmutable::createFromFormat(ChronosDateTimeImmutable::DATE_MYSQL, 'invalid date time')
        );
    }
}
