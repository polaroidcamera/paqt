<?php
namespace Api\Controller;

use Exception;

class RittenController {

    /**
     * Create a new rit
     *
     * @return array
     * @throws Exception
     */
    public function createRit(): array
    {
        try {
            // validatie op de verplichte velden en juistheid etc
            // insert op de DB, sql injection protection etc.

            return [
                'company_id' => 1,
                'ritnumber'  => 723,
                'datetime'   => '01-01-2025 07:00',
                'first_name' => 'Frank',
                'last_name'  => 'Degen',
                'pickup'     => [
                    'street'       => 'Europalaan',
                    'house_number' => 12,
                    'city'         => 'Utrecht'
                ],
                'dropoff' => [
                    'street'       => 'Europalaan',
                    'house_number' => 45,
                    'city'         => 'Utrecht'
                ]
            ];
        } catch (Exception $e) {
            throw new Exception("Error while creating a rit: {$e->getMessage()}");
        }
    }

    /**
     * Get all ritten
     *
     * @return array|array[]
     * @throws Exception
     */
    public function getRitten(): array
    {
        try {
            // Database request voor ophalen alle ritten en
            // dan filteren welke velden mee gestuurd moeten worden.
            // De company ID zal op basis van de inlog op een
            // eerder moment gezet worden
            // Insert van de database zal beschermd
            // moeten worden tegen sql injection

            if (
                isset($_GET['companyId']) &&
                $_GET['companyId'] === 1
            ) {
                $ritten = [
                    [
                        'company_id' => 1,
                        'ritnumber'  => 723,
                        'datetime'   => '01-01-2025 07:00',
                        'first_name' => 'Frank',
                        'last_name'  => 'Degen',
                        'pickup'     => [
                            'street'       => 'Europalaan',
                            'house_number' => 12,
                            'city'         => 'Utrecht'
                        ],
                        'dropoff' => [
                            'street'       => 'Europalaan',
                            'house_number' => 45,
                            'city'         => 'Utrecht'
                        ]
                    ]
                ];
            } else {
                $ritten = [];
            }

            return $ritten;
        } catch (Exception $e) {
            throw new Exception("Error while fetching the ritten: {$e->getMessage()}");
        }
    }
}
