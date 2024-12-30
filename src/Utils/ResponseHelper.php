<?php
namespace Api\Utils;

class ResponseHelper
{
    /**
     * API response
     *
     * @param int $statusCode
     * @param string $message
     * @param array|null $data
     * @return void
     */
    public static function send(int $statusCode,string $message,array $data = null)
    {
        http_response_code($statusCode);
        $response = ['message' => $message];

        if ($data !== null) {
            $response['data'] = $data;
        }

        echo json_encode($response);
        exit();
    }
}
