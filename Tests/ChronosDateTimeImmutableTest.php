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
        $this->assertEquals('2014-01-01 23:10:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->endOfMinute();
        $this->assertEquals('2014-01-01 23:10:59', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->previousMinute();
        $this->assertEquals('2014-01-01 23:09:30', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextMinute() : void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:30');
        $returnDate = $date->nextMinute();
        $this->assertEquals('2014-01-01 23:11:30', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:30', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $this->assertEquals('2014-01-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfHour(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:00');
        $returnDate = $date->endOfHour();
        $this->assertEquals('2014-01-01 23:59:59', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousHour(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:10:00');
        $returnDate = $date->previousHour();
        $this->assertEquals('2014-01-01 22:10:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextHour(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 22:10:00');
        $returnDate = $date->nextHour();
        $this->assertEquals('2014-01-01 23:10:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 22:10:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $this->assertEquals('2014-01-01 00:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfDay(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->endOfDay();
        $this->assertEquals('2014-01-01 23:59:59', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testPreviousDay(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->previousDay();
        $this->assertEquals('2013-12-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextDay(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->nextDay();
        $this->assertEquals('2014-01-02 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals('2014-01-01 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $this->assertEquals('2014-01-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->lastDayOfMonth();
        $this->assertEquals('2014-01-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfPreviousMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->firstDayOfPreviousMonth();
        $this->assertEquals('2013-12-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfPreviousMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->lastDayOfPreviousMonth();
        $this->assertEquals('2013-12-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfNextMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->firstDayOfNextMonth();
        $this->assertEquals('2014-02-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfNextMonth(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-01 23:00:00');
        $returnDate = $date->lastDayOfNextMonth();
        $this->assertEquals('2014-02-28 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $this->assertEquals('2013-01-11 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testNextYear(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->nextYear();
        $this->assertEquals('2015-01-11 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testStartOfYear(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->firstDayOfYear();
        $this->assertEquals('2014-01-01 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
    }

    /**
     * @throws \Exception
     */
    public function testEndOfYear(): void
    {
        $date = new ChronosDateTimeImmutable('2014-01-11 23:00:00');
        $returnDate = $date->lastDayOfYear();
        $this->assertEquals('2014-12-31 23:00:00', $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $this->assertEquals($dateTime, $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
        $this->assertEquals($dateTime, $date->format(ChronosDateTimeImmutable::DATE_MYSQL));
        $this->assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Exception
     */
    public function testFirstDayOfWeek($dateTime, $startDayOfWeek, $expectedDateTime): void
    {
        $date = new ChronosDateTimeImmutable($dateTime);
        $returnDate = $date->setStartDayOfWeek($startDayOfWeek);
        $this->assertEquals(0, $date->getStartDayOfWeek());
        $returnDate = $returnDate->firstDayOfWeek();
        $this->assertEquals($expectedDateTime, $returnDate->format(ChronosDateTimeImmutable::DATE_MYSQL));
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

    /*
     * ===========================================================================
     * Misc tests.
     * ===========================================================================
     */
    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testConvertDateTime(): void
    {
        $date = new \DateTime('2015-03-23 00:00:00', new \DateTimeZone('Africa/Johannesburg'));
        $chronosDateTimeImmutable = ChronosDateTimeImmutable::convert($date);
        $this->assertEquals($date->getTimezone(), $chronosDateTimeImmutable->getTimezone());
        $this->assertEquals($date->getTimestamp(), $chronosDateTimeImmutable->getTimestamp());
        $this->assertEquals(
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
        $this->assertFalse($valid);
        $valid = ChronosDateTimeImmutable::validate('14:77', 'H:i');
        $this->assertFalse($valid);
        $valid = ChronosDateTimeImmutable::validate('2012-02-30 12:12:12');
        $this->assertFalse($valid);
    }

    /**
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testCreateFromFormat(): void
    {
        $date = ChronosDateTimeImmutable::createFromFormat(ChronosDateTimeImmutable::DATE_MYSQL, '2015-03-16 23:00:00');
        $this->assertInstanceOf(ChronosDateTimeImmutable::class, $date);
        $this->assertEquals('2015-03-16 23:00:00', $date->format(ChronosDateTimeImmutable::DATE_MYSQL));

        $this->assertFalse(
            ChronosDateTimeImmutable::createFromFormat(ChronosDateTimeImmutable::DATE_MYSQL, 'invalid date time')
        );
    }
}
