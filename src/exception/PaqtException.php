<?php
namespace App\Exception;

use Exception;

class PaqtException extends Exception
{
    /**
     * input should be int
     *
     * @return void
     * @throws PaqtException
     */
    public function inputShouldBeInt(): void
    {
        throw new self('The provided input is not a valid integer.', 1);
    }

    /**
     * Error start should be smaller then end
     *
     * @return void
     * @throws PaqtException
     */
    public function startShouldBeSmallerThanEnd(): void
    {
        throw new self('Start should be lower then end', 2);
    }

    /**
     * Error message no single full week
     *
     * @return void
     * @throws PaqtException
     */
    public function noSingleFullWeek(): void
    {
        throw new self('There is no single full week', 3);
    }

    /**
     * Error for empty list
     *
     * @return void
     * @throws PaqtException
     */
    public function listIsEmpty(): void
    {
        throw new self('The list is empty', 4);
    }
}