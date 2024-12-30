<?php
namespace App\Controller;

use App\Exception\PaqtException;
use DateTime;

class PaqtController
{
    /**
     * Task that gives a number, a buzz, a fizz or a fizzbuzz
     *
     * @param int $start
     * @param int $end
     * @return array
     * @throws PaqtException
     */
    public function fizzBuzz(int $start, int $end): array
    {
        $result = [];

        // validate input
        if ($end <= $start) {
            (new PaqtException())->startShouldBeSmallerThanEnd();
        }

        // start to build the return
        for ($i = $start; $i <= $end; $i++)
        {
            if ($i % 3 === 0 && $i % 5 === 0) {
                $result[$i] = "FizzBuzz";
            } elseif ($i % 3 === 0) {
                $result[$i] = "Fizz";
            } elseif ($i % 5 === 0) {
                $result[$i] = "Buzz";
            } else {
                $result[$i] = $i;
            }
        }

        return $result;
    }

    /**
     * Partitioning of sets
     *
     * @param array $list
     * @param int $setLength
     * @return array
     * @throws PaqtException
     */
    public function partitioningOfSets(array $list, int $setLength): array
    {
        // validate input
        if(!$list) {
            (new PaqtException())->listIsEmpty();
        }

        return array_chunk($list, $setLength);
    }


    /**
     * Show mondays in a period
     *
     * @param DateTime $start
     * @param DateTime $end
     * @return array
     * @throws PaqtException
     * @throws \DateMalformedStringException
     */
    public function mondaysInAPeriod(DateTime $start, DateTime $end): array
    {
        $result = [];

        // validate start and end
        if ($start > $end) {
            (new PaqtException())->startShouldBeSmallerThanEnd();
        }

        // check if date is already monday, else pick next monday
        if ((int) $start->format('N') != 1) {
            $start->modify('Monday next week');
        }

        // check if date is already sunday, else pick previous sunday
        if ((int) $end->format('N') != 7) {
            $end->modify('Sunday last week');
        }

        // Loop all mondays
        $interval = $start->diff($end);
        $weeks    = floor($interval->days / 7);

        // diff min is 6
        if ($interval->days < 6) {
            (new PaqtException())->noSingleFullWeek();
        }

        // Generate an array of all Mondays
        for ($i = 0; $i <= $weeks; $i++) {
            $result[] = $start->format('D F d Y');
            $start->modify('Monday next week');
        }

        return $result;
    }
}