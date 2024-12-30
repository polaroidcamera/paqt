<?php
namespace Api\Routes;

use Api\Controller\BeschikkingenController;
use Api\routes\base\BaseRoute;
use Api\Utils\ResponseHelper as Response;
use Exception;

class BeschikkingenRoute extends BaseRoute {

    /**
     * return routes
     *
     * @return array[]
     */
    public function getRoutes(): array
    {
        return [
            'POST' => ['/api/beschikkingen/reset' => 'postBeschikkingenReset']
        ];
    }

    /**
     * Api route beschikkingen reset
     *
     * @route POST /api/beschikkingen/reset
     * @return void
     */
    public function postBeschikkingenReset(): void
    {
        try {
            (new BeschikkingenController)->resetBeschikkingen();
            Response::send(200, "Beschikkingen reset succesfull");
        } catch (Exception $e) {
            Response::send(500, "Beschikkingen reset failed: {$e->getMessage()}");
        }
    }
}
