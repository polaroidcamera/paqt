<?php
namespace Api\Routes;

use Api\Controller\RittenController;
use Api\routes\base\BaseRoute;
use Api\Utils\RequestHelper AS Request;
use Api\Utils\ResponseHelper AS Response;
use Exception;

class RittenRoute extends BaseRoute {
    /**
     * return routes
     *
     * @return array[]
     */
    public function getRoutes(): array
    {
        return [
            'GET'  => ['/api/ritten' => 'getRitten'],
            'POST' => ['/api/ritten' => 'postRitten']
        ];
    }

    /**
     * Api route post ritten
     *
     * @route GET /api/ritten
     * @return void
     */
    public function getRitten(): void
    {
        try {
            // Op basis van een login / JWT hash of iets dergelijks
            // is de company ID binnen de API gezet, nu even handmatig
            $_GET['companyId'] = 1;

            Request::authorizeOnRole(Request::ROLE_TAXIBEDRIJF);
            Response::send(
                200,
                'Fetched ritten',
                (new RittenController)->getRitten()
            );
        } catch (Exception $e) {
            Response::send(500, "Ritten fetch failed: {$e->getMessage()}");
        }
    }

    /**
     * api route get ritten
     *
     * @route POST /api/ritten
     * @return void
     */
    public function postRitten(): void
    {
        try {
            Request::authorizeOnRole(Request::ROLE_CALLCENTER);
            Response::send(
                201,
                'Created rit',
                (new RittenController)->createRit()
            );
        } catch (Exception $e) {
            Response::send(500, "Ritten create failed: {$e->getMessage()}");
        }
    }
}
