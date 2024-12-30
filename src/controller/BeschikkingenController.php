<?php
namespace Api\Controller;

use Exception;

class BeschikkingenController {

    /**
     * Reset the beschikkingen
     *
     * @return bool
     * @throws Exception
     */
    public function resetBeschikkingen(): bool
    {
        try {
            // Reset de beschikkingen in de
            // database en return message
            // Insert van de database zal beschermd
            // moeten worden tegen sql injection

            return true;
        } catch (Exception $e) {
            throw new Exception("Error while resetting the beschikkingen: {$e->getMessage()}");
        }
    }
}
