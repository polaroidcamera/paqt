<?php
namespace Api\Controller;

Use Exception;

class BewonersController {
    /**
     * Get all bewoners
     *
     * @return array|array[]
     * @throws Exception
     */
    public function getBewoners(): array
    {
        try {
            // Database request voor ophalen alle bewoners en dan
            // filteren welke velden mee gestuurd moeten worden.
            // Insert van de database zal beschermd moeten
            // worden tegen sql injection

            if (
                isset($_GET['city']) &&
                strtolower($_GET['city']) === 'utrecht'
            ) {
                $bewoners = [
                    [
                        'first_name'   => 'Frank',
                        'last_name'    => 'Degen',
                        'street'       => 'Europalaan',
                        'house_number' => 12,
                        'city'         => 'Utrecht'
                    ],
                    [
                        'first_name'   => 'Pact',
                        'last_name'    => 'Utrecht',
                        'street'       => 'Europalaan',
                        'house_number' => 45,
                        'city'         => 'Utrecht'
                    ]
                ];
            } else {
                $bewoners = [];
            }

            return $bewoners;
        } catch (Exception $e) {
            throw new Exception("Error while fetching the bewoners: {$e->getMessage()}");
        }
    }
}
