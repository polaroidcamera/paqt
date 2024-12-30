<?php
namespace Api\Routes;

use Api\Controller\BewonersController;
use Api\routes\base\BaseRoute;
use Api\Utils\RequestHelper AS Request;
use Api\Utils\ResponseHelper AS Response;
use Exception;

class BewonersRoute extends BaseRoute {
    /**
     * return routes
     *
     * @return array[]
     */
    public function getRoutes(): array
    {
        return [
            'GET' => ['/api/bewoners' => 'getBewoners']
        ];
    }

    /**
     * API route get all bewoners
     *
     * @route GET /api/bewoners
     * @return void
     */
    public function getBewoners(): void
    {
        try {
            Request::authorizeOnRole(Request::ROLE_CALLCENTER);
            Response::send(
                200,
                'Fetched bewoners',
                (new BewonersController)->getBewoners()
            );
        } catch (Exception $e) {
            Response::send(500, "Bewoners fetch failed: {$e->getMessage()}");
        }
    }
}
