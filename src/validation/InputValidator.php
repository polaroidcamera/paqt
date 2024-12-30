<?php
namespace App\Validation;

use App\Exception\PaqtException;

class InputValidator
{
    /**
     * This function validates whether the provided input is a valid integer.
     *
     * @param $input
     * @return int|null
     * @throws PaqtException
     */
    static function validateInt($input): ?int
    {
        $validatedInput = filter_var($input, FILTER_VALIDATE_INT);

        if ($validatedInput === false) {
            (new PaqtException)->inputShouldBeInt();
        }

        return (int) $validatedInput;
    }
}