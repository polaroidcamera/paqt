<?php
require_once '../config/autoload.php';

use App\Controller\PaqtController;
use App\Exception\PaqtException;
use App\Validation\InputValidator;

$task = null;

try {
    $task           = isset($_GET['task']) ? InputValidator::validateInt($_GET['task']) : null;
    $paqtController = new PaqtController();
    $result         = null;

    switch ($task) {
        // task 1 FizzBuzz
        case 1:
        default:
            $result = $paqtController->fizzBuzz(1, 100);
            break;

        // task 2 partitioning of sets
        case 2:
            // Random Dutch words
            $words = [
                "appel", "boek", "fietsen", "vriend", "huis", "tafel", "boom", "zon", "lachen", "dorp",
                "school", "water", "kracht", "auto", "dier", "geluk", "tuin", "reis", "licht", "storm",
                "computer", "lente", "wandelen", "nevel", "afspraak", "muziek"
            ];

            // Shuffle and choose 10 words
            shuffle($words);
            $randomWords = array_slice($words, 0, 10);

            $result = $paqtController->partitioningOfSets($randomWords, 3);
            break;

        // task 3 partitioning of sets
        case 3:
            $result = $paqtController->mondaysInAPeriod(
                new DateTime('2025-01-01'),
                new DateTime('2025-12-31')
            );

            break;

        case 4:
            $result = [
                [
                    "description" => "Alle bewoners van de gemeente Utrecht ophalen",
                    "endpoint"    => "/api/bewoners",
                    "method"      => "GET",
                    "city"        => 'Utrecht'
                ],
                [
                    "description" => "Een rit inboeken voor een bewoner",
                    "endpoint"    => "/api/ritten",
                    "method"      => "POST",
                ],
                [
                    "description" => "Ritten opvragen waarvoor het taxibedrijf verantwoordelijk is",
                    "endpoint"    => "/api/ritten",
                    "method"      => "GET",
                ],
                [
                    "description" => "Het budget van actieve beschikkingen jaarlijks resetten",
                    "endpoint"    => "/api/beschikkingen/reset",
                    "method"      => "POST",
                ]
            ];
            break;

        case 7:
            $result = [
                [
                    'endpoint' => '/api/beschikkingen',
                    'method' => 'POST',
                    'description' => 'Maak een nieuwe beschikking aan'
                ],
                [
                    'endpoint' => '/api/beschikkingen',
                    'method' => 'GET',
                    'description' => 'Haal alle beschikkingen op'
                ],
                [
                    'endpoint' => '/api/beschikkingen/{id}',
                    'method' => 'GET',
                    'description' => 'Haal details op van een specifieke beschikking'
                ],
                [
                    'endpoint' => '/api/beschikkingen/{id}',
                    'method' => 'PUT',
                    'description' => 'Wijzig een bestaande beschikking'
                ],
                [
                    'endpoint' => '/api/beschikkingen/{id}',
                    'method' => 'DELETE',
                    'description' => 'Verwijder een beschikking'
                ],
                [
                    'endpoint' => '/api/beschikkingen/{id}/budget',
                    'method' => 'GET',
                    'description' => 'Haalt het resterende budget op van een beschikking'
                ],
                [
                    'endpoint' => '/api/beschikkingen/{id}/budget',
                    'method' => 'PATCH',
                    'description' => 'Reset budget van een beschikking'
                ],
            ];

            break;
    }
} catch (PaqtException $e) {
    $result[] = "Error: {$e->getMessage()}";
}

// load template
if ($task <= 4 || $task === 7) {
    include '../templates/home.php';
} elseif($task === 5) {
    include '../templates/cameraRent.php';
} elseif($task === 6) {
    include '../templates/webdesign.php';
}
