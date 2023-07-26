<?php

namespace App\Services;

use DateInterval;
use DateTime;
use Exception;
use IntlDateFormatter;

class DateService
{
    public const PREVIOUS = 'previous';
    public const NEXT = 'next';
    public const DAY = 'day';
    public const WEEK = 'week';
    public const MONTH = 'month';

    /**
     * @var array
     */
    private array $days = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];

    /**
     * @var array
     */
    private array $englishDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    /**
     * @var array
     */
    private array $frenchDays = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];

    /**
     * @var array
     */
    private array $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    /**
     * @var array
     */
    private array $frenchMonths = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

    /**
     * @return array
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @param string $criteria
     * @param null $currentDate
     * @return string
     * @throws Exception
     */
    public function getDate(string $criteria, $currentDate = null): string
    {
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);

        if (!is_null($currentDate) && $currentDate !== '') {
            $newDate = $this->getDateTimeFromFormattedDate($currentDate);
        } else {
            $newDate = new DateTime();
        }

        match ($criteria) {
            self::PREVIOUS => $newDate->sub(new DateInterval('P1D')),
            self::NEXT => $newDate->add(new DateInterval('P1D')),
            default => $newDate,
        };

        return $formatter->format($newDate);
    }

    /**
     * @param array|string $week
     * @return array
     */
    public function getWeek(array|string $week): array
    {
        if ($week != '') {
            $currentDate = (new DateTime())::createFromFormat("Y-m-d", $week);
        } else {
            $currentDate = new DateTime();
        }

        $currentWeek = $currentDate->format('W');
        $currentYear = $currentDate->format('Y');
        $firstDayOfWeek = $this->getFirstAndLastDayOfWeek($currentYear, $currentWeek)->firstDay->format('d');
        $monthOfFirstDayOfWeek = $this->getFirstAndLastDayOfWeek($currentYear, $currentWeek)->firstDay->format('F');
        $monthOfFirstDayOfWeek = str_replace($this->englishMonths, $this->frenchMonths, $monthOfFirstDayOfWeek);
        $lastDayOfWeek = $this->getFirstAndLastDayOfWeek($currentYear, $currentWeek)->lastDay->format('d');
        $monthOflastDayOfWeek = $this->getFirstAndLastDayOfWeek($currentYear, $currentWeek)->lastDay->format('F');
        $monthOflastDayOfWeek = str_replace($this->englishMonths, $this->frenchMonths, $monthOflastDayOfWeek);
        $previousWeek = $currentDate->sub(new DateInterval('P1W'))->format('Y-m-d');
        $nextWeek = $currentDate->add(new DateInterval('P2W'))->format('Y-m-d');

        return [
            'formatted' => "Du $firstDayOfWeek $monthOfFirstDayOfWeek au $lastDayOfWeek $monthOflastDayOfWeek $currentYear",
            'previousWeek' => $previousWeek,
            'nextWeek' => $nextWeek,
        ];
    }

    /**
     * @param string $date
     * @return DateTime
     */
    public function getDateTimeFromFormattedDate(string $date): DateTime
    {
        return (new \DateTime())::createFromFormat("l j F Y", $this->getEnglishDate($date));
    }

    /**
     * @param $yearNumber
     * @param $weekNumber
     * @return object
     */
    private function getFirstAndLastDayOfWeek($yearNumber, $weekNumber): object
    {
        // we need to specify 'today' otherwise datetime constructor uses 'now' which includes current time
        $today = new DateTime('today');

        return (object)[
            'firstDay' => clone $today->setISODate($yearNumber, $weekNumber),
            'lastDay' => clone $today->setISODate($yearNumber, $weekNumber, 7)
        ];
    }

    /**
     * @param string $date
     * @return string
     */
    private function getEnglishDate(string $date): string
    {
        $date = str_replace($this->frenchMonths, $this->englishMonths, $date);
        $date = str_replace($this->frenchDays, $this->englishDays, $date);
        return $date;
    }
}
