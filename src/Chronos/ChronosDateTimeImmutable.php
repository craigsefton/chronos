<?php declare(strict_types = 1);

/**
 * @file
 * ChronosDateTimeImmutable: An extension of the base PHP DateTimeImmutable class
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

class ChronosDateTimeImmutable extends \DateTimeImmutable implements ChronosInterface
{
    use ChronosTrait;

    /**
     * @param \DateTime $object
     * @return ChronosDateTimeImmutable
     * @throws \Exception
     * @noinspection PhpMissingParamTypeInspection PHP throws an error.
     */
    public static function createFromMutable($object) : ChronosDateTimeImmutable
    {
        return static::convert(\DateTimeImmutable::createFromMutable($object));
    }

    /**
     * @param string $format
     * @param string $datetime
     * @param \DateTimeZone|null $timezone
     * @return ChronosDateTimeImmutable|false
     * @noinspection PhpMissingParamTypeInspection PHP throws an error.
     */
    public static function createFromFormat($format, $datetime, \DateTimeZone $timezone = null)
    {
        $dateTime = \DateTimeImmutable::createFromFormat($format, $datetime, $timezone);
        if (false === $dateTime) {
            return false;
        }

        // Instead of throwing an exception, we return false in order to keep the behaviour the same.
        try {
            return static::convert($dateTime);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosDateTimeImmutable
     * @throws \Exception
     */
    public static function convert(
        \DateTimeInterface $date,
        string $format = ChronosInterface::DATE_MYSQL
    ) : ChronosInterface {
        return new static($date->format($format), $date->getTimezone());
    }

    /**
     * @param int $startDayOfWeek
     * @return ChronosDateTimeImmutable
     * @throws \InvalidArgumentException
     */
    public function setStartDayOfWeek(int $startDayOfWeek) : ChronosInterface
    {
        $clone = clone $this;
        if (!is_int($startDayOfWeek) || !array_key_exists($startDayOfWeek, ChronosInterface::DAYS_OF_WEEK)) {
            throw new \InvalidArgumentException(
                'Start day of the week should be a number from 0 (Sunday) to 6 (Saturday).'
            );
        }
        $clone->startDayOfWeek = $startDayOfWeek;
        return $clone;
    }

    /**
     * @param string $defaultPrintFormat
     * @return ChronosDateTimeImmutable
     */
    public function setDefaultPrintFormat(string $defaultPrintFormat) : ChronosInterface
    {
        $clone = clone $this;
        $clone->defaultPrintFormat = $defaultPrintFormat;
        return $clone;
    }
}
