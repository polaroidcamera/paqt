<?php
namespace Api\Routes;

use Api\routes\base\BaseRoute;
use Api\Utils\ResponseHelper AS Response;

class FrontendRoute extends BaseRoute {
    /**
     * return routes
     *
     * @return array[]
     */
    public function getRoutes(): array
    {
        return [
            'GET' => ['/api/frontend/camera/available' => 'getFrontendCameraAvailable']
        ];
    }

    /**
     * Frontend (object) camera
     *
     * @route GET /api/frontend/camera/available
     * @return void
     */
    public function getFrontendCameraAvailable(): void
    {
        Response::send(
            200,
            'Fetched cameras',
            [
                [
                    'id'   => 1,
                    'name' => 'Camera 1'
                ],
            ]
        );
    }
}
