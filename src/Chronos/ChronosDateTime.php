<?php declare(strict_types = 1);
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

class ChronosDateTime extends \DateTime implements ChronosInterface
{
    use ChronosTrait;

    /**
     * @param \DateTimeInterface $date
     * @param string $format
     * @return ChronosDateTime
     * @throws \Exception
     */
    public static function convert(
        \DateTimeInterface $date,
        string $format = ChronosInterface::DATE_MYSQL
    ) : ChronosInterface {
        return new static($date->format($format), $date->getTimezone());
    }

    /**
     * @param string $format
     * @param string $datetime
     * @param \DateTimeZone|null $timezone
     * @return ChronosDateTime|false
     * @noinspection PhpMissingParamTypeInspection PHP throws an error
     */
    public static function createFromFormat($format, $datetime, \DateTimeZone $timezone = null)
    {
        $dateTime = \DateTime::createFromFormat($format, $datetime, $timezone);
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
     * Set a default format for printing static objects.
     *
     * @param string $defaultPrintFormat
     * @return ChronosDateTime
     */
    public function setDefaultPrintFormat(string $defaultPrintFormat) : ChronosInterface
    {
        $this->defaultPrintFormat = $defaultPrintFormat;
        return $this;
    }

    /**
     * @param int $startDayOfWeek
     * @throws \InvalidArgumentException if the start day of the week is invalid.
     * @return ChronosDateTime
     */
    public function setStartDayOfWeek(int $startDayOfWeek) : ChronosInterface
    {
        if (!is_int($startDayOfWeek) || !array_key_exists($startDayOfWeek, ChronosInterface::DAYS_OF_WEEK)) {
            throw new \InvalidArgumentException(
                'Start day of the week should be a number from 0 (Sunday) to 6 (Saturday).'
            );
        }
        $this->startDayOfWeek = $startDayOfWeek;
        return $this;
    }
}
